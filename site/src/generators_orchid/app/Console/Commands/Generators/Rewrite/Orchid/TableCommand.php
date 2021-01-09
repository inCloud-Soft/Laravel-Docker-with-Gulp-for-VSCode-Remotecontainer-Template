<?php
namespace App\Console\Commands\Generators\Rewrite\Orchid;

use App\Console\Commands\Generators\Rewrite\Stock\Traits\{
    GeneratorsPath, 
    GeneratorsPathHelper
};
use Orchid\Platform\Commands\TableCommand as Table;

class TableCommand extends Table
{
    use GeneratorsPath, GeneratorsPathHelper;
}
