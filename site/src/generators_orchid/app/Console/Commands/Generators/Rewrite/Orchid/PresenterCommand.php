<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\PresenterCommand as Presenter;

class PresenterCommand extends Presenter
{
    use GeneratorsPath, GeneratorsPathHelper;
}
