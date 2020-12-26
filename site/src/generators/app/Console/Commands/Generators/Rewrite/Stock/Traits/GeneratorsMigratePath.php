<?php
namespace App\Console\Commands\Generators\Rewrite\Stock\Traits;

use App\Console\Commands\Generators\Rewrite\Stock\MigrationCreator;
use Illuminate\Support\Composer;


trait GeneratorsMigratePath{
    public function __construct(MigrationCreator $creator, Composer $composer)
    {
        $this->signature .= '
        {--feature= : Subdirectory of src directory}
        {--dist : Create in dist directory}';
        parent::__construct($creator, $composer);
    }
     
    protected function getMigrationPath(){
        if (!empty($this->input->getOption('feature'))) {
            $path = $this->getFeaturePath(parent::getMigrationPath());
            return $path;
        } 
        if($this->getDistConformation() || $this->Option('dist')){
            $path =  parent::getMigrationPath();
            return $path;
        }

        $warning = "You miss --feature option or it is empty. Use --dist option to bypass this warning.";
    
        $this->alert("\033[01;31m $warning \033[0m");
        $confirmed = $this->confirm('Do you realy wont to create it in dist folder?');

        if ($confirmed) {
            $this->setDistConformation();
            $path =  parent::getMigrationPath();
            return $path;
        } else {
            $this->comment('Command Canceled!');
            exit;
        }
    }
}