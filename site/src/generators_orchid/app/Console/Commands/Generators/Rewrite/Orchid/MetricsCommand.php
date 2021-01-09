<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\MetricsCommand as Metrics;

class MetricsCommand extends Metrics
{
    use GeneratorsPath, GeneratorsPathHelper;
}
