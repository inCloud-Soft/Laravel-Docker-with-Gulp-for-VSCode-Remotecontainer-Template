<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\ResourceMakeCommand as ResourceCommand;

class ResourceMakeCommand extends ResourceCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}