<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


/* Portfolio Details routes */
Route::get('portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');

/* Blog Details routes */
Route::get('blog-details/{id}', [HomeController::class, 'showBlog'])->name('show.blog');

/* Blogs routes */
Route::get('blogs', [HomeController::class, 'blog'])->name('blog');

/* Contact routes */
Route::post('contact', [HomeController::class, 'contact'])->name('contact');


// Admin Routes
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    /* Header routes */
    Route::resource('header', HeaderController::class);
    Route::resource('typer-title', TyperTitleController::class);

    /* Services routes */
    Route::resource('service', ServiceController::class);

    /* About routes */
    Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');
    Route::resource('about', AboutController::class);

    /* Portfolio Category route */
    Route::resource('category', CategoryController::class);

    /* Portfolio Item route */
    Route::resource('portfolio-item', PortfolioItemController::class);

    /* Portfolio Section Setting route */
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);

    /* Skill Section Setting route */
    Route::resource('skill-section-setting', SkillSectionSettingController::class);

    /* Skill Items route */
    Route::resource('skill-item', SkillItemController::class);

    /* Experience route */
    Route::resource('experience', ExperienceController::class);

    /* Feedback route */
    Route::resource('feedback', FeedbackController::class);

    /* Feedback Section Setting Route */
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class);

    /* Blog Category Route */
    Route::resource('blog-category', BlogCategoryController::class);

    /* Blog Route */
    Route::resource('blog', BlogController::class);

    /* Blog Section Setting Route */
    Route::resource('blog-section-setting', BlogSectionSettingController::class);

    /* Contact Section Setting Route */
    Route::resource('contact-section-setting', ContactSectionSettingController::class);

    /* Footer Social Link Route */
    Route::resource('footer-social', FooterSocialLinkController::class);

    /* Footer Info Route */
    Route::resource('footer-info', FooterInfoController::class);

    /* Footer Contact Info */
    Route::resource('footer-contact-info', FooterContactInfoController::class);

    /* Footer Useful link Route */
    Route::resource('footer-useful-links', FooterUsefulLinkController::class);

    /* Footer Help link Route */
    Route::resource('footer-help-links', FooterHelpLinkController::class);

    /* Setting Route */
    Route::get('settings', SettingController::class)->name('settings.index');

    /* General Setting Route */
    Route::resource('general-setting', GeneralSettingController::class);

    /* Seo Setting Route */
    Route::resource('seo-setting', SeoSettingController::class);
});
