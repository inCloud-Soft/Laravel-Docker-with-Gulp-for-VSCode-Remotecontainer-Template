<?php

namespace App\Providers\Console\Commands\Generators\Rewrite;

use Livewire\LivewireServiceProvider as LWServiceProvider;

use Illuminate\View\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\ComponentAttributeBag;
use Livewire\Controllers\FileUploadHandler;
use Livewire\Controllers\FilePreviewHandler;
use Livewire\Controllers\HttpConnectionHandler;
use Livewire\Controllers\LivewireJavaScriptAssets;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Testing\TestResponse;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use App\Console\Commands\Generators\Rewrite\LiveWire\{
    DeleteCommand,
    CopyCommand,
    MakeCommand,
    MoveCommand
};

use Livewire\Commands\{
    CpCommand,
    MvCommand,
    RmCommand,
    StubsCommand,
    TouchCommand,
    PublishCommand,
    ComponentParser,
    DiscoverCommand,
    S3CleanupCommand,
    MakeLivewireCommand,
};
use Livewire\HydrationMiddleware\{
    RenderView,
    PerformActionCalls,
    CallHydrationHooks,
    PerformEventEmissions,
    HydratePublicProperties,
    PerformDataBindingUpdates,
    CallPropertyHydrationHooks,
    SecureHydrationWithChecksum,
    HashDataPropertiesForDirtyDetection,
    NormalizeServerMemoSansDataForJavaScript,
    NormalizeComponentPropertiesForJavaScript,
};
use Livewire\Macros\ViewMacros;

class LivewireServiceProvider extends LWServiceProvider
{
    protected function registerCommands()
    {

        if (! $this->app->runningInConsole()) return;
        $this->commands([
            MakeLivewireCommand::class, // make:livewire
            MakeCommand::class,         // livewire:make
            TouchCommand::class,        // livewire:touch
            CopyCommand::class,         // livewire:copy
            CpCommand::class,           // livewire:cp
            DeleteCommand::class,       // livewire:delete
            RmCommand::class,           // livewire:rm
            MoveCommand::class,         // livewire:move
            MvCommand::class,           // livewire:mv
            StubsCommand::class,        // livewire:stubs
            DiscoverCommand::class,     // livewire:discover
            S3CleanupCommand::class,    // livewire:configure-s3-upload-cleanup
            PublishCommand::class,      // livewire:publish
        ]);
    }
}
