<?php
namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

trait GeneratorsPathHelper{
    private $dist_conformation = false;

    private function  getDistConformation(){
        return $this->dist_conformation;
    }

    private function  setDistConformation(){
        $this->dist_conformation = true;
    }
    protected function checkFeaturePathEnv(){
        if (empty(config("app.features_path"))) {
            $warning = "Did you miss FEATURES_PATH enviroment variable? Check for .env file in Laravel installation folder";
            $this->alert("\033[01;31m $warning \033[0m");
            exit;
        }
    }
    protected function getFeaturePath($path)
    {
        $this->checkFeaturePathEnv();

        $feature_path = rtrim(config("app.features_path"), '/') . "/" . $this->option('feature');
        $path = Str::replaceFirst(base_path(), $feature_path, $path);

        $filesystem = new Filesystem;
        if (! $filesystem->isDirectory(dirname($path))) {
            $filesystem->makeDirectory(dirname($path), 0777, true, true);
        }
        return $path;
    }
}