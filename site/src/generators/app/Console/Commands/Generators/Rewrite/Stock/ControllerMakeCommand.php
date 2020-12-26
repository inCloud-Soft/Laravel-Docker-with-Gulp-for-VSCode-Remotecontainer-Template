<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Illuminate\Routing\Console\ControllerMakeCommand as ControllerCommand;

class ControllerMakeCommand extends ControllerCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}
