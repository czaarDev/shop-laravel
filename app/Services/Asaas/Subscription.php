<?php

namespace App\Services\Asaas;

use CodePhix\Asaas\Asaas;

class Subscription
{

    private Asaas $asaas;

    public function __construct()
    {
        $this->asaas = new Asaas(config('services.asaas.api_key'));
    }

    public function createSubscription(array $data)
    {
        return $this->asaas->Assinatura()->create($data);
    }

    public function updateSubscription(string $id, array $data)
    {
        return $this->asaas->Assinatura()->update($id, $data);
    }

    public function getSubscriptions(array $query = [])
    {
        return $this->asaas->Assinatura()->getAll($query);
    }

    public function getSubscription(string $subscription_id)
    {
        return $this->asaas->Assinatura()->getById($subscription_id);
    }

    public function subscriptionCustomer(string $customer_id)
    {
        return $this->asaas->Assinatura()->getByCustomer($customer_id);
    }

    public function cancelSubscription(string $subscription_id)
    {
        return $this->asaas->Assinatura()->delete($subscription_id);
    }

}
