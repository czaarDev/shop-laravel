@extends('layouts.site')

@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a title="Página inicial" href="/"><i class="fa fa-home"></i> Início</a>
                        <span>Login</span>
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

                        <h2>Faça seu login</h2>

                        @if(session('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('login') }}">
                            @csrf

                            <div class="group-input">
                                <label for="email">E-mail *</label>
                                <input type="email"
                                       id="email" name="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       required autofocus autocomplete="email"
                                       placeholder="digite seu e-mail"
                                       value="{{ old('email', null) }}"
                                />

                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="group-input">
                                <label for="password">Senha *</label>
                                <input type="password"
                                       id="password" name="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       required
                                       placeholder="digite sua senha"
                                />

                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="input-group mb-4">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                                    <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                        {{ trans('global.remember_me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <a title="Recuperar senha" href="/login/recuperarsenha" class="forget-pass">
                                        Esqueceu a senha?
                                    </a>
                                </div>
                            </div>

                            <button type="submit" class="site-btn login-btn">
                                <i class="far fa-check-circle"></i>
                                Entrar
                            </button>
                        </form>

                        <hr />

                        <div class="switch-login">
                            Ainda não tem cadastro?
                            <a title="Cadastro" href="{{ route('register') }}" class="or-login">
                                Cadastre-se
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
