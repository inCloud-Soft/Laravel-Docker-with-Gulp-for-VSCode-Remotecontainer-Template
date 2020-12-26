<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPathHelper,
    GeneratorsMigratePath,
};

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as MigrateCommand;

class MigrateMakeCommand extends MigrateCommand
{
   use GeneratorsMigratePath, GeneratorsPathHelper;
}
