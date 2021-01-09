<?php

namespace App\Console\Commands\Generators\Rewrite\LiveWire;
use Livewire\Commands\CopyCommand as Copy;
use App\Console\Commands\Generators\Rewrite\LiveWire\Traits\LiveWireHelper;
use Illuminate\Support\Facades\File;
use App\Console\Commands\Generators\Rewrite\Stock\Traits\GeneratorsPathHelper;

class CopyCommand extends Copy
{
    use GeneratorsPathHelper, LiveWireHelper;

    protected $signature = 'livewire:copy {name} {new-name} {--feature=} {--dist} {--inline} {--force}';
    
    protected function copyClass($force, $inline)
    {
        if (File::exists($this->newParser->classPath()) && ! $force) {
            $this->line("<options=bold,reverse;fg=red> WHOOPS-IE-TOOTLES </> 😳 \n");
            $this->line("<fg=red;options=bold>Class already exists:</> {$this->newParser->relativeClassPath()}");

            return false;
        }

        $this->ensureDirectoryExists($this->newParser->classPath());

        return File::put($this->getPath($this->newParser->classPath()), $this->newParser->classContents($inline));
    }

    protected function copyView($force)
    {
        if (File::exists($this->newParser->viewPath()) && ! $force) {
            $this->line("<fg=red;options=bold>View already exists:</> {$this->newParser->relativeViewPath()}");

            return false;
        }

        $this->ensureDirectoryExists($this->getPath($this->newParser->viewPath()));

        return File::copy("{$this->getPath($this->parser->viewPath())}", $this->getPath($this->newParser->viewPath()));
    }
}
