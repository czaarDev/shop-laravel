<?php

namespace App\Services\Freight\Correios;

use App\Services\Freight\Correios\Contracts\FreightInterface;
use App\Services\Freight\Correios\Contracts\ZipCodeInterface;
use App\Services\Freight\Correios\Services\Freight;
use App\Services\Freight\Correios\Services\ZipCode;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;

class Client
{
    /**
     * Serviço de frete.
     *
     * @var \App\Services\Freight\Correios\Contracts\FreightInterface
     */
    protected $freight;

    /**
     * Serviço de CEP.
     *
     * @var \App\Services\Freight\Correios\Contracts\ZipCodeInterface
     */
    protected $zipcode;

    /**
     * Cria uma nova instância da classe Client.
     *
     * @param \GuzzleHttp\ClientInterface|null  $http
     * @param \App\Services\Freight\Correios\Contracts\FreightInterface|null $freight
     * @param \App\Services\Freight\Correios\Contracts\ZipCodeInterface|null $zipcode
     */
    public function __construct(
        ClientInterface $http = null,
        FreightInterface $freight = null,
        ZipCodeInterface $zipcode = null
    ) {
        $this->http = $http ?: new HttpClient;
        $this->freight = $freight ?: new Freight($this->http);
        $this->zipcode = $zipcode ?: new ZipCode($this->http);
    }

    /**
     * Serviço de frete dos Correios.
     *
     * @return \App\Services\Freight\Correios\Contracts\FreightInterface
     */
    public function freight()
    {
        return $this->freight;
    }

    /**
     * Serviço de CEP dos Correios.
     *
     * @return \App\Services\Freight\Correios\Contracts\ZipCodeInterface
     */
    public function zipcode()
    {
        return $this->zipcode;
    }
}
