<?php

declare(strict_types=1);

namespace App\Providers\Console\Commands\Generators\Rewrite;

use Illuminate\Support\ServiceProvider;

use App\Console\Commands\Generators\Rewrite\Orchid\AdminCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\ChartCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\FilterCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\InstallCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\LinkCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\ListenerCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\MetricsCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\PresenterCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\RowsCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\ScreenCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\SelectionCommand;
use App\Console\Commands\Generators\Rewrite\Orchid\TableCommand;

/**
 * Class FoundationServiceProvider.
 * After update run:  php artisan vendor:publish --provider="Orchid\Platform\Providers\FoundationServiceProvider".
 */
class OrchidServiceProvider extends ServiceProvider
{
    /**
     * The available command shortname.
     *
     * @var array
     */
    protected $commands = [
        InstallCommand::class,
        LinkCommand::class,
        AdminCommand::class,
        FilterCommand::class,
        RowsCommand::class,
        ScreenCommand::class,
        TableCommand::class,
        ChartCommand::class,
        MetricsCommand::class,
        SelectionCommand::class,
        ListenerCommand::class,
        PresenterCommand::class,
    ];
}
