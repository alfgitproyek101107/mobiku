<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page',
        'section',
        'content_key',
        'content',
        'content_type',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get content by key
     */
    public static function getContent(string $contentKey, string $default = '')
    {
        $content = static::where('content_key', $contentKey)
                        ->where('is_active', true)
                        ->first();

        return $content ? $content->content : $default;
    }

    /**
     * Get content by page and section
     */
    public static function getContentByPageSection(string $page, string $section, string $default = '')
    {
        $content = static::where('page', $page)
                        ->where('section', $section)
                        ->where('is_active', true)
                        ->first();

        return $content ? $content->content : $default;
    }

    /**
     * Get all content for a page
     */
    public static function getPageContent(string $page)
    {
        return static::where('page', $page)
                    ->where('is_active', true)
                    ->get()
                    ->keyBy('content_key');
    }
}
