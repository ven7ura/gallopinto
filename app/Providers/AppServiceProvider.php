<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Renderer\FencedCodeRenderer;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use Spatie\Sheets\ContentParsers\MarkdownParser;
use Spatie\Sheets\ContentParsers\MarkdownWithFrontMatterParser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app
        //     ->when([MarkdownParser::class, MarkdownWithFrontMatterParser::class])
        //     ->needs(CommonMarkConverter::class)
        //     ->give(function() {
        //         $enviroment = Environment::createCommonMarkEnvironment();
        //         $enviroment->addBlockRenderer(FencedCode::class, new FencedCodeRenderer(['html', 'php', 'js', 'python']));

        //         return new CommonMarkConverter(['safe' => true], $enviroment);
        //     });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
