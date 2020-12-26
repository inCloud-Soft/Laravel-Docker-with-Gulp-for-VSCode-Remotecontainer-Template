<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\RequestMakeCommand as RequestCommand;

class RequestMakeCommand extends RequestCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}