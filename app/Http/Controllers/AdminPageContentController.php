<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $query = PageContent::query();

        // Filter by page
        if ($request->filled('page')) {
            $query->where('page', $request->page);
        }

        // Filter by section
        if ($request->filled('section')) {
            $query->where('section', $request->section);
        }

        $contents = $query->orderBy('page')->orderBy('section')->paginate(15);

        // Get unique pages and sections for filters
        $pages = PageContent::select('page')->distinct()->pluck('page');
        $sections = PageContent::select('section')->distinct()->pluck('section');

        return view('admin.page-contents.index', compact('contents', 'pages', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.page-contents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'page' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'content_key' => 'required|string|max:255',
            'content' => 'required|string',
            'content_type' => 'required|in:text,html',
            'is_active' => 'boolean',
        ]);

        // Generate unique content key
        $baseKey = $request->page . '_' . $request->section . '_' . \Str::slug($request->content_key);
        $contentKey = $baseKey;
        $counter = 1;

        while (PageContent::where('content_key', $contentKey)->exists()) {
            $contentKey = $baseKey . '_' . $counter;
            $counter++;
        }

        PageContent::create([
            'page' => $request->page,
            'section' => $request->section,
            'content_key' => $contentKey,
            'content' => $request->content,
            'content_type' => $request->content_type,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.page-contents.index', ['page' => $request->page])
                        ->with('success', 'Content added successfully to ' . ucfirst($request->section) . ' section.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $content = PageContent::findOrFail($id);

        return view('admin.page-contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $content = PageContent::findOrFail($id);

        return view('admin.page-contents.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $content = PageContent::findOrFail($id);

        $request->validate([
            'page' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'content_key' => 'required|string|max:255|unique:page_contents,content_key,' . $id,
            'content' => 'required|string',
            'content_type' => 'required|in:text,html,markdown',
            'is_active' => 'boolean',
        ]);

        $content->update([
            'page' => $request->page,
            'section' => $request->section,
            'content_key' => $request->content_key,
            'content' => $request->content,
            'content_type' => $request->content_type,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.page-contents.index')->with('success', 'Page content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $content = PageContent::findOrFail($id);
        $content->delete();

        return redirect()->route('admin.page-contents.index')->with('success', 'Page content deleted successfully.');
    }

    /**
     * Quick edit content via AJAX
     */
    public function quickEdit(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'content_key' => 'required|string',
            'content' => 'required|string',
        ]);

        $content = PageContent::where('content_key', $request->content_key)->first();

        if ($content) {
            $content->update(['content' => $request->content]);
        } else {
            // Create new content if it doesn't exist
            PageContent::create([
                'page' => $request->page ?? 'unknown',
                'section' => $request->section ?? 'unknown',
                'content_key' => $request->content_key,
                'content' => $request->content,
                'content_type' => 'text',
                'is_active' => true,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Content updated successfully']);
    }
}
