<?php

namespace App\Console\Commands\Generators\Rewrite\LiveWire;
use Livewire\Commands\DeleteCommand as Delete;
use App\Console\Commands\Generators\Rewrite\LiveWire\Traits\LiveWireHelper;
use App\Console\Commands\Generators\Rewrite\Stock\Traits\GeneratorsPathHelper;

class DeleteCommand extends Delete
{
    use GeneratorsPathHelper, LiveWireHelper;

    protected $signature = 'livewire:delete {name} {--feature=} {--dist} {--inline} {--force}';

    protected function removeClass($force = false)
    {
        $classPath = $this->getPath($this->parser->classPath());
        $this->deleteFile($classPath, $force);

        if ($classPath != $this->parser->classPath()){
            return $this->deleteFile($this->parser->classPath(), $force);
        }

        return $classPath;
    }

    protected function removeView($force = false)
    {
        $viewPath = $this->getPath($this->parser->viewPath());
        $this->deleteFile($viewPath, $force);

        if ($viewPath != $this->parser->viewPath()){
            return $this->deleteFile($this->parser->viewPath(), $force);
        }

        return $viewPath;
    }
}
