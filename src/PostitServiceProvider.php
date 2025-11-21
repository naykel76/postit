<?php

namespace Naykel\Postit;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Naykel\Postit\Commands\InstallCommand;
use Naykel\Postit\Livewire\Posts\CreateEdit;
use Naykel\Postit\Livewire\Posts\Index;

class PostitServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->afterResolving(\Illuminate\View\Compilers\BladeCompiler::class, function () {
            Livewire::component('posts.create-edit', CreateEdit::class);
            Livewire::component('posts.index', Index::class);
        });
    }

    public function boot()
    {
        $this->commands([InstallCommand::class]);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'postit');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}
