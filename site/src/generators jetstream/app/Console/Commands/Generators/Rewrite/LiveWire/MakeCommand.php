<?php

namespace App\Console\Commands\Generators\Rewrite\LiveWire;
use Livewire\Commands\MakeCommand as Make;
use App\Console\Commands\Generators\Rewrite\LiveWire\Traits\LiveWireHelper;
use Illuminate\Support\Facades\File;
use App\Console\Commands\Generators\Rewrite\Stock\Traits\GeneratorsPathHelper;

class MakeCommand extends Make
{
    use GeneratorsPathHelper, LiveWireHelper;

    protected $signature = 'livewire:make {name} {--force} {--feature=} {--dist} {--inline}';

    protected function createClass($force = false, $inline = false)
    {

        $classPath = $this->getPath($this->parser->classPath());
        $this->comment("classPath: $classPath");

        if (File::exists($classPath) && ! $force) {
            $this->line("<options=bold,reverse;fg=red> WHOOPS-IE-TOOTLES </> 😳 \n");
            $this->line("<fg=red;options=bold>Class already exists:</> {$this->parser->relativeClassPath()}");

            return false;
        }

        $this->ensureDirectoryExists($classPath);

        File::put($classPath, $this->parser->classContents($inline));

        return $classPath;
    }

    protected function createView($force = false, $inline = false)
    {
        if ($inline) {
            return false;
        }
        $viewPath = $this->getPath($this->parser->viewPath());
        $this->comment("viewPath: $viewPath");

        if (File::exists($viewPath) && ! $force) {
            $this->line("<fg=red;options=bold>View already exists:</> {$this->parser->relativeViewPath()}");

            return false;
        }

        $this->ensureDirectoryExists($viewPath);

        File::put($viewPath, $this->parser->viewContents());

        return $viewPath;
    }
}
