<?php

namespace Clickbar\ValidateRelativeSignature;


use Clickbar\ValidateRelativeSignature\Http\Middleware\ValidateRelativeSignature;
use Illuminate\Support\ServiceProvider;

class ValidateRelativeSignatureServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerMiddleware();
    }

    public function register()
    { }


    private function registerMiddleware()
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('signed.relative', ValidateRelativeSignature::class);
    }
}
