<?php

use Tests\Support\Env;

describe('api login', function () {
    it('env has testing string on APP_ENV key', function () {
        expect(Env::get('APP_ENV'))->toBe('testing');
    });

    it('get response status 200', function (array $headers) {
        $resp = http()->withHeaders($headers)->get('/objects');
        expect($resp->status())->toBe(200);
    })->with('headers');

    it('response body is a valid json', function () {
        $resp = http()->get('/objects');
        expect(json_validate($resp->body()))->toBeTrue();
    });

    it('response body is array for objects', function () {
        $resp = http()->get('/objects');
        expect($resp->json())->toBeArray();
    });
});
