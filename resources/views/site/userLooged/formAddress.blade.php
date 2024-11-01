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
                    <div class="card">
                        <div class="card-body pb-3 login-form">
                            <h4><b>Salvar Endereço</b></h4>

                            <hr />

                            <form method="post"
                                  action="{{ isset($address) ? route('site.user-logged.updateAddress', $address->id) : route('site.user-logged.storeAddress') }}"
                            >
                                {{ method_field(isset($address) ? 'PUT' : 'POST') }}
                                @csrf

                                <div class="group-input">
                                    <label for="label">Nome</label>
                                    <input type="text" id="label" name="label" value="{{ old('label', $address->label ?? "") }}" placeholder="ex: minha casa, trabalho" required />
                                    @if($errors->has('label'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('label') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="group-input">
                                    <label for="zip">CEP</label>
                                    <input type="text" name="zip"
                                           placeholder="ex: 00000-000"
                                           class="form-control mask_cep"
                                           id="zip" value="{{ old('zip', $address->zip ?? '') }}"
                                           required
                                    />
                                    @if($errors->has('zip'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('zip') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="group-input">
                                    <label for="street_address1">Endereço</label>
                                    <input type="text" id="street_address1" name="street_address1"
                                           value="{{ old('street_address1', $address->street_address1 ?? "") }}"
                                           placeholder="ex: Rua dos Bobos"
                                           required
                                    />
                                    @if($errors->has('street_address1'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('street_address1') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="group-input">
                                    <label for="street_address2">Número</label>
                                    <input type="text" id="street_address2" name="street_address2"
                                           value="{{ old('street_address2', $address->street_address2 ?? "") }}"
                                           placeholder="ex: 123"
                                           required
                                    />
                                    @if($errors->has('street_address2'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('street_address2') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="group-input">
                                    <label for="city">Cidade</label>
                                    <input type="text" id="city" name="city"
                                           value="{{ old('city', $address->city ?? "") }}"
                                           placeholder="ex: São Paulo"
                                           required
                                    />
                                    @if($errors->has('city'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('city') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="group-input">
                                    <label for="state">Estado</label>
                                    <input type="text" id="state" name="state"
                                           value="{{ old('state', $address->state ?? "") }}"
                                           placeholder="ex: SP"
                                           required
                                    />
                                    @if($errors->has('state'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('state') }}
                                        </div>
                                    @endif
                                </div>

                                <button type="submit" class="site-btn login-btn">
                                    <i class="far fa-check-circle"></i>
                                    Salvar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />
@endsection

@section('scripts')
    @parent

    @include('site.partials.mask')

    <script>
        $(function () {
            $('#zip').on('blur', function (e) {
                let postal_code = $(this).val().replace(/\D/g, '');
                if (postal_code != "") {
                    $.getJSON("//viacep.com.br/ws/" + postal_code + "/json/?callback=?", function (dados) {
                        if (!("erro" in dados)) {
                            $('#street_address1').val(dados.logradouro + " " + dados.complemento + ", " + dados.bairro);

                            $('#city').val(dados.localidade);
                            $('#state').val(dados.uf);
                        }
                    }).always(function () {
                        $('#street_address2').focus();
                    });
                }
            });
        })
    </script>
@endsection
