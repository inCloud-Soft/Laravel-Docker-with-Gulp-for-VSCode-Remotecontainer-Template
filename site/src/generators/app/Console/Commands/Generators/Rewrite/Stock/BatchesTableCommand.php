<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPathHelper,
    GeneratorsBatchMigratePath
};

use Illuminate\Queue\Console\BatchesTableCommand as BatchesCommand;

class BatchesTableCommand extends BatchesCommand
{
    use GeneratorsPathHelper, GeneratorsBatchMigratePath;
}

