<?php
namespace App\Console\Commands\Generators\Rewrite\LiveWire\Traits;
use Illuminate\Support\Facades\File;


trait LiveWireHelper {
    protected $path;
    protected $new_path;
    protected $original_path;

    protected function createClass($force = false, $inline = false)
    {
        $classPath = $this->path;
        if (File::exists($classPath) && ! $force) {
            $this->line("<options=bold,reverse;fg=red> WHOOPS-IE-TOOTLES </> 😳 \n");
            $this->line("<fg=red;options=bold>Class already exists:</> {$this->parser->relativeClassPath()}");

            return false;
        }

        $this->ensureDirectoryExists($classPath);

        File::put($classPath, $this->parser->classContents($inline));

        return $classPath;
    }

    protected function getPath($original_path = '')
    {
        if(empty($original_path)){
            $original_path = $this->original_path  = config('livewire.view_path', resource_path('views/livewire'));
        }
        
        if ($this->hasOption('feature') && $this->option('feature')){
            $path = $this->getFeaturePath($original_path);
        } else if($this->getDistConformation() || $this->Option('dist')){
            $path = $original_path;
        } else {
            $warning = "You miss --feature option or it is empty. Use --dist option to bypass this warning.";
        
            $this->alert("\033[01;31m $warning \033[0m");
            $confirmed = $this->confirm('Do you realy wont to create it in dist folder?');

            if ($confirmed) {
                $this->setDistConformation();
                $path = $original_path;
            } else {
                $this->comment('Command Canceled!');
                exit;
            }
        }
        $this->path = $path;
        return $path;
    }
    protected function deleteFile($path, $force = false)
    {
        if (! File::exists($path) && ! $force) {
            $this->line("<fg=red;options=bold>File doesn't exist:</> {$path}");

            return false;
        }

        File::delete($path);

        return $path;
    }
}
