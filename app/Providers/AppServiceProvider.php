<?php

namespace App\Providers;

use Zaxbux\BackblazeB2\Client;
use League\Flysystem\Filesystem;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Zaxbux\Flysystem\BackblazeB2Adapter;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Storage::extend('b2', function (Application $app, array $config) {
            $cliente = new Client([$config['key_id'], $config['application_key']]);
            $adapter    = new BackblazeB2Adapter($cliente, $config['bucket_id']);
            $filesystem = new Filesystem($adapter);

            return new FilesystemAdapter($filesystem, $adapter, $config);
        });
    }
}
