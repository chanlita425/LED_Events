<?php

namespace App\Providers;

use App\Models\MenuGroup;
use App\Models\Page;
use App\Models\Cms\Setting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::anonymousComponentPath(resource_path('views/backend/components'));

        View::composer('backend.components.sidebar', function ($view) {
            $sidebarMenuGroups = MenuGroup::where('is_active', true)
                ->orderBy('sort_order')
                ->with(['menus' => function ($q) {
                    $q->where('is_active', true)->orderBy('sort_order');
                }])
                ->get();

            $legalPages = Page::whereIn('slug', ['privacy-policy', 'terms-of-service'])
                ->where('is_active', true)
                ->get()
                ->keyBy('slug');

            $view->with('sidebarMenuGroups', $sidebarMenuGroups)
                ->with('title',       Setting::getValue('sidebar', 'title') ?? 'LED Events')
                ->with('subtitle',    Setting::getValue('sidebar', 'subtitle') ?? 'Admin Panel')
                ->with('logo',        Setting::getValue('led', 'logo'))
                ->with('legalPages',  $legalPages);
        });

         View::composer('*', function ($view) {
        $view->with(
            'contact',
            Setting::where('group_name', 'social')->get()
        );
    });
    }
}
