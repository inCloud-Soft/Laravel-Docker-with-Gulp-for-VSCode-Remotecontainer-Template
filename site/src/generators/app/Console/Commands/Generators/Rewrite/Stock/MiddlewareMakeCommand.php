<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Routing\Console\MiddlewareMakeCommand as MiddlewareCommand;

class MiddlewareMakeCommand extends MiddlewareCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}