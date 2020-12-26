<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\EventMakeCommand as EventCommand;

class EventMakeCommand extends EventCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}
