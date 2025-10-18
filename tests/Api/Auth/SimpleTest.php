<?php

use Tests\Support\Env;

describe('api login', function () {
    it('existe a variável APP_ENV no ambiente de testes e o valor é testing', function () {
        expect(Env::get('APP_ENV'))->toBe('testing');
    });

    it('a resposta tem o status 200 e envia os headers', function (array $headers) {
        $resp = http()->withHeaders($headers)->get('/objects');
        expect($resp->status())->toBe(200);
    })->with('headers');

    it('a resposta tem um JSON válido', function () {
        $resp = http()->get('/objects');
        expect(json_validate($resp->body()))->toBeTrue();
    });

    it('a resposta é um array de objetos', function () {
        $resp = http()->get('/objects');
        expect($resp->json())->toBeArray();
    });
});
