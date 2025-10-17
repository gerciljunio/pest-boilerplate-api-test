<?php

namespace Tests\Support;

use Dotenv\Dotenv;

class Env
{
    protected static array $values = [];

    /**
     * Carrega o arquivo .env.testing apenas uma vez
     */
    public static function load(): void
    {
        if (!empty(self::$values)) {
            return; // já carregado
        }

        $root = dirname(__DIR__, 2);

        // .env.testing é o padrão para ambientes de teste
        $dotenv = Dotenv::createImmutable($root, '.env.testing');
        $dotenv->safeLoad();

        self::$values = $_ENV + $_SERVER;
    }

    /**
     * Retorna um valor do .env (ou padrão se não existir)
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        return $_ENV[$key]
            ?? $_SERVER[$key]
            ?? (getenv($key) !== false ? getenv($key) : $default);
    }
}
