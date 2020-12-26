<?php
namespace App\Console\Commands\Generators\Rewrite\Stock;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};

use Illuminate\Database\Console\Seeds\SeederMakeCommand as SeederCommand;

class SeederMakeCommand extends SeederCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}
