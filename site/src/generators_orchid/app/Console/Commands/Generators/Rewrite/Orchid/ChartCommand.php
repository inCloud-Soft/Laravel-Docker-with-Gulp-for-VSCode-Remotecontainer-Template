<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\ChartCommand as Chart;

class ChartCommand extends Chart
{
    use GeneratorsPath, GeneratorsPathHelper;
}
