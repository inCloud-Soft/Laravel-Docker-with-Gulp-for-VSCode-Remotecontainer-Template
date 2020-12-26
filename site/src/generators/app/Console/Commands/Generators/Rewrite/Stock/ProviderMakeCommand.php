<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\ProviderMakeCommand as ProviderCommand;

class ProviderMakeCommand extends ProviderCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}