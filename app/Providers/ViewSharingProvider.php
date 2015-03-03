<?php namespace BoardSoc\Providers;

use Illuminate\Support\ServiceProvider;

class ViewSharingProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer(
            '*',
            'BoardSoc\\Http\\ViewComposers\\LoginLinkComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
	}

}
