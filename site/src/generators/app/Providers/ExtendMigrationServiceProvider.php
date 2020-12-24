<?php

namespace App\Providers;

//use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use App\Console\Commands\MigrateMakeCommand;
use Illuminate\Contracts\Support\DeferrableProvider;


use Illuminate\Database\MigrationServiceProvider as MigrationService;

class ExtendMigrationServiceProvider extends MigrationService implements DeferrableProvider
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
}
