<?php

namespace Clickbar\ValidateRelativeSignature\Tests;


use Carbon\Carbon;
use Clickbar\ValidateRelativeSignature\Http\Middleware\ValidateRelativeSignature;
use Illuminate\Http\Request;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Orchestra\Testbench\TestCase;

class MiddlewareTest extends TestCase
{

    /**
     * @test
     */
    public function valid_relative_signed_url_is_succesfully_verified_by_middleware()
    {
        Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name(
            'verification.do.verify'
        );

        $relativeSignnedUrl = $this->getRelativeSignedUrl(12345678);
        $request = Request::create($relativeSignnedUrl, "GET");

        $middleware = new ValidateRelativeSignature();
        $middleware->handle($request, function ($req) use ($relativeSignnedUrl) {

            $components = parse_url($req->fullUrl());
            $result = $components['path'] . '?' . $components['query'];

            $this->assertEquals($relativeSignnedUrl, $result);
        });
    }

    /**
     * @test
     */
    public function invalid_relative_signed_url_caused_exception_by_middleware()
    {
        $this->expectException(InvalidSignatureException::class);

        Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name(
            'verification.do.verify'
        );

        $relativeSignnedUrl = $this->getRelativeSignedUrl(12345678);
        $request = Request::create($relativeSignnedUrl . 'someNotSignedContent', "GET");

        $middleware = new ValidateRelativeSignature();
        $middleware->handle($request, function ($req) use ($relativeSignnedUrl) {

            $components = parse_url($req->fullUrl());
            $result = $components['path'] . '?' . $components['query'];

            $this->assertEquals($relativeSignnedUrl, $result);
        });
    }

    private function getRelativeSignedUrl($id)
    {
        $isAbsolute = false;
        $relativeTemporarySignedURL = URL::temporarySignedRoute(
            'verification.do.verify',
            Carbon::now()->addHours(24),
            ['id' => $id],
            // absolute = false means we have a relative URL
            $isAbsolute
        );

        return $relativeTemporarySignedURL;
    }
}
