<?php
namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputOption;

trait GeneratorsBatchMigratePath{
    protected function getBaseMigrationPath()
    {
        if (($this->hasOption('feature') && $this->option('feature'))){
            return $this->getFeaturePath($this->laravel->databasePath().'/migrations');
        }

        if($this->getDistConformation() || $this->Option('dist')){
            return $this->laravel->databasePath().'/migrations';
        }

        $warning = "You miss --feature option or it is empty. Use --dist option to bypass this warning.";

        $this->alert("\033[01;31m $warning \033[0m");
        $confirmed = $this->confirm('Do you realy wont to create it in dist folder?');

        if ($confirmed) {
            $this->setDistConformation();
            return $this->laravel->databasePath().'/migrations';
        } else {
            $this->comment('Command Canceled!');
            exit;
        }
    }
    protected function createBaseMigration($table = 'failed_jobs')
    {
        $path = $this->getBaseMigrationPath();

        return $this->laravel['migration.creator']->create(
            'create_'.$table.'_table', $path
        );
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
