<?php
namespace App\Console\Commands;

use App\Console\Commands\GeneratorsPath;
use App\Console\Commands\GeneratorsPathHelper;
use App\Console\Commands\GeneratorsMigratePath;
use App\Console\Commands\GeneratorsBatchMigratePath;
use Symfony\Component\Console\Input\InputOption;

use Illuminate\Foundation\Console\ModelMakeCommand as ModelCommand;
use Illuminate\Routing\Console\ControllerMakeCommand as ControllerCommand;
use Illuminate\Database\Console\Seeds\SeederMakeCommand as SeederCommand;
use Illuminate\Foundation\Console\EventMakeCommand as EventCommand;
use Illuminate\Foundation\Console\ExceptionMakeCommand as ExceptionCommand;
use Illuminate\Foundation\Console\JobMakeCommand as JobCommand;
use Illuminate\Foundation\Console\ListenerMakeCommand as ListenerCommand;
use Illuminate\Foundation\Console\ProviderMakeCommand as ProviderCommand;
use Illuminate\Foundation\Console\RequestMakeCommand as RequestCommand;
use Illuminate\Foundation\Console\ResourceMakeCommand as ResourceCommand;
use Illuminate\Foundation\Console\RuleMakeCommand as RuleCommand;
use Illuminate\Foundation\Console\TestMakeCommand as TestCommand;
use Illuminate\Routing\Console\MiddlewareMakeCommand as MiddlewareCommand;
use Illuminate\Database\Console\Migrations\MigrateMakeCommand as MigrateCommand;
use Illuminate\Queue\Console\BatchesTableCommand as BatchesCommand;

trait MigrationGeneratorPath{
    use GeneratorsMigratePath;
}

class ModelMakeCommand extends ModelCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class ControllerMakeCommand extends ControllerCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class SeederMakeCommand extends SeederCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class EventMakeCommand extends EventCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class ExceptionMakeCommand extends ExceptionCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class JobMakeCommand extends JobCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class ListenerMakeCommand extends ListenerCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class ProviderMakeCommand extends ProviderCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class RequestMakeCommand extends RequestCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class ResourceMakeCommand extends ResourceCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class RuleMakeCommand extends RuleCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class TestMakeCommand extends TestCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class MiddlewareMakeCommand extends MiddlewareCommand
{
    use GeneratorsPath, GeneratorsPathHelper;
}

class MigrateMakeCommand extends MigrateCommand
{
    use MigrationGeneratorPath, GeneratorsPathHelper;
}

class BatchesTableCommand extends BatchesCommand
{
    use GeneratorsPathHelper, GeneratorsBatchMigratePath;
}

