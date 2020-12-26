<?php
/* Inspired by https://github.com/laravel/framework/issues/31978 */
namespace App\Console\Commands\Generators\Rewrite\Stock;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Migrations\MigrationCreator as BaseCreator;

class MigrationCreator extends BaseCreator{
        /**
     * Create a new migration creator instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  string  $customStubPath
     * @return void
     */
    public function __construct(Filesystem $files, $customStubPath = null)
    {
        parent::__construct($files, $customStubPath);
    }
    /**
     * Get the path to the stubs.
     *
     * @return string
     */
    public function stubPath()
    {
        return __DIR__.'/stubs';
    }
}