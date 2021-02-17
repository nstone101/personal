<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['XSS'])->group(function () {
    Auth::routes();
});

// Start Frontend
Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home.index');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('service', 'ServicePageController@index')->name('service-page.index');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('portfolio', 'PortfolioPageController@index')->name('portfolio-page.index');
    Route::get('portfolio/{slug}', 'PortfolioPageController@show')->name('portfolio-page.show');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::post('comment', 'CommentController@store')->name('comment.store');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::post('contact', 'ContactPageController@store')->name('contact-page.store');
});

Route::namespace('Admin')->middleware(['XSS'])->group(function () {
    Route::post('testimonial', 'ClientSectionController@store')->name('testimonial.store');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('blog', 'BlogPageController@index')->name('blog-page.index');
    Route::get('blog/{slug}', 'BlogPageController@show')->name('blog-page.show');
    Route::get('blog/category/{category_name}', 'BlogPageController@category_show')->name('blog-category.show');
    Route::post('blog/search', 'BlogPageController@search')->name('blog-page.search');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('gallery/{slug}', 'GalleryPageController@show')->name('gallery-page.show');
    Route::post('gallery/category-select', 'GalleryPageController@category_select')->name('gallery-page.category-select');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('page/{slug}', 'AnyPageController@show')->name('any-page.show');
});
// End Frontend

// Start Admin Panel
Route::middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/dashboard', 'HomeController@index')->name('dashboard');
});

Route::namespace('Admin')->middleware(['XSS'])->group(function () {
    Route::patch('admin-panel/panel-mode', 'PanelModeController@update_mode')->name('panel-mode.update_mode');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('admin-panel/profile/{id}', 'ProfileController@update')->name('profile.update');
    Route::get('admin-panel/profile/change-password', 'ProfileController@change_password_edit')->name('profile.change_password_edit');
    Route::put('admin-panel/profile/change-password/update', 'ProfileController@change_password_update')->name('profile.change_password_update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/site-info', 'SiteInfoController@create')->name('site-info.create');
    Route::post('admin-panel/site-info', 'SiteInfoController@store')->name('site-info.store');
    Route::put('admin-panel/site-info/{id}', 'SiteInfoController@update')->name('site-info.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/homepage-version', 'HomepageVersionController@create')->name('homepage-version.create');
    Route::post('admin-panel/homepage-version', 'HomepageVersionController@store')->name('homepage-version.store');
    Route::put('admin-panel/homepage-version/{id}', 'HomepageVersionController@update')->name('homepage-version.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/breadcrumbs', 'BreadcrumbsController@create')->name('breadcrumbs.create');
    Route::post('admin-panel/breadcrumbs', 'BreadcrumbsController@store')->name('breadcrumbs.store');
    Route::put('admin-panel/breadcrumbs/{id}', 'BreadcrumbsController@update')->name('breadcrumbs.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/google-analytic', 'GoogleAnalyticController@create')->name('google-analytic.create');
    Route::post('admin-panel/google-analytic', 'GoogleAnalyticController@store')->name('google-analytic.store');
    Route::put('admin-panel/google-analytic/{id}', 'GoogleAnalyticController@update')->name('google-analytic.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/external-url', 'ExternalUrlController@create')->name('external-url.create');
    Route::post('admin-panel/external-url', 'ExternalUrlController@store')->name('external-url.store');
    Route::put('admin-panel/external-url/{id}', 'ExternalUrlController@update')->name('external-url.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/social-media', 'SocialController@index')->name('social-media.index');
    Route::post('admin-panel/social-media', 'SocialController@store')->name('social-media.store');
    Route::get('admin-panel/{id}/edit-social-media', 'SocialController@edit')->name('social-media.edit');
    Route::put('admin-panel/social-media/{id}', 'SocialController@update')->name('social-media.update');
    Route::patch('admin-panel/social-media/update_status/{id}', 'SocialController@update_status')->name('social-media.update_status');
    Route::delete('admin-panel/social-media/{id}', 'SocialController@destroy')->name('social-media.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/section', 'SectionController@index')->name('section.index');
    Route::get('admin-panel/{id}/edit-section', 'SectionController@edit')->name('section.edit');
    Route::put('admin-panel/section/{id}', 'SectionController@update')->name('section.update');
    Route::patch('admin-panel/section/update_status/{id}', 'SectionController@update_status')->name('section.update_status');
    Route::patch('admin-panel/section/update_status_other/{id}', 'SectionController@update_status_other')->name('section.update_status_other');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/seo', 'SeoController@create')->name('seo.create');
    Route::post('admin-panel/seo', 'SeoController@store')->name('seo.store');
    Route::put('admin-panel/seo/{id}', 'SeoController@update')->name('seo.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/color-picker', 'ColorPickerController@create')->name('color-picker.create');
    Route::post('admin-panel/color-picker', 'ColorPickerController@store')->name('color-picker.store');
    Route::put('admin-panel/color-picker/{id}', 'ColorPickerController@update')->name('color-picker.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/fixed-content', 'FixedContentController@create')->name('fixed-content.create');
    Route::post('admin-panel/fixed-content', 'FixedContentController@store')->name('fixed-content.store');
    Route::put('admin-panel/fixed-content/{id}', 'FixedContentController@update')->name('fixed-content.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/static-view', 'StaticViewController@create')->name('static-view.create');
    Route::post('admin-panel/static-view', 'StaticViewController@store')->name('static-view.store');
    Route::put('admin-panel/static-view/{id}', 'StaticViewController@update')->name('static-view.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/slider-view', 'SliderViewController@index')->name('slider-view.index');
    Route::post('admin-panel/slider-view', 'SliderViewController@store')->name('slider-view.store');
    Route::get('admin-panel/{id}/edit-slider-view', 'SliderViewController@edit')->name('slider-view.edit');
    Route::put('admin-panel/slider-view/{id}', 'SliderViewController@update')->name('slider-view.update');
    Route::delete('admin-panel/slider-view/{id}', 'SliderViewController@destroy')->name('slider-view.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/video-view', 'VideoViewController@create')->name('video-view.create');
    Route::post('admin-panel/video-view', 'VideoViewController@store')->name('video-view.store');
    Route::put('admin-panel/video-view/{id}', 'VideoViewController@update')->name('video-view.update');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/workshop-category', 'WorkshopCategoryController@index')->name('workshop-category.index');
    Route::post('admin-panel/workshop-category', 'WorkshopCategoryController@store')->name('workshop-category.store');
    Route::get('admin-panel/{id}/edit-workshop-category', 'WorkshopCategoryController@edit')->name('workshop-category.edit');
    Route::put('admin-panel/workshop-category/{id}', 'WorkshopCategoryController@update')->name('workshop-category.update');
    Route::delete('admin-panel/workshop-category/{id}', 'WorkshopCategoryController@destroy')->name('workshop-category.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/workshop-project', 'WorkshopProjectController@index')->name('workshop-project.index');
    Route::post('admin-panel/workshop-project', 'WorkshopProjectController@store')->name('workshop-project.store');
    Route::get('admin-panel/workshop-project/add-workshop-project', 'WorkshopProjectController@create')->name('workshop-project.create');
    Route::get('admin-panel/{id}/edit-workshop-project', 'WorkshopProjectController@edit')->name('workshop-project.edit');
    Route::put('admin-panel/workshop-project/{id}', 'WorkshopProjectController@update')->name('workshop-project.update');
    Route::delete('admin-panel/workshop-project/{id}', 'WorkshopProjectController@destroy')->name('workshop-project.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/workshop-slider', 'WorkshopSliderController@index')->name('workshop-slider.index');
    Route::post('admin-panel/workshop-slider', 'WorkshopSliderController@store')->name('workshop-slider.store');
    Route::get('admin-panel/{id}/edit-workshop-slider', 'WorkshopSliderController@edit')->name('workshop-slider.edit');
    Route::put('admin-panel/workshop-slider/{id}', 'WorkshopSliderController@update')->name('workshop-slider.update');
    Route::delete('admin-panel/workshop-slider/{id}', 'WorkshopSliderController@destroy')->name('workshop-slider.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/blog-category', 'CategoryController@index')->name('blog-category.index');
    Route::post('admin-panel/blog-category', 'CategoryController@store')->name('blog-category.store');
    Route::get('admin-panel/{id}/edit-blog-category', 'CategoryController@edit')->name('blog-category.edit');
    Route::put('admin-panel/blog-category/{id}', 'CategoryController@update')->name('blog-category.update');
    Route::delete('admin-panel/blog-category/{id}', 'CategoryController@destroy')->name('blog-category.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/blog', 'BlogController@index')->name('blog.index');
    Route::post('admin-panel/blog', 'BlogController@store')->name('blog.store');
    Route::get('admin-panel/{id}/edit-blog', 'BlogController@edit')->name('blog.edit');
    Route::put('admin-panel/blog/{id}', 'BlogController@update')->name('blog.update');
    Route::patch('admin-panel/blog/update_feature/{id}', 'BlogController@update_feature')->name('blog.update_feature');
    Route::delete('admin-panel/blog/{id}', 'BlogController@destroy')->name('blog.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/gallery-category', 'GalleryCategoryController@index')->name('gallery-category.index');
    Route::post('admin-panel/gallery-category', 'GalleryCategoryController@store')->name('gallery-category.store');
    Route::get('admin-panel/{id}/edit-gallery-category', 'GalleryCategoryController@edit')->name('gallery-category.edit');
    Route::put('admin-panel/gallery-category/{id}', 'GalleryCategoryController@update')->name('gallery-category.update');
    Route::delete('admin-panel/gallery-category/{id}', 'GalleryCategoryController@destroy')->name('gallery-category.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/gallery', 'GalleryController@index')->name('gallery.index');
    Route::post('admin-panel/gallery', 'GalleryController@store')->name('gallery.store');
    Route::get('admin-panel/{id}/edit-gallery', 'GalleryController@edit')->name('gallery.edit');
    Route::put('admin-panel/gallery/{id}', 'GalleryController@update')->name('gallery.update');
    Route::delete('admin-panel/gallery/{id}', 'GalleryController@destroy')->name('gallery.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/about-section', 'AboutSectionController@create')->name('about-section.create');
    Route::post('admin-panel/about-section', 'AboutSectionController@store')->name('about-section.store');
    Route::put('admin-panel/about-section/{id}', 'AboutSectionController@update')->name('about-section.update');
    Route::post('admin-panel/info', 'AboutSectionController@store_info')->name('about-section.store_info');
    Route::put('admin-panel/about-section/update_info/{id}', 'AboutSectionController@update_info')->name('about-section.update_info');
    Route::get('admin-panel/{id}/about-section', 'AboutSectionController@edit_info')->name('about-section.edit_info');
    Route::delete('admin-panel/about-section/{id}', 'AboutSectionController@destroy_info')->name('about-section.destroy_info');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/resume-section', 'ResumeSectionController@index')->name('resume-section.index');
    Route::post('admin-panel/resume-section', 'ResumeSectionController@store')->name('resume-section.store');
    Route::get('admin-panel/{id}/edit-resume-section', 'ResumeSectionController@edit')->name('resume-section.edit');
    Route::put('admin-panel/resume-section/{id}', 'ResumeSectionController@update')->name('resume-section.update');
    Route::delete('admin-panel/resume-section/{id}', 'ResumeSectionController@destroy')->name('resume-section.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::post('admin-panel/skill-background', 'SkillSectionController@store')->name('skill-background.store');
    Route::put('admin-panel/skill-background/{id}', 'SkillSectionController@update')->name('skill-background.update');
    Route::get('admin-panel/skill', 'SkillSectionItemController@index')->name('skill.index');
    Route::post('admin-panel/skill', 'SkillSectionItemController@store')->name('skill.store');
    Route::get('admin-panel/{id}/edit-skill', 'SkillSectionItemController@edit')->name('skill.edit');
    Route::put('admin-panel/skill/{id}', 'SkillSectionItemController@update')->name('skill.update');
    Route::delete('admin-panel/skill/{id}', 'SkillSectionItemController@destroy')->name('skill.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/counter-section', 'CounterSectionController@index')->name('counter-section.index');
    Route::post('admin-panel/counter-section', 'CounterSectionController@store')->name('counter-section.store');
    Route::get('admin-panel/{id}/edit-counter-section', 'CounterSectionController@edit')->name('counter-section.edit');
    Route::put('admin-panel/counter-section/{id}', 'CounterSectionController@update')->name('counter-section.update');
    Route::delete('admin-panel/counter-section/{id}', 'CounterSectionController@destroy')->name('counter-section.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/service-section', 'ServiceSectionController@index')->name('service-section.index');
    Route::post('admin-panel/service-section', 'ServiceSectionController@store')->name('service-section.store');
    Route::get('admin-panel/{id}/edit-service-section', 'ServiceSectionController@edit')->name('service-section.edit');
    Route::put('admin-panel/service-section/{id}', 'ServiceSectionController@update')->name('service-section.update');
    Route::delete('admin-panel/service-section/{id}', 'ServiceSectionController@destroy')->name('service-section.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::post('admin-panel/why-choose-background', 'WhyChooseSectionController@store')->name('why-choose-background.store');
    Route::put('admin-panel/why-choose-background/{id}', 'WhyChooseSectionController@update')->name('why-choose-background.update');
    Route::get('admin-panel/why-choose', 'WhyChooseSectionItemController@index')->name('why-choose.index');
    Route::post('admin-panel/why-choose', 'WhyChooseSectionItemController@store')->name('why-choose.store');
    Route::get('admin-panel/{id}/edit-why-choose', 'WhyChooseSectionItemController@edit')->name('why-choose.edit');
    Route::put('admin-panel/why-choose/{id}', 'WhyChooseSectionItemController@update')->name('why-choose.update');
    Route::delete('admin-panel/why-choose/{id}', 'WhyChooseSectionItemController@destroy')->name('why-choose.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/client-section', 'ClientSectionController@index')->name('client-section.index');
    Route::put('admin-panel/client-section/{id}', 'ClientSectionController@update')->name('client-section.update');
    Route::patch('admin-panel/client-section/mark_all', 'ClientSectionController@mark_all_approval_update')->name('client-section.mark_all_approval_update');
    Route::delete('admin-panel/client-section/{id}', 'ClientSectionController@destroy')->name('client-section.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/team-section', 'TeamSectionController@index')->name('team-section.index');
    Route::post('admin-panel/team-section', 'TeamSectionController@store')->name('team-section.store');
    Route::get('admin-panel/{id}/edit-team-section', 'TeamSectionController@edit')->name('team-section.edit');
    Route::put('admin-panel/team-section/{id}', 'TeamSectionController@update')->name('team-section.update');
    Route::delete('admin-panel/team-section/{id}', 'TeamSectionController@destroy')->name('team-section.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/sponsor', 'SponsorController@index')->name('sponsor.index');
    Route::post('admin-panel/sponsor', 'SponsorController@store')->name('sponsor.store');
    Route::delete('admin-panel/sponsor/{id}', 'SponsorController@destroy')->name('sponsor.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/custom-section', 'CustomSectionController@index')->name('custom-section.index');
    Route::get('admin-panel/{id}/custom-section', 'CustomSectionController@edit')->name('custom-section.edit');
    Route::post('admin-panel/custom-section', 'CustomSectionController@store')->name('custom-section.store');
    Route::put('admin-panel/custom-section/{id}', 'CustomSectionController@update')->name('custom-section.update');
    Route::delete('admin-panel/custom-section/{id}', 'CustomSectionController@destroy')->name('custom-section.destroy');

});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/any-page', 'AnyPageController@index')->name('any-page.index');
    Route::get('admin-panel/{id}/any-page', 'AnyPageController@edit')->name('any-page.edit');
    Route::post('admin-panel/any-page', 'AnyPageController@store')->name('any-page.store');
    Route::get('admin-panel/any-page/add-any-page', 'AnyPageController@create')->name('any-page.create');
    Route::put('admin-panel/any-page/{id}', 'AnyPageController@update')->name('any-page.update');
    Route::delete('admin-panel/any-page/{id}', 'AnyPageController@destroy')->name('any-page.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/message', 'ContactSectionController@index')->name('message.index');
    Route::post('admin-panel/message', 'ContactSectionController@store')->name('message.store');
    Route::put('admin-panel/message/{id}', 'ContactSectionController@update')->name('message.update');
    Route::patch('admin-panel/message/mark_all', 'ContactSectionController@mark_all_read_update')->name('message.mark_all_read_update');
    Route::delete('admin-panel/message/{id}', 'ContactSectionController@destroy')->name('message.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/comment', 'CommentSectionController@index')->name('comment-section.index');
    Route::put('admin-panel/comment/{id}', 'CommentSectionController@update')->name('comment-section.update');
    Route::patch('admin-panel/comment/mark_all', 'CommentSectionController@mark_all_approval_update')->name('comment-section.mark_all_approval_update');
    Route::delete('admin-panel/comment/{id}', 'CommentSectionController@destroy')->name('comment-section.destroy');
});

Route::namespace('Admin')->middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/language-section', 'LanguageController@create')->name('language-section.create');
    Route::get('admin-panel/{id}/language-section', 'LanguageController@edit')->name('language-section.edit');
    Route::post('admin-panel/language-section', 'LanguageController@store')->name('language-section.store');
    Route::put('admin-panel/language-section/language-select', 'LanguageController@update_language')->name('language-section.update_language');
    Route::put('admin-panel/language-section/{id}', 'LanguageController@update')->name('language-section.update');
    Route::delete('admin-panel/language-section/{id}', 'LanguageController@destroy')->name('language-section.destroy');


    Route::get('admin-panel/{id}/language-keyword', 'LanguageKeywordController@edit')->name('language-keyword.edit');
    Route::post('admin-panel/language-keyword', 'LanguageKeywordController@store')->name('language-keyword.store');
    Route::put('admin-panel/language-keyword/{id}', 'LanguageKeywordController@update')->name('language-keyword.update');
});

Route::middleware(['auth.admin', 'XSS'])->group(function () {
    Route::get('admin-panel/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('dashboard')
            ->with('success','Application cache cleared. OPTIMIZED!');
    });
});
// End Admin Panel
