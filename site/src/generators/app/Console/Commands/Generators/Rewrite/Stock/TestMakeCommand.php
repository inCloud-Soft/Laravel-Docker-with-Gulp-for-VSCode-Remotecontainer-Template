<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\TestMakeCommand as TestCommand;

class TestMakeCommand extends TestCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}