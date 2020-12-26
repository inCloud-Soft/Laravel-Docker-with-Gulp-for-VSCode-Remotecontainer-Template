<?php

namespace App\Console\Commands\Generators\Rewrite\LiveWire;
use Livewire\Commands\MoveCommand as Move;
use App\Console\Commands\Generators\Rewrite\LiveWire\Traits\LiveWireHelper;
use Illuminate\Support\Facades\File;
use App\Console\Commands\Generators\Rewrite\Stock\Traits\GeneratorsPathHelper;

class MoveCommand extends Move
{
    use GeneratorsPathHelper, LiveWireHelper;

    protected $signature = 'livewire:move {name} {new-name} {--feature=} {--dist} {--force} {--inline}';

    protected function renameClass()
    {
        $path = $this->getPath($this->newParser->classPath());
        
        if (File::exists($path)) {
            $this->line("<options=bold,reverse;fg=red> WHOOPS-IE-TOOTLES </> 😳 \n");
            $this->line("<fg=red;options=bold>Class already exists:</> {$this->newParser->relativeClassPath()}");

            return false;
        }

        $this->ensureDirectoryExists($path);

        File::put($path, $this->newParser->classContents());

        $oldPath = $this->getPath($this->parser->classPath());

        $this->deleteFile($oldPath);

        if ($oldPath != $this->parser->classPath()){
            return $this->deleteFile($this->parser->classPath());
        }

        return $oldPath;
    }

    protected function renameView()
    {
        $path = $this->getPath($this->newParser->viewPath());
        $oldPath = $this->getPath($this->parser->viewPath());

        if (File::exists($path)) {
            $this->line("<fg=red;options=bold>View already exists:</> {$this->newParser->relativeViewPath()}");

            return false;
        }
        
        File::move($oldPath, $path);

        if ($oldPath != $this->parser->viewPath()){
            return $this->deleteFile($this->parser->viewPath());
        }

        return $oldPath;
    }
}
