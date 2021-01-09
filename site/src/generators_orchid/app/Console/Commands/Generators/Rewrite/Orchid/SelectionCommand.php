<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\SelectionCommand as Selection;

class SelectionCommand extends Selection
{
    use GeneratorsPath, GeneratorsPathHelper;
}
