<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ThemeSetting;

class ThemeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set default theme to 'dark' (current theme)
        ThemeSetting::setCurrentTheme('dark');

        $this->command->info('Theme settings seeded successfully!');
        $this->command->info('Default theme: dark');
    }
}
