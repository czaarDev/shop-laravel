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
                            <h4><b>Dados Pessoais</b></h4>

                            <hr />

                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach

                            <form method="post" action="{{ route('site.user-logged.updateDataUser') }}">
                                @csrf
                                @method('PUT')

                                <div class="group-input">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required />
                                    {!! $errors->first('name', '<small class="form-text text-danger">:message</small>') !!}
                                </div>

                                <div class="group-input">
                                    <label for="email">E-mail</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required />
                                    {!! $errors->first('email', '<small class="form-text text-danger">:message</small>') !!}
                                </div>

                                <div class="group-input">
                                    <label for="document_number">CPF</label>
                                    <input type="text" inputmode="numeric" id="document_number" name="document_number" class="mask_cpf" value="{{ old('document_number', $user->document_number) }}" required />
                                    {!! $errors->first('document_number', '<small class="form-text text-danger">:message</small>') !!}
                                </div>

                                <div class="group-input">
                                    <label for="phone_number">Telefone</label>
                                    <input type="text" id="phone_number" name="phone_number" class="mask_phone_with_ddd" value="{{ old('phone_number', $user->phone_number) }}" required />
                                    {!! $errors->first('phone_number', '<small class="form-text text-danger">:message</small>') !!}
                                </div>

                                <div class="group-input">
                                    <label for="birth_date">Data de nascimento</label>
                                    <input type="date" id="birth_date" name="birth_date"
                                           value="{{ old('birth_date', $user->birth_date) }}"
                                           max="{{ now()->subYears(18)->format('Y-m-d') }}"
                                           required
                                    />
                                    {!! $errors->first('birth_date', '<small class="form-text text-danger">:message</small>') !!}
                                </div>

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                        <div class="group-input">
                                            <label for="password">Senha</label>
                                            <input type="password" id="password" name="password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
                                            {!! $errors->first('password', '<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                        <div class="group-input">
                                            <label for="password_confirmation">Confirmar senha</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
                                            {!! $errors->first('password_confirmation', '<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="site-btn login-btn">
                                    <i class="far fa-check-circle"></i>
                                    Atualizar dados
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
@endsection
