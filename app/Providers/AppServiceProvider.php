<?php

namespace App\Providers;

use App\Models\Admin\ClientSection;
use App\Models\Admin\ContactSection;
use App\Models\Admin\Language;
use App\Models\Admin\PanelMode;
use App\Models\Admin\Seo;
use App\Models\Frontend\Comment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (Schema::hasTable('seos')) {
            // Retrieve the first model
            $seo = Seo::first();
            View::share('seo', $seo);
        }

        if (Schema::hasTable('contact_sections')) {
            // Retrieve messages
            $unread_messages = ContactSection::where('read', 0)->orderBy('id', 'desc')->take(3)->get();
            View::share('unread_messages', $unread_messages);
        }

        if (Schema::hasTable('comments')) {
            // Retrieve comments
            $unapproval_comments = Comment::where('approval', 0)->orderBy('id', 'desc')->take(4)->get();
            View::share('unapproval_comments', $unapproval_comments);
        }

        if (Schema::hasTable('client_sections')) {
            // Retrieve comments
            $unapproval_reviews = ClientSection::where('approval', 0)->orderBy('id', 'desc')->take(4)->get();
            View::share('unapproval_reviews', $unapproval_reviews);
        }

        if (Schema::hasTable('panel_modes')) {
            // Retrieve the first model
            $panel_mode = PanelMode::first();
            View::share('panel_mode', $panel_mode);
        }


        if (Schema::hasTable('languages')) {
            // Retrieve the first model
            $language = Language::where('status', 1)->first();

            if (isset($language)) {
                $language_code = $language->language_code;
                App::setLocale($language_code);
            }

        }
    }
}
