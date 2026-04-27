<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    function setting(string $key, string $locale = 'en'): ?string
    {
        return Setting::get('general', $key, $locale);
    }
}
