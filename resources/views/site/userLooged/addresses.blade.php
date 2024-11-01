@extends('layouts.site')

@section('title', $title)

@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a title="Página inicial" href="/"><i class="fa fa-home"></i> Início</a>
                        <span>{{ $title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="register-login-section spad" style="padding-top:40px;">
        <div class="container">
            <div class="row">

                @include('site.partials.menuUserLogged')

                <div class="col-xl-9 col-lg-9 col-md-9 col-9">
                    <div class="card mt-3">
                        <div class="card-body ">
                            <h4><b>Endereços de Entrega</b></h4>

                            <hr />

                            <div class="my-2">
                                <a title="Cadastrar novo endereço de entrega" href="{{ route('site.user-logged.createAddress') }}" class="btn btn-dark">
                                    <small><i class="fa fa-plus mr-1"></i></small> Cadastrar novo endereço
                                </a>
                            </div>

                            <ul class="list-group">
                                @forelse($addresses as $item)
                                    <li class="list-group-item div_address_2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-10">
                                            <p class="mb-0"><strong> {{ $item->label }} </strong></p>
                                            <p class="text-muted mb-0">
                                                {{ $item->zip }},
                                                {{ $item->street_address1 }},
                                                {{ $item->street_address1 }},
                                            </p>
                                            <p>
                                                {{ $item->city }}
                                                {{ $item->state }}
                                            </p>
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <a title="Editar endereço"
                                               href="{{ route('site.user-logged.editAddress', $item->id) }}"
                                               class="btn btn-outline-dark btn-sm mb-2"
                                            >
                                                <i class="fa fa-edit mr-2"></i> Editar
                                            </a>

                                            <form action="{{ route('site.user-logged.destroyAddress', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        title="Excluir endereço"
                                                        class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('Você tem certeza?')"
                                                />
                                                    <i class="fa fa-trash mr-2"></i> Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <div class="alert alert-secondary" role="alert">
                                        <i class="fa fa-info-circle"></i> Você ainda não cadastrou nenhum endereço.
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />
@endsection
