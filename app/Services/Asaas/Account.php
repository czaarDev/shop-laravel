<?php

namespace App\Services\Asaas;

use CodePhix\Asaas\Asaas;

class Account
{

    private Asaas $asaas;

    public function __construct()
    {
        $this->asaas = new Asaas(config('services.asaas.api_key'));
    }

    public function createAccount(array $data)
    {
        return $this->asaas->Conta()->create($data);
    }

    public function getAccounts(array $query = [])
    {
        return $this->asaas->Conta()->getAll($query);
    }

    public function getAccount(string $documentNumber)
    {
        $documentNumber = preg_replace('/[^0-9]/', '', $documentNumber);

        $account = $this->getAccounts(["cpfCnpj" => $documentNumber]);

        return current($account->data) ?? [];
    }

    public function findOrNewAccount(string $documentNumber, array $data)
    {
        $account = $this->getAccount($documentNumber);

        if (empty($account)) {
            $account = $this->createAccount($data);
        }

        return $account;
    }

}
