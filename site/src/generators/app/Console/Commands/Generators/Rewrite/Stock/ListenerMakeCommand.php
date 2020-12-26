<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\ListenerMakeCommand as ListenerCommand;

class ListenerMakeCommand extends ListenerCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}