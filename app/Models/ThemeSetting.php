<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    protected $fillable = [
        'setting_key',
        'setting_value',
        'setting_type',
        'description',
    ];

    /**
     * Get setting value by key
     */
    public static function getSetting(string $key, string $default = '')
    {
        $setting = static::where('setting_key', $key)->first();
        return $setting ? $setting->setting_value : $default;
    }

    /**
     * Set setting value by key
     */
    public static function setSetting(string $key, string $value, string $type = 'string', string $description = null)
    {
        return static::updateOrCreate(
            ['setting_key' => $key],
            [
                'setting_value' => $value,
                'setting_type' => $type,
                'description' => $description,
            ]
        );
    }

    /**
     * Get current active theme
     */
    public static function getCurrentTheme()
    {
        return static::getSetting('active_theme', 'dark');
    }

    /**
     * Set current active theme
     */
    public static function setCurrentTheme(string $theme)
    {
        return static::setSetting('active_theme', $theme, 'string', 'Current active website theme');
    }
}
