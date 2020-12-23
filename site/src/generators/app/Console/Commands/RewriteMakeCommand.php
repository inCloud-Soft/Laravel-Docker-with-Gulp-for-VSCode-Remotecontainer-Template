<?php
namespace App\Console\Commands;

use App\Console\Commands\GeneratorsPath;
//use Symfony\Component\Console\Input\InputOption;

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

class ModelMakeCommand extends ModelCommand
{
    use GeneratorsPath;
}

class ControllerMakeCommand extends ControllerCommand
{
    use GeneratorsPath;
}

class SeederMakeCommand extends SeederCommand
{
    use GeneratorsPath;
}

class EventMakeCommand extends EventCommand
{
    use GeneratorsPath;
}

class JobMakeCommand extends JobCommand
{
    use GeneratorsPath;
}

class ListenerMakeCommand extends ListenerCommand
{
    use GeneratorsPath;
}

class ProviderMakeCommand extends ProviderCommand
{
    use GeneratorsPath;
}

class RequestMakeCommand extends RequestCommand
{
    use GeneratorsPath;
}

class ResourceMakeCommand extends ResourceCommand
{
    use GeneratorsPath;
}

class RuleMakeCommand extends RuleCommand
{
    use GeneratorsPath;
}

class TestMakeCommand extends TestCommand
{
    use GeneratorsPath;
}

class MiddlewareMakeCommand extends MiddlewareCommand
{
    use GeneratorsPath;
}
