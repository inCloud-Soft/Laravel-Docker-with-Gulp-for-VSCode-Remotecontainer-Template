<?php

namespace App\Providers\Console\Commands\Generators\Rewrite;

//use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use App\Console\Commands\Generators\Rewrite\Stock\MigrateMakeCommand;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Console\Commands\Generators\Rewrite\Stock\MigrationCreator;

use Illuminate\Database\MigrationServiceProvider as MigrationProvider;

class ExtendMigrationServiceProvider extends MigrationProvider implements DeferrableProvider
{
    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateMakeCommand()
    {
        $this->app->singleton('command.migrate.make', function ($app) {
            // Once we have the migration creator registered, we will create the command
            // and inject the creator. The creator is responsible for the actual file
            // creation of the migrations, and may be extended by these developers.
            $creator = $app['migration.creator'];

            $composer = $app['composer'];

            return new MigrateMakeCommand($creator, $composer);
        });
    }

    /**
     * Register the migration creator.
     *
     * @return void
     */
    protected function registerCreator()
    {
        $this->app->singleton('migration.creator', function ($app) {
            return new MigrationCreator($app['files'], $app->basePath('stubs'));
        });
    }
}
