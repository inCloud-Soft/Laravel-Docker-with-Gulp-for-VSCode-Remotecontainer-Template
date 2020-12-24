<?php

namespace App\Providers;

use App\Console\Commands\ModelMakeCommand;
use App\Console\Commands\ControllerMakeCommand;
use App\Console\Commands\SeederMakeCommand;
use App\Console\Commands\EventMakeCommand;
use App\Console\Commands\ExceptionMakeCommand;
use App\Console\Commands\JobMakeCommand;
use App\Console\Commands\ListenerMakeCommand;
use App\Console\Commands\ProviderMakeCommand;
use App\Console\Commands\RequestMakeCommand;
use App\Console\Commands\ResourceMakeCommand;
use App\Console\Commands\RuleMakeCommand;
use App\Console\Commands\TestMakeCommand;
use App\Console\Commands\MiddlewareMakeCommand;
use App\Console\Commands\BatchesTableCommand;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class ExtendGeneratorsServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * Bootstrap any application services.
     * 
     * @author oops-it!com
     *
     * @return void
     */
    public function boot() 
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModelMakeCommand::class,
                ControllerMakeCommand::class,
                SeederMakeCommand::class,
                EventMakeCommand::class,
                JobMakeCommand::class,
                ListenerMakeCommand::class,
                ProviderMakeCommand::class,
                RequestMakeCommand::class,
                ResourceMakeCommand::class,
                RuleMakeCommand::class,
                TestMakeCommand::class,
                MiddlewareMakeCommand::class
            ]);
        }
    }

    /**
     * Register any application services.
     * 
     * @author oops-it!com
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->app->extend('command.make.model', function () {
                return new ModelMakeCommand;
            });
            $this->app->extend('command.make.controller', function () {
                return new ControllerMakeCommand;
            });
            $this->app->extend('command.make.seeder', function () {
                return new SeederMakeCommand;
            });
            $this->app->extend('command.make.event', function () {
                return new EventMakeCommand;
            });
            $this->app->extend('command.make.exception', function () {
                return new ExceptionMakeCommand;
            });
            $this->app->extend('command.make.job', function () {
                return new JobMakeCommand;
            });
            $this->app->extend('command.make.listener', function () {
                return new ListenerMakeCommand;
            });
            $this->app->extend('command.make.provider', function () {
                return new ProviderMakeCommand;
            });
            $this->app->extend('command.make.request', function () {
                return new RequestMakeCommand;
            });
            $this->app->extend('command.make.resource', function () {
                return new ResourceMakeCommand;
            });
            $this->app->extend('command.make.rule', function () {
                return new RuleMakeCommand;
            });
            $this->app->extend('command.make.test', function () {
                return new TestMakeCommand;
            });
            $this->app->extend('command.make.middleware', function () {
                return new MiddlewareMakeCommand;
            });
            $this->app->singleton('command.queue.batches-table', function ($app) {
                return new BatchesTableCommand($app['files'], $app['composer']);
            });
        }
    }

    /**
     * Provides services.
     * 
     * @author oops-it!com
     *
     * @return void
     */
    public function provides()
    {
        return [
            'command.make.model',
            'command.make.controller',
            'command.make.seeder',
            'command.make.event',
            'command.make.exception',
            'command.make.job',
            'command.make.listener',
            'command.make.provider',
            'command.make.request',
            'command.make.resource',
            'command.make.rule',
            'command.make.test',
            'command.make.middleware'
        ];
    }
}