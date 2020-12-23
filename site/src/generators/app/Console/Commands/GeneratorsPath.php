<?php
namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

use Illuminate\Foundation\Console\ModelMakeCommand as Command;
trait GeneratorsPath{
    
    private $dist_conformation = false;

    private function  getDistConformation(){
        return $this->dist_conformation;
    }

    private function  setDistConformation(){
        $this->dist_conformation = true;
    }

    protected function getFeaturePath($path, $name)
    {
        if (empty(config("app.features_path"))) {
            $warning = "Did you miss FEATURES_PATH enviroment variable? Check for .env file in Laravel installation folder";
            $this->alert("\033[01;31m $warning \033[0m");
            exit;
        }

        $feature_path = rtrim(config("app.features_path"), '/') . "/" . $this->option('feature');
        $path = Str::replaceFirst(base_path(), $feature_path, $path);
        
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
        return $path;
    }

    /**
     * Get the destination class path (where to store a file).
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $original_name = $name;
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        if (($this->hasOption('feature') && $this->option('feature'))){
            return $this->getFeaturePath(parent::getPath($original_name), $original_name);
        } 

        if($this->getDistConformation() || $this->Option('dist')){
            return parent::getPath($name);
        } 

        $warning = "You miss --feature option or it is empty. Use --dist option to bypass this warning.";
    
        $this->alert("\033[01;31m $warning \033[0m");
        $confirmed = $this->confirm('Do you realy wont to create it in dist folder?');

        if ($confirmed) {
            $this->setDistConformation();
            return parent::getPath($original_name);
        } else {
            $this->comment('Command Canceled!');
            exit;
        }
    }

    /**
     * Add new console command options to parent`s one.
     *
     * @return array
     */
    protected function getOptions()
    {
        $options = parent::getOptions();
        $options[] = ['feature', null, InputOption::VALUE_OPTIONAL, 'Feature folder'];
        $options[] = ['dist', null, InputOption::VALUE_NONE, 'Create in laravel`s folder'];
        return $options;
    }
}