<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\ExceptionMakeCommand as ExceptionCommand;

class ExceptionMakeCommand extends ExceptionCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}