<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'description',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    // Cache settings for better performance
    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            Cache::forget('settings');
        });

        static::deleted(function () {
            Cache::forget('settings');
        });
    }

    // Get setting value with caching
    public static function get($key, $default = null)
    {
        $settings = Cache::remember('settings', 3600, function () {
            return static::pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }

    // Set setting value
    public static function set($key, $value, $type = 'string', $group = 'general')
    {
        static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
            ]
        );

        Cache::forget('settings');
    }

    // Get settings by group
    public static function getGroup($group)
    {
        return static::where('group', $group)->pluck('value', 'key')->toArray();
    }

    // Scope for public settings
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    // Scope for group
    public function scopeGroup($query, $group)
    {
        return $query->where('group', $group);
    }
}
