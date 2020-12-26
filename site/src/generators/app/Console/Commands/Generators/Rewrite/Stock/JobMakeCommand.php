<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\JobMakeCommand as JobCommand;

class JobMakeCommand extends JobCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}