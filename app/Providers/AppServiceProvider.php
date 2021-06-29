<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

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
        // TODO finish this
        Blade::if('admin', function () {
            // return Auth::check() && Auth::user()->isAdmin();
        });

        // TODO use @route('abc') instead of {{ route('abc') }}
        Blade::directive('route', function ($arguments) {
            return "<?php echo route({$arguments}); ?>";
        });

        Blade::if('tab', function ($tab) {
            return Request::is("dashboard/$tab");
            // request()->route;
        });

        Blade::directive('page', function($page) {
            $return = '';
            switch ($page) {
                case 'value':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }

            return "<?php echo $return; ?>";
        });
        
        Blade::directive('truncate', function($expression) {
            // $expression = preg_replace( "/\n\s+/", "\n", rtrim(html_entity_decode(str_replace("&nbsp;", '', strip_tags($expression)))) );
            $expression = strip_tags($expression);

            list($string, $length) = explode(',',str_replace(['(',')',' '], '', $expression));

            return "<?php echo e(strlen({$string}) > {$length} ? substr({$string},0,{$length}).'...' : {$string}); ?>";
            // Str::limit($article->description, 150, '...');
            // <div>{{ str_replace("&nbsp;", '', strip_tags(@truncate($article->description), 150)) }}</div>
        });
    }
}