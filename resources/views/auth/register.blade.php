@extends('layouts.site')

@section('title', 'Cadastro - '.config('app.name'))

@section('content')

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a title="Página inicial" href="/"><i class="fa fa-home"></i> Início</a>
                        <span>Cadastro</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">

                        <h2>Faça seu cadastro</h2>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="group-input">
                                <label for="email">Nome *</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="group-input">
                                <label for="email">E-mail *</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="group-input">
                                <label for="phone_number">Telefone *</label>
                                <input type="text" name="phone_number" inputmode="numeric" class="form-control telefone {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" required placeholder="Telefone" value="{{ old('phone_number', null) }}">
                                @if($errors->has('phone_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                            </div>

                            <div class="group-input">
                                <label for="document_number">CPF *</label>
                                <input type="text" name="document_number" inputmode="numeric" class="form-control cpf {{ $errors->has('document_number') ? ' is-invalid' : '' }}" required placeholder="CPF" value="{{ old('document_number', null) }}">
                                @if($errors->has('document_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('document_number') }}
                                    </div>
                                @endif
                            </div>

                            <div class="group-input">
                                <label for="password">Senha *</label>
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="site-btn login-btn">
                                <i class="far fa-check-circle"></i>
                                Cadastrar
                            </button>
                        </form>

                        <hr />

                        <div class="switch-login">
                            Já possui cadastro?
                            <a title="Acessar conta" href="{{ route('login') }}" class="or-login">
                                Acesse sua conta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
