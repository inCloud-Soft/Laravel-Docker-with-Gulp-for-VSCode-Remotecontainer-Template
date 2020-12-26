<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Foundation\Console\RuleMakeCommand as RuleCommand;

class RuleMakeCommand extends RuleCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}