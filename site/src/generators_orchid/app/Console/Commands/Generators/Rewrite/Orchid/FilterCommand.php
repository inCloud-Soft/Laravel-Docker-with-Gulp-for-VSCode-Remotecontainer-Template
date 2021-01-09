<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\FilterCommand as Filter;

class FilterCommand extends Filter
{
    use GeneratorsPath, GeneratorsPathHelper;
}
