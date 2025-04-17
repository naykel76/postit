<?php

namespace Naykel\Postit;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Naykel\Postit\Commands\InstallCommand;
use Naykel\Postit\Livewire\PostCreateEdit;
use Naykel\Postit\Livewire\PostTable;

class PostitServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('post-table', PostTable::class);
            Livewire::component('post-create-edit', PostCreateEdit::class);
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
