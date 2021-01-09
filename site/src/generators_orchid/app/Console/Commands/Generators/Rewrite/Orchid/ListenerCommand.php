<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\ListenerCommand as Listener;

class ListenerCommand extends Listener
{
    use GeneratorsPath, GeneratorsPathHelper;
}
