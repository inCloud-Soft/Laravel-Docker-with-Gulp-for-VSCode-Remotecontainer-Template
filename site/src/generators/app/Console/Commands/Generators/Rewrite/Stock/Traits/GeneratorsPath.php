<?php
namespace App\Console\Commands\Generators\Rewrite\Stock\Traits;

use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;

trait GeneratorsPath{
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
            $this->line(" >> " . $this->getFeaturePath(parent::getPath($original_name)));
            return $this->getFeaturePath(parent::getPath($original_name));
        } 

        if($this->getDistConformation() || $this->Option('dist')){
            $this->line(" >> " . parent::getPath($name));
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