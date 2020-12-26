<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Illuminate\Foundation\Console\ModelMakeCommand as ModelCommand;


class ModelMakeCommand extends ModelCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}
