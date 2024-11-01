<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CreateAddressUserRequest;
use App\Http\Requests\Site\UpdateAddressUserRequest;
use App\Http\Requests\Site\UpdateUserRequest;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Masterix21\Addressable\Models\Address;

class UserLoggedController extends Controller
{

    public function __construct(
        public OrderRepository $orderRepository
    ) { }

    public function index(): View
    {
        return view('site.userLooged.index', [
            'title' => 'Compras',
            'orders' => $this->orderRepository->getOrdersByUser(),
        ]);
    }

    public function order(Order $order): View
    {
        $order->load(['order_items.product', 'delivery']);

        return view('site.userLooged.order', [
            'title' => 'Detalhes da compra #' . $order->id,
            'order' => $order,
        ]);
    }

    public function editDataUser(): View
    {
        return view('site.userLooged.formUser', [
            'title' => 'Editar dados do usuário',
            'user' => auth()->user(),
        ]);
    }

    public function updateDataUser(UpdateUserRequest $request): RedirectResponse
    {
        auth()->user()->update($request->validated());

        toastr()->addSuccess('Dados atualizados com sucesso!');

        return back();
    }

    public function addresses(): View
    {
        return view('site.userLooged.addresses', [
            'title' => 'Endereços',
            'addresses' => auth()->user()->shippingAddresses()->get(),
        ]);
    }

    public function createAddress(): View
    {
        return view('site.userLooged.formAddress', [
            'title' => 'Novo endereço',
        ]);
    }

    public function storeAddress(CreateAddressUserRequest $request): RedirectResponse
    {
        auth()->user()->shippingAddresses()->create($request->validated());

        toastr()->addSuccess('Endereço cadastrado com sucesso!');

        return to_route('site.user-logged.addresses');
    }

    public function editAddress(Address $address): View
    {
        return view('site.userLooged.formAddress', [
            'title' => 'Editar endereço',
            'address' => $address,
        ]);
    }

    public function updateAddress(UpdateAddressUserRequest $request, Address $address): RedirectResponse
    {
        $address->update($request->validated());

        toastr()->addSuccess('Endereço atualizado com sucesso!');

        return to_route('site.user-logged.addresses');
    }

    public function destroyAddress(Address $address): RedirectResponse
    {
        $address->delete();

        toastr()->addSuccess('Endereço removido com sucesso!');

        return back();
    }

}
