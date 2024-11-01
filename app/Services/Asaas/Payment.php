<?php

namespace App\Services\Asaas;

use CodePhix\Asaas\Asaas;

class Payment
{

    private Asaas $asaas;

    public function __construct()
    {
        $this->asaas = new Asaas(config('services.asaas.api_key'));
    }

    public function createPayment(array $data)
    {
        return $this->asaas->Cobranca()->create($data);
    }

    public function removePayment(string $id)
    {
        if (empty($id))
            return "ID não pode ser vazio";

        return $this->asaas->Cobranca()->delete($id);
    }

    public function getPayments(array $query = [])
    {
        return $this->asaas->Cobranca()->getAll($query);
    }

    public function paymentsSubscription(string $subscription_id)
    {
        return $this->asaas->Cobranca()->getBySubscription($subscription_id);
    }

}
