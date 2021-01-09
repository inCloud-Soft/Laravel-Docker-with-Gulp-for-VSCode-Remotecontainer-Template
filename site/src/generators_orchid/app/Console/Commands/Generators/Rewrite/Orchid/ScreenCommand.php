<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\ScreenCommand as Screen;

class ScreenCommand extends Screen
{
    use GeneratorsPath, GeneratorsPathHelper;
}
