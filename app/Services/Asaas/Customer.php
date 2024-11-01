<?php

namespace App\Services\Asaas;

use CodePhix\Asaas\Asaas;

class Customer
{

    private Asaas $asaas;

    public function __construct()
    {
        $this->asaas = new Asaas(config('services.asaas.api_key'));
    }

    public function createCustomer(array $data)
    {
        return $this->asaas->Cliente()->create($data);
    }

    public function getCustomers(array $query = [])
    {
        return $this->asaas->Cliente()->getAll($query);
    }

    public function getCustomer(string $documentNumber)
    {
        $customer = $this->getCustomers(["cpfCnpj" => $documentNumber]);

        return current($customer->data) ?? [];
    }

    public function findONewCustomer(string $documentNumber, array $data)
    {
        $customer = $this->getCustomer($documentNumber);

        if (empty($customer)) {
            $customer = $this->createCustomer($data);
        }

        return $customer;
    }

}
