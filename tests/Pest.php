<?php

use Illuminate\Http\Client\Factory as HttpFactory;
use Illuminate\Http\Client\PendingRequest;
use Tests\Support\Env;

/**
 * Retorna uma instância global (singleton) do cliente HTTP do Illuminate.
 * O cliente é criado apenas na primeira chamada.
 */
function http(): PendingRequest
{
    static $client = null;

    if ($client === null) {
        // Carrega o arquivo .env.testing uma vez
        Env::load();

        // Configura o cliente
        $baseUrl = Env::get('API_BASE_URL') ?? Env::get('API_URL');
        $timeout = (int) Env::get('REQUEST_TIMEOUT', '10');

        // Cria o cliente base
        // https://laravel.com/docs/http-client
        $client = (new HttpFactory())
            ->baseUrl(rtrim($baseUrl ?? '', '/'))
            ->acceptJson()
            ->timeout($timeout);
    }

    return $client;
}

/**
 * Configura os hooks do ambiente de testes
 */
uses()

    // Antes de todos os testes
    ->beforeAll(function () {
        Env::load();
    })

    // Antes de cada teste
    ->beforeEach(function () {
        //
    })

    // Depois de cada teste
    ->afterEach(function () {
        //
    })

    // Depois de todos os testes
    ->afterAll(function () {
        //
    })

    // Escopo <= rodados em todos os testes
    ->in('.');

require __DIR__ . '/Plugins/CustomExpectations.php';
