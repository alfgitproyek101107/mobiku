<?php

namespace App\Http\Controllers;

use App\Models\ThemeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminThemeController extends Controller
{
    /**
     * Display theme management page
     */
    public function index()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $currentTheme = ThemeSetting::getCurrentTheme();

        $themes = [
            'dark' => [
                'name' => 'Dark Theme',
                'description' => 'Modern dark theme with elegant gradients and premium styling',
                'preview' => 'dark-theme-preview.jpg',
                'colors' => ['#1e293b', '#0f172a', '#f59e0b', '#ea580c']
            ],
            'light' => [
                'name' => 'Light Modern',
                'description' => 'Clean and bright design with modern aesthetics',
                'preview' => 'light-theme-preview.jpg',
                'colors' => ['#ffffff', '#f8fafc', '#3b82f6', '#1d4ed8']
            ],
            'colorful' => [
                'name' => 'Colorful Vibrant',
                'description' => 'Bold and energetic design with vibrant color schemes',
                'preview' => 'colorful-theme-preview.jpg',
                'colors' => ['#8b5cf6', '#ec4899', '#06b6d4', '#10b981']
            ]
        ];

        return view('admin.themes.index', compact('currentTheme', 'themes'));
    }

    /**
     * Update the active theme
     */
    public function update(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'theme' => 'required|in:dark,light,colorful'
        ]);

        ThemeSetting::setCurrentTheme($request->theme);

        return response()->json([
            'success' => true,
            'message' => 'Theme updated successfully!',
            'theme' => $request->theme
        ]);
    }

    /**
     * Preview theme (AJAX)
     */
    public function preview(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'theme' => 'required|in:dark,light,colorful'
        ]);

        // Return theme CSS variables for preview
        $themeStyles = $this->getThemeStyles($request->theme);

        return response()->json([
            'success' => true,
            'theme' => $request->theme,
            'styles' => $themeStyles
        ]);
    }

    /**
     * Get theme-specific CSS styles
     */
    private function getThemeStyles($theme)
    {
        $styles = [];

        switch ($theme) {
            case 'dark':
                $styles = [
                    '--bg-primary' => '#1e293b',
                    '--bg-secondary' => '#0f172a',
                    '--text-primary' => '#ffffff',
                    '--text-secondary' => '#cbd5e1',
                    '--accent-primary' => '#f59e0b',
                    '--accent-secondary' => '#ea580c',
                    '--card-bg' => 'rgba(15, 23, 42, 0.8)',
                    '--border-color' => 'rgba(251, 191, 36, 0.2)',
                ];
                break;

            case 'light':
                $styles = [
                    '--bg-primary' => '#ffffff',
                    '--bg-secondary' => '#f8fafc',
                    '--text-primary' => '#1e293b',
                    '--text-secondary' => '#64748b',
                    '--accent-primary' => '#3b82f6',
                    '--accent-secondary' => '#1d4ed8',
                    '--card-bg' => 'rgba(255, 255, 255, 0.9)',
                    '--border-color' => 'rgba(59, 130, 246, 0.2)',
                ];
                break;

            case 'colorful':
                $styles = [
                    '--bg-primary' => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                    '--bg-secondary' => '#f8fafc',
                    '--text-primary' => '#ffffff',
                    '--text-secondary' => '#e2e8f0',
                    '--accent-primary' => '#8b5cf6',
                    '--accent-secondary' => '#ec4899',
                    '--card-bg' => 'rgba(255, 255, 255, 0.95)',
                    '--border-color' => 'rgba(139, 92, 246, 0.3)',
                ];
                break;
        }

        return $styles;
    }
}
