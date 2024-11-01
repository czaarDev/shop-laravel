<?php

namespace App\Services\Freight\Correios\Contracts;

interface ZipCodeInterface
{
    /**
     * Encontrar endereço por CEP.
     *
     * @param  string $zipcode
     *
     * @return array
     */
    public function find($zipcode);
}
