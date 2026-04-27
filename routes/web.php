<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\SessionController;
// use App\Http\Controllers\Admin\Auth\ProfileController;
use App\Http\Controllers\Admin\Auth\UserController;
use App\Http\Controllers\Admin\Cms\MenuController;
use App\Http\Controllers\Admin\Cms\MenuGroupController;
use App\Http\Controllers\Admin\Cms\PageController;
use App\Http\Controllers\Admin\Cms\PageSectionController;
use App\Http\Controllers\Admin\Cms\SectionItemController;
use App\Http\Controllers\Admin\Cms\MediaFileController;
use App\Http\Controllers\Admin\Cms\SettingController;
use App\Http\Controllers\Admin\Contact\ContactInfoController;
use App\Http\Controllers\Admin\Contact\ContactMessageController;
use App\Http\Controllers\Admin\Log\ActivityLogController;
use App\Models\Cms\PageSection;
use App\Models\Cms\SectionItem;
use App\Models\Cms\Setting;

// ================== Auth ==================

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');


// ================== Legal (standalone) ==================

    Route::get('/privacy-policy', function () {
        $page = \App\Models\Page::where('slug', 'privacy-policy')->firstOrFail();
        return view('backend.page.privacy-policy', compact('page'));
    })->name('privacy');

    Route::get('/terms-of-service', function () {
        $page = \App\Models\Page::where('slug', 'terms-of-service')->firstOrFail();
        return view('backend.page.terms', compact('page'));
    })->name('terms');

// ================== Admin ==================

Route::get('/', fn() => redirect()->route('admin.dashboard'))->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ── CMS ───────────────────────────────────────────────
    Route::resource('menu-groups',   MenuGroupController::class);
    Route::resource('menus',         MenuController::class)->except(['show']);
    Route::resource('pages',         PageController::class);
    Route::resource('page-sections', PageSectionController::class);


    // ── section ──────────────────────────
    Route::resource('section-items', SectionItemController::class);
    Route::get('/get-groups/{id}', [SectionItemController::class, 'getGroups'])->name('get-groups');

    Route::resource('media-files',   MediaFileController::class)->only(['index', 'store', 'show', 'destroy']);


     // ── SETTINGS ──────────────────────────
    Route::resource('settings', SettingController::class);
    Route::delete('/admin/settings/{id}', [SettingController::class, 'destroy'])
        ->name('admin.settings.destroy');
    Route::put('settings/{setting}/quick-update', [SettingController::class, 'quickUpdate'])
        ->name('settings.quick-update');



    // ── Users ─────────────────────────────────────────────
    Route::resource('users', UserController::class);
    Route::resource('sessions', SessionController::class);

    // ── Contact ───────────────────────────────────────────
    Route::get('/contact-info',    [ContactInfoController::class, 'index'])->name('contact-info.index');
    Route::put('/contact-info',    [ContactInfoController::class, 'update'])->name('contact-info.update');
    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'update', 'destroy']);

    // ── Logs ──────────────────────────────────────────────
    Route::resource('activity-logs', ActivityLogController::class)->only(['index', 'show', 'destroy']);
    Route::delete('/activity-logs',  [ActivityLogController::class, 'clear'])->name('activity-logs.clear');

});


Route::resource('page-sections', PageSectionController::class);

//============= Frontend ===============
Route::get("/", function () {
    $section = PageSection::where('page','home')
                ->where('is_active',1)
                ->orderBy('sort_order')
                ->limit(1)
                ->get()
                ->groupBy('section_key');

    $contact = Setting::where('group_name','social')->get();

    $work = SectionItem::where('section_key', 'how_we_work')
    ->where('is_active',1)
    ->orderBy('title_en')
    ->limit(6)
    ->get();


    $why_led = SectionItem::where('section_key','why_led_events')
                ->where('is_active',1)
                ->orderBy('sort_order')
                ->limit(3)
                ->get();

     $event = SectionItem::where('section_key','media')
            ->where('is_active',1)
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

    $project = SectionItem::where('section_key','project')
                ->where('is_active',1)
                ->orderBy('sort_order')
                ->limit(3)
                ->get();

    $projects = SectionItem::where('section_key','project')
                ->where('is_active',1)
                ->orderBy('sort_order')
                ->limit(8)
                ->get();

    return view('welcome',compact(['section','contact','work','why_led','event','project','projects']));
})->name('home');

Route::get('/services', function (\Illuminate\Http\Request $request) {

    $type = $request->get('type');

    $section = PageSection::where('page','services')
    ->where('is_active',1)
    ->orderBy('sort_order')
    ->first();

    $service = SectionItem::where('section_key', 'services')
        ->where('is_active', 1)
        ->when($type, function ($q) use ($type) {
            $q->where('group_title', $type);
        })
        ->orderBy('sort_order')
        ->get();

    return view('frontend.pages.services', compact('service', 'type','section'));

})->name('services');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');

Route::get('/why-us', function () {

    $us = SectionItem::where('section_key','why_us')
                        ->where('is_active',1)
                        ->orderBy('sort_order')
                        ->limit(5)
                        ->get();

    $section = PageSection::where('page','why-us')
    ->where('is_active',1)
    ->orderBy('sort_order')
    ->first();


    return view('frontend.pages.whyUs',compact(['us','section']));
})->name('why-us');

Route::get('/blog', function (\Illuminate\Http\Request $request) {

    $type = $request->get('type');

    $blog = SectionItem::where('section_key', 'blog')
        ->where('is_active', 1)
        ->when($type, function ($q) use ($type) {
            $q->where('group_title', $type);
        })
        ->orderBy('sort_order')
        ->get();

    $section = PageSection::where('page','blog')
    ->where('is_active',1)
    ->orderBy('sort_order')
    ->first();

    return view('frontend.pages.blog', compact('blog', 'type','section'));
})->name('blog');

Route::get('/blog/{id}',function ($id){
    $article = SectionItem::where('section_key','blog')
                ->where('is_active',1)
                ->FindOrFail($id);

    return view('frontend.pages.blog-detail',compact('article'));
})->name('blog.show');

Route::get('/projects', function (\Illuminate\Http\Request $request) {

    $type = $request->get('type');

    $query = SectionItem::where('section_key', 'project')
        ->where('is_active', 1)
        ->when($type, function ($q) use ($type) {
            $q->where('group_title', $type);
        })
        ->orderBy('sort_order');

    $project = $query->get();

    $section = PageSection::where('page','projects')
    ->where('is_active',1)
    ->orderBy('sort_order')
    ->first();

    return view('frontend.pages.projects', compact('project', 'type','section'));

})->name('projects');

Route::get('/project/{id}', function ($id){
    $project = SectionItem::where('section_key', 'project')
        ->where('is_active', 1)
        ->where('id', $id)
        ->firstOrFail();

    return view('frontend.pages.project-detail', compact('project'));
});

Route::get('/media', function () {
    $event = SectionItem::where('group_title','Event Video')
            ->where('is_active',1)
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

    $gallery = SectionItem::where('group_title','Gallery')
            ->where('is_active',1)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

    $behind = SectionItem::where('group_title','Behind the Scenes')
            ->where('is_active',1)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

    $section = PageSection::where('page','media')
    ->where('is_active',1)
    ->orderBy('sort_order')
    ->first();

    return view('frontend.pages.media', compact(['event','gallery','behind','section']));
})->name('media');

Route::get('/media/{id}', function ($id){

    $media = SectionItem::where('section_key', 'media')
        ->where('is_active', 1)
        ->where('id', $id)
        ->firstOrFail();

    return view('frontend.pages.media-detail', compact('media'));
})->name('media.show');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
