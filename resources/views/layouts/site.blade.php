
<!DOCTYPE html>
<html lang="pt-BR">
    <head>

        @include('site.partials.scripts.google-tag-manager')

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name=csrf-token content="{{ csrf_token() }}">

        <link rel="icon" href="/assets/site/images/favicon.png" sizes="32x32" />
        <link rel="icon" href="/assets/site/images/favicon.png" sizes="192x192" />

        <title> @yield('title', config('app.name')) </title>
        <meta name="description" content="@yield('description', config('app.name'))" />

        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/assets/site/css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" media="print" onload="this.media='all'">

        <style>
            #mobile-menu-wrap {
                display: none;
            }

            .nav-item {
                background: #09162e;
            }

            .inner-header {
                padding: 0;
            }

            .inner-header .advanced-search .category-btn {
                padding-right: 40px;
            }

            .color-brand {
                color: #303b65 !important;
            }

            .btn-brand {
                background-color: #303b65 !important;
                color: white !important;
            }

            .footer-section {
                background: #19191900;
                padding-top: 50px;
            }

            .footer-left .footer-social a {
                background: #303b65;
            }

            .footer-widget ul li a {
                color: black;
            }

            .newslatter-item p {
                color: black;
            }

            .copyright-reserved .copyright-text {
                color: #635d5d;
            }

            .newslatter-item .subscribe-form input {
                background: #82828230;
            }

            .hero-items .single-hero-items {
                height: 450px;
            }

            .product-shop {
                padding-top: 20px;
            }

            .switch-login {
                font-size: 1.5em;
            }

            .page-numbers {
                margin-top: 30px;
            }

            .page-numbers ul {
                list-style: outside none none;
                margin: 0;
                padding: 0;
            }

            .page-numbers ul li {
                display: inline-block;
            }

            .page-numbers ul li a {
                border: 1px solid #ddd;
                color: #444;
                padding: 0 15px;
                background-color: #fff;
                color: #444;
                display: inline-block;
                height: 35px;
                line-height: 35px;
                text-decoration: none;
            }

            .proceed-checkout .proceed-btn {
                background: #303b65;
                font-size: 20px;
            }

            .d-none {
                display: none !important;
            }

            .hero-items .single-hero-items {
                background-size: contain;
            }

            .logo a img {
                height: 100px;
            }

            @media only screen and (max-width: 450px) {
                #mobile-menu-wrap,
                .nav-item .nav-depart {
                    display: block;
                }

                .slicknav_menu {
                    background: #09162e;
                    padding: 0;
                }

                .slicknav_btn {
                    background: #09162e;
                    margin: 12px 5px 6px;
                }

                .logo a img {
                    /*max-width: 100px !important;*/
                    height: 72px;
                }

                .hero-items .single-hero-items {
                    background-repeat: no-repeat;
                    height: auto;
                    padding: 60px 25px 60px 25px;
                }

                .section-product-banner {
                    padding-top: 350px;
                }

                .section-jogos-educativos div.row {
                    flex-flow: column-reverse;
                }

                .section-jogos-educativos.man-banner {
                    padding-bottom: 0px;
                }

                .section-itinerarios div.row {
                    flex-flow: column-reverse;
                }

                .section-itinerarios{
                    padding-top: 0px;
                }

                .section-itinerarios .product-large {
                    padding-bottom: 30px;
                }
            }

            @media only screen and (min-width: 1200px) and (max-width: 1920px) {
                .nav-item .nav-menu li a {
                    padding: 16px 30px 15px;
                }
            }
        </style>

        @yield('styles')

    </head>
    <body>
        <header class="header-section">
            <div class="header-top">
                <div class="container">
                    <div class="ht-left">
                        <div class="mail-service">
                            <i class=" fa fa-envelope color-brand"></i>
                            <a title="Entre em contato pelo e-mail {{ $settings['site.email'] }}" href="mailto: {{ $settings['site.email'] }}" style="color: #252525;">
                                {{ $settings['site.email'] }}
                            </a>
                        </div>
                    </div>
                    <div class="ht-right">
                        @guest
                            <a title="Entre ou cadastre-se" href="{{ route('login') }}" class="login-panel">
                                <i class="fa fa-sign-in"></i>
                                Entre ou cadastre-se
                            </a>
                        @endguest

                        @auth
                            <a title="Área do usuário" href="{{ route('site.user-logged.index') }}" class="login-panel">
                                <i class="fa fa-user"></i>
                                Olá, {{ auth()->user()->first_name }}
                            </a>
                        @endauth

                        <div class="top-social">
                            <a title="whatsapp" target="_blank" href="{{ $settings['site.link_whatsapp'] }}">
                                <i class="fab fa-whatsapp color-brand" style="font-size: 1.5em;"></i>
                            </a>
                            <a title="instagram" target="_blank" href="{{ $settings['site.link_instagram'] }}">
                                <i class="fab fa-instagram color-brand" style="font-size: 1.5em;"></i>
                            </a>
                            <a title="facebook" target="_blank" href="{{ $settings['site.link_facebook'] }}">
                                <i class="fab fa-facebook color-brand" style="font-size: 1.5em;"></i>
                            </a>
                            <a title="youtube" target="_blank" href="{{ $settings['site.link_youtube'] }}">
                                <i class="fab fa-youtube color-brand" style="font-size: 1.5em;"></i>
                            </a>
                            <a title="youtube" target="_blank" href="{{ $settings['site.link_linkedin'] }}">
                                <i class="fa-brands fa-linkedin color-brand" style="font-size: 1.5em;"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="inner-header">
                    <div class="row" style="align-items: center;">
                        <div class="col-lg-3 col-md-3">
                            <div class="logo">
                                <a title="{{ config('app.name') }}" href="/">
                                    <img src="/assets/site/images/vortex-editora.svg"
                                         alt="{{ config('app.name') }}"
                                         loading="lazy"
                                    />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <form action="{{ route('site.product.index') }}">
                                <div class="advanced-search">
                                    <select name="category_id" class="category-btn">
                                        <option value="" class="small">Categorias</option>
                                        @foreach($productCategories as $category)
                                            <option class="small" value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="input-group">
                                        <input type="text" name="search" value="{{ request('search') }}" placeholder="faça uma busca" />
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-3 text-right col-md-3">
                            <ul class="nav-right">
                                <li class="cart-icon">
                                    <a title="Carrinho" href="{{ route('site.cart.index') }}">
                                        <i class="icon_bag_alt"></i>
                                        <span>
                                            {{ $cart->count() }}
                                        </span>
                                    </a>
                                    <div class="cart-hover">
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                    @foreach($cart as $key => $item)
                                                        <tr>
                                                            <td class="si-pic">
                                                                <img src="{{ $item['image'] }}"
                                                                     alt="{{ $item['name'] }}"
                                                                     data-pagespeed-url-hash="697362414"
                                                                     onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                                                     width="72"
                                                                     loading="lazy"
                                                                />
                                                            </td>

                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>R$ {{ $item['price'] }}</p>
                                                                    <h6>{{ $item['name'] }}</h6>
                                                                </div>
                                                            </td>

                                                            <td class="si-close">
                                                                <a href="{{ route('site.cart.destroy') }}"
                                                                   class="remove_from_cart"
                                                                   title="Remove item do carrinho"
                                                                   onclick="return confirm('Você tem certeza?')"
                                                                   data-id="{{ $key }}"
                                                                >
                                                                    <i class="ti-close"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>
                                                R$ {{ number_format($cart->sum('price'), 2, ',', '.') }}
                                            </h5>
                                        </div>

                                        <div @class(['select-button', 'd-none' => $cart->isEmpty()])>
                                            <a title="Finalizar compra"
                                               href="{{ route('site.cart.index') }}"
                                               class="primary-btn checkout-btn"
                                            >
                                                Finalizar compra
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-price">
                                    R$ {{ number_format($cart->sum('price'), 2, ',', '.') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <div class="container">
                    <div class="nav-depart">
                        <div class="depart-btn">
                            <i class="ti-menu"></i>
                            <span>Categorias</span>
                            <ul class="depart-hover">
                                @foreach($productCategories as $category)
                                    <li class="active">
                                        <a title="{{ $category->name }}" href="{{ route('site.product.index', ['category_id' => $category->id]) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <nav class="nav-menu mobile-menu">
                        <ul>
                            <li class="">
                                <a title="Quem somos" href="https://vortexeducacao.com.br/sobre/" target="_blank">
                                    Quem somos
                                </a>
                            </li>

                            <!-- <li class="">
                                <a title="Plataforma SAGAZ" href="https://vortexeducacao.com.br/nossas-solucoes/" target="_blank">
                                    Plataforma SAGAZ
                                </a>
                            </li> -->

                            <li class="">
                                <a title="Nossas Soluções" href="https://vortexeducacao.com.br/nossas-solucoes/" target="_blank">
                                    Nossas Soluções
                                </a>
                            </li>

                            <li class="">
                                <a title="Metodologia" href="https://vortexeducacao.com.br/metodologia/" target="_blank">
                                    Metodologia
                                </a>
                            </li>

                            <li class="">
                                <a title="Blog" href="https://vortexeducacao.com.br/blog-vortex/" target="_blank">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div id="mobile-menu-wrap"></div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-left" style="margin-bottom: 0px; text-align:center;">
                            <div class="footer-logo">
                                <p>
                                    <em>
                                        O nosso objetivo é promover uma aprendizagem diferenciada, por meio de materiais didáticos atualizados e ferramentas pedagógicas digitais, além da organização estratégica dos conteúdos no intuito de que os alunos possam ser melhor orientados.
                                    </em>
                                </p>
                            </div>

                            <div class="footer-social">
                                <a title="instagram" target="_blank" href="{{ $settings['site.link_instagram'] }}">
                                    <i class="fab fa-instagram"></i>
                                </a>

                                <a title="facebook" target="_blank" href="{{ $settings['site.link_facebook'] }}">
                                    <i class="fab fa-facebook"></i>
                                </a>

                                <a title="youtube" target="_blank" href="{{ $settings['site.link_youtube'] }}">
                                    <i class="fab fa-youtube"></i>
                                </a>

                                <a title="youtube" target="_blank" href="{{ $settings['site.link_linkedin'] }}">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-1">
                        <div class="footer-widget">
                            <h5>Informações</h5>
                            <ul>
                                <li><a title="Quem Somos" href="https://vortexeducacao.com.br/sobre/" target="_blank">Quem Somos</a></li>
                                <li><a title="Perguntas Frequentes" href="/perguntas-frequentes">Perguntas Frequentes</a></li>
                                <li><a title="Política de privacidade" href="/politica-de-privacidade">Política de privacidade</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>Minha conta</h5>
                            <ul>
                                <li><a title="Cadastro" href="{{ route('register') }}">Fazer cadastro</a></li>
                                <li><a title="Alterar cadastro" href="{{ route('login') }}">Alterar cadastro</a></li>
                                <li><a title="Alterar endereço" href="{{ route('login') }}">Alterar endereço</a></li>
                                <li><a title="Acompanhar pedidos" href="{{ route('login') }}">Acompanhar pedidos</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="newslatter-item">
                            <h5>Receba as melhores ofertas diretamente no seu e-mail</h5>
                            <p>Receba as principais novidades da Vortex Educação</p>
                            <form action="{{ route('site.home.saveLeadNewsletter') }}" method="post" class="subscribe-form">
                                @csrf

                                <input type="text" name="email" placeholder="digite seu e-mail" required />
                                <button type="submit">OK!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright-reserved">
                <div class="container" style="display: flex; justify-content: center;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright-text">
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div style="position: fixed; width: 70px; height: 70px; cursor: pointer;background: #4dc247; border-radius: 50%; font-size: 40px; color: white; z-index: 9999;top: 89%; left: 15px;display: flex; align-items: center; justify-content: center;">
            <a target="_blank" title="Fale conosco pelo WhatsApp" href="{{ $settings['site.link_whatsapp'] }}" style="color: white;">
                <img src="https://cdn-icons-png.flaticon.com/64/1384/1384055.png"
                     style="width: 48px; top: -5px; position: relative;"
                     loading="lazy"
                />
            </a>
        </div>

        <script src="/assets/site/js/jquery-3.3.1.min.js"></script>
        <script src="/assets/site/js/bootstrap.min.js"></script>
        <script src="/assets/site/js/jquery-ui.min.js"></script>
        <script src="/assets/site/js/all-min.js"></script>
        <script>eval(mod_pagespeed_s2yWe5UonU);</script>
        <script>eval(mod_pagespeed_5Oi900R5Mr);</script>
        <script>eval(mod_pagespeed_y24CbgPGh9);</script>
        <script>eval(mod_pagespeed_2WJFdZORSP);</script>
        <script>eval(mod_pagespeed_gwflC3jfEs);</script>
        <script src="/assets/site/js/owl.carousel.min.js"></script>
        <script src="/assets/site/js/main.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script>
            $('.preco, .valor').mask('#.##0.00', {reverse: true});
            $('.cpf').mask('000.000.000-00');
            $('.cnpj').mask('00.000.000/0000-00');
            $('.cep').mask('00000-000');

            let maskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                options = {onKeyPress: function(val, e, field, options) {
                    field.mask(maskBehavior.apply({}, arguments), options);
                }
            };

            $('.telefone').mask(maskBehavior, options);

            $('.cep').on('blur', function(e) {
                e.preventDefault();
                var cep = $(this).val().replace(/\D/g, '');
                if (cep != "") {
                    $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                        if (!("erro" in dados)) {
                            // if (!$("#neighborhood").val())
                            //     $("#neighborhood").val(dados.bairro);

                            if (!$("#street_address1").val())
                                $("#street_address1").val(dados.logradouro + ', ' + dados.bairro  + ', ' + dados.complemento);

                            if (!$("#city").val())
                                $("#city").val(dados.localidade).prop('readonly', true);

                            if (!$("#state").val())
                                $("#state").val(dados.uf).prop('readonly', true);

                            $(".fields-address").removeClass('d-none');
                        }
                    });
                }
            });

            $(".add_to_cart").on('click', function(event) {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let category = $(this).data('category');
                let price = $(this).data('price');

                if (!id) {
                    return false;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '{{ route('site.cart.store') }}',
                    type: 'POST',
                    data: {
                        id: id
                    },
                })
                .done(function() {

                    fbq('track', 'AddToCart', {
                        content_name: name,
                        content_category: category,
                        content_ids: [id],
                        content_type: 'product',
                        value: price,
                        currency: 'BRL'
                    });

                    window.location.href = '{{ route('site.cart.index') }}';
                })
                .fail(function() {
                    console.log("error");
                });
            });

            $(".remove_from_cart").on('click', function(event) {
                let id = $(this).data('id');

                if (!id) {
                    return false;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    url: '{{ route('site.cart.destroy') }}',
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        id: id,
                    },
                })
                .done(function() {
                    window.location.reload();
                })
                .fail(function() {
                    console.log("error");
                });
            });
        </script>

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v4.0"></script>

        @yield('scripts')


    </body>
</html>
