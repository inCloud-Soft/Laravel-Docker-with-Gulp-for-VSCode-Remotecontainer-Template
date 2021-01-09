<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\RowsCommand as Rows;

class RowsCommand extends Rows
{
    use GeneratorsPath, GeneratorsPathHelper;
}
