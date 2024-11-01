@extends('layouts.site')

@section('title', 'Finalizar compra')

@section('content')
    <main class="internal page page-courses single">
        <div class="conteudo-pagina-interna">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="payment" class="payment">
                            <div class="row mb-2 mt-4">
                                <div class="col-12">
                                    <h2 class="mb-1"><b>Finaliza sua compra</b></h2>
                                    <p>Pagamento seguro e dados financeiros protegidos.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-3">
                                        <div class="card-header">Produtos</div>
                                        <div class="card-body p-4" style="border: 1px solid #eee;">
                                            @forelse($cart as $item)
                                                <div class="card mb-1">
                                                    <div class="card-block d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <img class="rounded"
                                                                 src="{{ $item['image'] }}"
                                                                 alt="{{ $item['name'] }}"
                                                                 loading="lazy"
                                                                 style="width: 100px;"
                                                            />
                                                            <div class="ml-3 mt-2">
                                                                <h3 class="mb-2">
                                                                    {{ $item['name'] }}
                                                                </h3>
                                                                <b>R$ {{ number_format($item['price'], 2, ',', '.') }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-warning">
                                                    <i class="fa fa-exclamation-triangle"></i>
                                                    Nenhum produto no carrinho.
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                    @if($cart->count())
                                        <div class="card mb-3">
                                            <div class="card-header">Dados do comprador</div>

                                            <div class="card-body p-4" style="border: 1px solid #eee;">
                                                <div class="mb-3">
                                                    <label for="nome"><span style="color: red;">*</span> Nome:</label>
                                                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()?->name) }}" class="form-control form-control-lg" maxlength="250" placeholder="digite seu nome" required />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email"><span style="color: red;">*</span> E-mail:</label>
                                                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()?->email) }}" class="form-control form-control-lg" placeholder="digite seu e-mail" required />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="telefone"><span style="color: red;">*</span> Telefone:</label>
                                                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', auth()->user()?->phone_number) }}" inputmode="tel"  maxlength="15" class="form-control form-control-lg telefone" placeholder="digite seu telefone com DDD" minlength="14" required />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email"><span style="color: red;">*</span> CPF:</label>
                                                    <input type="text" name="document_number" id="document_number" value="{{ old('document_number', auth()->user()?->document_number) }}" class="form-control form-control-lg cpf" placeholder="digite seu CPF" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-header">Endereço de entrega e frete</div>

                                            <div class="card-body p-4" style="border: 1px solid #eee;">
                                                <div class="mb-3">
                                                    <label for="zip"><span style="color: red;">*</span> CEP:</label>
                                                    <input type="text" name="address[zip]" id="zip" value="{{ old('address[zip]', auth()->user()?->shippingAddress?->zip) }}" class="form-control form-control-lg cep" placeholder="digite seu CEP" required />
                                                </div>

                                                <div @class(['fields-address', 'd-none'=>!isset(auth()->user()->shippingAddress)])>
                                                    <div class="mb-3">
                                                        <label for="street_address1"><span style="color: red;">*</span> Endereço:</label>
                                                        <input type="text" name="address[street_address1]" id="street_address1" value="{{ old('address[street_address1]', auth()->user()?->shippingAddress?->street_address1) }}" class="form-control form-control-lg" placeholder="endereço" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="number"><span style="color: red;">*</span> Número:</label>
                                                        <input type="text" name="address[street_address2]" id="street_address2" value="{{ old('address[street_address2]', auth()->user()?->shippingAddress?->street_address2) }}" class="form-control form-control-lg" placeholder="número" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="city"><span style="color: red;">*</span> Cidade:</label>
                                                        <input type="text" name="address[city]" id="city" value="{{ old('address[city]', auth()->user()?->shippingAddress?->city) }}" class="form-control form-control-lg" placeholder="cidade" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="state"><span style="color: red;">*</span> Estado:</label>
                                                        <input type="text" name="address[state]" id="state" value="{{ old('address[state]', auth()->user()?->shippingAddress?->state) }}" class="form-control form-control-lg" placeholder="estado"  required />
                                                    </div>
                                                </div>

                                                <div id="shipping_options">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-header">Resumo do pagamento</div>

                                            <div class="card-body p-4">
                                                <div class="card-body p-0">
                                                    <strong>
                                                        <div class="divShipping d-none">
                                                            <div class="valueShipping">
                                                            </div>
                                                        </div>

                                                        TOTAL:
                                                        <span id="valor_total">
                                                            R$ {{ number_format($cart->sum('price'), 2, ',', '.') }}
                                                        </span>

                                                        <div class="divDiscount d-none">
                                                            <div class="valueDiscount">
                                                            </div>

                                                            <div class="valueWithDiscount">
                                                            </div>
                                                        </div>
                                                    </strong>

                                                    <div class="pt-3 mb-0">
                                                        <form method="POST" class="form-inline" id="formDiscount" action="{{ route('api.public.discounts.validateCoupon') }}">
                                                            <label class="text-muted mr-2">Tem um cupom de desconto?</label>
                                                            <div class="input-group">
                                                                <input class="form-control" type="text" placeholder="Código do cupom" name="code" required>
                                                                <button class="input-group-addon btn btn-outline-dark" type="submit">Aplicar</button>
                                                            </div>
                                                        </form>

                                                        <div id="responseApplyDiscount">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-header">Escolha sua forma de pagamento</div>
                                            <div class="card-body p-4" style="border: 1px solid #eee;">
                                                <form id="pagamento" method="post" action="{{ route('site.order.pay') }}">
                                                    @csrf

                                                    <input type="hidden" name="installment_value_credit_card" value="" />
                                                    <input type="hidden" name="shipping_name" value="" />
                                                    <input type="hidden" name="shipping_value" value="" />

                                                    <div class="d-flex align-items-center">
                                                        @if($cart->count() == 1 && isset($cart->first()['attributes']['payment_methods']) && in_array(\App\Enums\PaymentMethod::CREDIT_CARD->name, $cart->first()['attributes']['payment_methods'])
                                                            || !isset($cart->first()['attributes']['payment_methods']))
                                                            <div class="form-check mr-2">
                                                                <input type="radio" class="payment-show form-check-input" id="customControl1" name="payment" value="credit_card" options="credit_card" required checked />
                                                                <label class="form-check-label" for="customControl1">
                                                                    <i class="fa fa-credit-card-alt mr-2"></i>
                                                                    Cartão de crédito
                                                                </label>
                                                            </div>
                                                        @endif

                                                        @if($cart->count() == 1 && isset($cart->first()['attributes']['payment_methods']) && in_array(\App\Enums\PaymentMethod::PIX->name, $cart->first()['attributes']['payment_methods'])
                                                            || !isset($cart->first()['attributes']['payment_methods']))
                                                            <div class="form-check mr-4">
                                                                <input type="radio" class="payment-show form-check-input" id="customControl3" name="payment" value="pix" options="pix" required />
                                                                <label class="form-check-label" for="customControl3">
                                                                    <i class="fa-brands fa-pix mr-2"></i>
                                                                    PIX
                                                                </label>
                                                            </div>
                                                        @endif

                                                        @if($cart->count() == 1 && isset($cart->first()['attributes']['payment_methods']) && in_array(\App\Enums\PaymentMethod::BOLETO->name, $cart->first()['attributes']['payment_methods'])
                                                            || !isset($cart->first()['attributes']['payment_methods']))
                                                            <div class="form-check mr-4">
                                                                <input type="radio" class="payment-show form-check-input" id="customControl2" name="payment" value="boleto" options="boleto" required />
                                                                <label class="form-check-label" for="customControl2">
                                                                    <i class="fa fa-barcode mr-2"></i>
                                                                    Boleto
                                                                </label>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <hr />

                                                    <div id="credit_card" class="mb-5">
                                                        <div class="payment-options-details mt-4">
                                                            <div class="mb-3 mb-3-card">
                                                                <label for="">Número do cartão</label>
                                                                <div class="input-group-card">
                                                                    <span class="input-card brand-cc">
                                                                        <img src="https://cdn0.iconfinder.com/data/icons/essen/16/credit-card.png" class="bandeiraCartao" alt="Cartão de crédito" />
                                                                    </span>
                                                                    <input name="number_credit_card" id="number_credit_card" class="form-control form-control-lg" onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="row">
                                                                    <div class="col-lg-8 mb-2 mb-lg-0">
                                                                        <label for="">Validade do cartão</label>
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <select id="month_credit_card" name="month_credit_card" class="form-control form-control-lg w-100">
                                                                                    <option value="">Mês</option>
                                                                                    <option value="1">01</option>
                                                                                    <option value="2">02</option>
                                                                                    <option value="3">03</option>
                                                                                    <option value="4">04</option>
                                                                                    <option value="5">05</option>
                                                                                    <option value="6">06</option>
                                                                                    <option value="7">07</option>
                                                                                    <option value="8">08</option>
                                                                                    <option value="9">09</option>
                                                                                    <option value="10">10</option>
                                                                                    <option value="11">11</option>
                                                                                    <option value="12">12</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <select id="year_credit_card" name="year_credit_card" class="form-control form-control-lg w-100">
                                                                                    <option value="">Ano</option>
                                                                                    @for($i = date('Y'); $i <= date('Y') + 20; $i++)
                                                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                                                    @endfor
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="cvv_credit_card">CVV</label>
                                                                        <input id="cvv_credit_card" name="cvv_credit_card" class="form-control form-control-lg" type="text" autocomplete="off" placeholder="Código de segurança" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Nome impresso no cartão</label>
                                                                <input id="holdername_credit_card" name="holdername_credit_card" class="form-control form-control-lg" type="text" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Número de parcelas</label>
                                                                <select id="installment_quantity_credit_card" name="installment_quantity_credit_card" class="form-control form-control-lg w-100">
                                                                    <option value="">Selecione número de parcelas</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="pix">
                                                        <div class="payment-options-details mt-4">
                                                            <p>Após clicar no botão "Pagar", você será direcionado para a <strong>página de pagamento onde você poderá pagar via PIX</strong>.</p>
                                                            <p>Você terá o prazo de <strong>1 dia</strong> para efetuar o pagamento.</p>
                                                            <p>O pedido será confirmado somente após a aprovação do pagamento do PIX.</p>
                                                        </div>
                                                    </div>

                                                    <div id="boleto">
                                                        <div class="payment-options-details mt-4">
                                                            <p>Após clicar no botão "Pagar", você será direcionado para a <strong>página de pagamento onde você poderá pagar via boleto bancário.</strong>.</p>
                                                            <p>A cobrança <strong>não será enviada</strong> para o endereço de cobrança por correio.</p>
                                                            <p>Você terá o prazo de <strong>1 dia</strong> para efetuar o pagamento.</p>
                                                            <p>O pedido será confirmado somente após a aprovação do pagamento do boleto, o que pode levar <strong>até 1 dia útil após a data do pagamento</strong>.</p>
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-success w-100 text-white p-3 fs-3" id="pagar" style="font-size: 20px; font-weight: 600" type="submit">
                                                        <i class="fa fa-check-circle"></i>
                                                        Pagar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <hr>
@endsection

@section('scripts')
    <script>
        let cart = @json($cart);
        let total_compra = "{{ $cart->sum('price') }}";
        let quantidade_maxima_parcelas_pagamento = Object.keys(cart).length === 1
            ? Object.values(cart)[0].attributes.maximum_number_of_installments
            : 12;

        $(".payment-options-details").hide();
        $("#credit_card .payment-options-details").show();

        $(".payment-show").on("click", function (event) {
            $(".payment-show").prop("checked", false);
            $(".payment-options-details").hide();

            $(this).prop("checked", true);

            $("#" + $(this).attr("options") + " .payment-options-details").show();
        });

        $('#number_credit_card').on('blur',function() {
            if ($(this).val() != '') {
                let numero_cartao_de_credito = $(this).val().replace(/\D/g, '');

                $("#number_credit_card").val(numero_cartao_de_credito);

                if (numero_cartao_de_credito != '') {
                    bandeira_cartao = getCardFlag(numero_cartao_de_credito);

                    $(".brand-cc img").attr('src', 'https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/'+bandeira_cartao+'.png');

                    $("select#installment_quantity_credit_card")
                        .removeAttr('disabled')
                        .empty()
                        .append("<option value=''>Selecione o número de parcelas</option>");

                    for (i = 1; i <= quantidade_maxima_parcelas_pagamento; i++) {

                        let valor_parcela_pagamento = parseFloat(total_compra/i).toFixed(2);

                        console.log(`Parcela ${i} - ${valor_parcela_pagamento}`);

                        $("select#installment_quantity_credit_card")
                            .append(`<option data-value="${valor_parcela_pagamento}" value="${i}">${i} x R$ ${valor_parcela_pagamento} = R$ ${total_compra}</option>`);
                    }
                }
            }
        });

        $("form#pagamento").submit(function() {

            if ($("input[name='name']").val() === '') {
                alert('Informe o nome do comprador');
                $("input[name='name']").focus();
                return false;
            }

            if ($("input[name='email']").val() === '') {
                alert('Informe o e-mail do comprador');
                $("input[name='email']").focus();
                return false;
            }

            if ($("input[name='phone_number']").val() === '') {
                alert('Informe o telefone do comprador');
                $("input[name='phone_number']").focus();
                return false;
            }

            if ($("input[name='document_number']").val() === '') {
                alert('Informe o CPF do comprador');
                $("input[name='document_number']").focus();
                return false;
            }

            if ($("input[name='address[zip]']").val() === '') {
                alert('Informe o CEP de entrega');
                $("input[name='address[zip]']").focus();
                return false;
            }

            if ($("input[name='address[street_address1]']").val() === '') {
                alert('Informe o endereço de entrega');
                $("input[name='address[street_address1]']").focus();
                return false;
            }

            if ($("input[name='address[street_address2]']").val() === '') {
                alert('Informe o número do endereço de entrega');
                $("input[name='address[street_address2]']").focus();
                return false;
            }

            if ($("input[name='address[city]']").val() === '') {
                alert('Informe a cidade do endereço de entrega');
                $("input[name='address[city]']").focus();
                return false;
            }

            if ($("input[name='address[state]']").val() === '') {
                alert('Informe o estado do endereço de entrega');
                $("input[name='address[state]']").focus();
                return false;
            }

            if ($("input[name='payment_method']").val() === 'credit_card') {

                if ($("input[name='number_credit_card']").val() === '') {
                    alert('Informe o número do cartão de crédito');
                    $("input[name='card_number']").focus();
                    return false;
                }

                if ($("input[name='cvv_credit_card']").val() === '') {
                    alert('Informe o código de segurança do cartão de crédito');
                    $("input[name='card_cvv']").focus();
                    return false;
                }

                if ($("input[name='month_credit_card']").val() === '') {
                    alert('Informe o mês de validade do cartão de crédito');
                    $("input[name='card_expiration_month']").focus();
                    return false;
                }

                if ($("input[name='year_credit_card']").val() === '') {
                    alert('Informe o ano de validade do cartão de crédito');
                    $("input[name='card_expiration_year']").focus();
                    return false;
                }
            }

            if ($("input[name='shipping_option']").length && $("input[name='shipping_option']:checked").val() === undefined) {
                alert('Selecione a opção de frete');
                return false;
            }

            $(this).append(`<input type="hidden" name="name" value="${$("input[name='name']").val()}">`);
            $(this).append(`<input type="hidden" name="email" value="${$("input[name='email']").val()}">`);
            $(this).append(`<input type="hidden" name="phone_number" value="${$("input[name='phone_number']").val()}">`);
            $(this).append(`<input type="hidden" name="document_number" value="${$("input[name='document_number']").val()}">`);
            $(this).append(`<input type="hidden" name="code" value="${$("input[name='code']").val()}">`);
            $("input[name='installment_value_credit_card']").val($("#installment_quantity_credit_card option:selected").data('value'));

            $(this).append(`<input type="hidden" name="address[label]" value="Endereço de entrega">`);
            $(this).append(`<input type="hidden" name="address[is_shipping]" value="1">`);
            $(this).append(`<input type="hidden" name="address[is_primary]" value="1">`);
            $(this).append(`<input type="hidden" name="address[zip]" value="${$("input[name='address[zip]']").val()}">`);
            $(this).append(`<input type="hidden" name="address[street_address1]" value="${$("input[name='address[street_address1]']").val()}">`);
            $(this).append(`<input type="hidden" name="address[street_address2]" value="${$("input[name='address[street_address2]']").val()}">`);
            $(this).append(`<input type="hidden" name="address[city]" value="${$("input[name='address[city]']").val()}">`);
            $(this).append(`<input type="hidden" name="address[state]" value="${$("input[name='address[state]']").val()}">`);

            $(this)
                .find("#pagar")
                .text("Aguarde...")
                .prop('disabled',true);
        });

        $(document).on("input", "input[name='address[zip]']", function(event) {
            event.preventDefault();

            let zipcode = $(this).val();

            if (!zipcode && zipcode.length < 8) {
                return false;
            }

            $.ajax({
                url: `{{ route('api.public.shipping-option.correios') }}?zipcode=${zipcode}&items=${Object.keys(cart).join(',')}`,
                type: 'GET',
            })
            .done(function(result) {
                let html = '';

                html += `<div class="form-check frete_correios">
                            <input type="radio" name="shipping_option" value="Retirada" class="form-check-input" data-name="Retirada" data-price="0.00" />
                            <label for="form-check-label">
                                <b>Retirada</b> - 📍Endereço: Rua Jornalista Dondon, 1.899, Quadra C, Lote 08, Galpão 001, Bairro: Horto, Teresina/PI - CEP: 64.052-850</b>
                            </label>
                        </div>`;

                $.each(result.data, function(i, obj) {
                    html += `<div class="form-check frete_correios">
                                <input type="radio" name="shipping_option" value="${obj.name}" class="form-check-input" data-name="${obj.name}" data-price="${obj.price}" />
                                <label for="form-check-label">
                                    <b>${obj.name}</b> - Recebe na sua casa em até ${obj.deadline} dias úteis <b>▸ R$ ${obj.price}</b>
                                    <span class="amount"></span>
                                </label>
                            </div>`;
                });

                $("#shipping_options").empty();
                $("#shipping_options").append(html);
            })
            .fail(function() {
                console.log("error");
            });
        });

        $(document).on("change", "input[name='shipping_option']", function(event) {
            event.preventDefault();

            let name = $(this).data('name');
            let price = $(this).data('price');

            if (!price) {
                return false;
            }

            $("input[name='shipping_name']").val(name);
            $("input[name='shipping_value']").val(price);

            $('.valueShipping').html(`VALOR DO FRETE: R$ ${price.toFixed(2).replace('.', ',')}`);

            total_compra += price;

            $('#valor_total').html(`R$ ${total_compra.toFixed(2).replace('.', ',')}`);
        });

        $(document).on('submit', '#formDiscount', function(event) {
            event.preventDefault();

            $.ajax({
                url: $(this).prop('action'),
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "POST",
                data: $(this).serialize() + '&amount=' + total_compra,
                success: function (response) {
                    if (response.success) {
                        let totalAmountOrder         = total_compra;
                        let valueDiscount            = response.data.valueDiscount;
                        let totalAmountOrderDiscount = totalAmountOrder - valueDiscount;

                        $('.divDiscount').removeClass('d-none');

                        $('.valueDiscount').html(`VALOR DESCONTO: - R$ ${valueDiscount.toFixed(2).replace('.', ',')}`);

                        $('.valueWithDiscount').html(`VALOR FINAL: R$ ${totalAmountOrderDiscount.toFixed(2).replace('.', ',')}`);

                        $("#responseApplyDiscount")
                            .html(`<div class='d-block fst-italic text-sm text-success mt-1'>${response.data.message}</div>`);

                        if (response.data.coupon.is_direct_payment) {
                            quantidade_maxima_parcelas_pagamento = 1;
                        }
                    } else {
                        $('.divDiscount').addClass('d-none');

                        $('.valueDiscount').html('');

                        $("#responseApplyDiscount")
                            .html(`<div class='d-block fst-italic text-sm text-danger mt-1'>Cupom inválido ou expirado.</div>`);

                        quantidade_maxima_parcelas_pagamento = 12;
                    }
                },
                error: function (data) {
                    $("#responseApplyDiscount")
                        .html(`<div class='block italic text-sm text-red-500 mt-1'>${data.responseJSON}</div>`);
                }
            });
        });

        window.onload = (event) => {
            if ($("input[name='address[zip]']").val()) {
                $("input[name='address[zip]']").trigger('change');
            }
        }

        function getCardFlag(cardnumber) {
            var cardnumber = cardnumber.replace(/[^0-9]+/g, '');

            var cards = {
                amex: /^3[47][0-9]{13}/,
                aura: /^507860/,
                banese: /^636117/,
                cabal: /(60420[1-9]|6042[1-9][0-9]|6043[0-9]{2}|604400)/,
                diners: /(36[0-8][0-9]{3}|369[0-8][0-9]{2}|3699[0-8][0-9]|36999[0-9])/,
                discover: /^6(?:011|5[0-9]{2})[0-9]{12}/,
                elo: /^4011(78|79)|^43(1274|8935)|^45(1416|7393|763(1|2))|^504175|^627780|^63(6297|6368|6369)|(65003[5-9]|65004[0-9]|65005[01])|(65040[5-9]|6504[1-3][0-9])|(65048[5-9]|65049[0-9]|6505[0-2][0-9]|65053[0-8])|(65054[1-9]|6505[5-8][0-9]|65059[0-8])|(65070[0-9]|65071[0-8])|(65072[0-7])|(65090[1-9]|6509[1-6][0-9]|65097[0-8])|(65165[2-9]|6516[67][0-9])|(65500[0-9]|65501[0-9])|(65502[1-9]|6550[34][0-9]|65505[0-8])|^(506699|5067[0-6][0-9]|50677[0-8])|^(509[0-8][0-9]{2}|5099[0-8][0-9]|50999[0-9])|^65003[1-3]|^(65003[5-9]|65004\d|65005[0-1])|^(65040[5-9]|6504[1-3]\d)|^(65048[5-9]|65049\d|6505[0-2]\d|65053[0-8])|^(65054[1-9]|6505[5-8]\d|65059[0-8])|^(65070\d|65071[0-8])|^65072[0-7]|^(65090[1-9]|65091\d|650920)|^(65165[2-9]|6516[6-7]\d)|^(65500\d|65501\d)|^(65502[1-9]|6550[3-4]\d|65505[0-8])/,
                fortbrasil: /^628167/,
                grandcard: /^605032/,
                hiper: /^637095|^63737423|^63743358|^637568|^637599|^637609|^637612/,
                hipercard: /^606282/,
                jcb: /^(?:2131|1800|35\d{3})\d{11}/,
                mastercard: /^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/,
                personal: /^636085/,
                sorocred: /^627892|^636414/,
                valecard: /^606444|^606458|^606482/,
                visa: /^4[0-9]{12}(?:[0-9]{3})/,
            };

            for (var flag in cards) {
                if(cards[flag].test(cardnumber)) {
                    return flag;
                }
            }

            return false;
        }
    </script>

    <script>
        function saveAbandonedCart()
        {
            let user_name = $("input[name='name']").filter(function() {
                return $(this).val() !== '';
            }).val() || '';

            let user_email = $("input[name='email']").filter(function() {
                return $(this).val() !== '';
            }).val() || '';

            let user_phone_number = $("input[name='phone_number']").filter(function() {
                return $(this).val() !== '';
            }).val() || '';

            if (user_name === '' || user_email === '' || user_phone_number === '') {
                return false;
            }

            $.ajax({
                url: "{{ route('api.public.abandoned-carts.store') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: {
                    "name": user_name,
                    "email": user_email,
                    "phone_number": user_phone_number,
                    "payment_method": $("input[name='payment']:checked").val().toUpperCase(),
                    "amount": total_compra,
                    "product_id": Object.keys(cart).join(','),
                    "infosProduct": cart,
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

        $("input[name='payment'], input[name='name'], input[name='email'], input[name='phone_number']").on('change', function() {
            saveAbandonedCart();
        });
    </script>

    <script>
        let products = Object.keys(cart).map((key) => {
            return {
                id: key,
                name: cart[key].name,
                price: cart[key].price,
                quantity: 1,
            };
        });

        window.onload = function () {
            fbq('track', 'InitiateCheckout', {
                value: total_compra,
                currency: 'BRL',
                contents: products,
                content_type: 'product'
            });

            if ($("input[name='phone_number']").val()) {
                saveAbandonedCart();
            }
        };
    </script>
@endsection

@section('styles')
    <style>
        .card-block {
            padding: 1.25rem;
        }

        .card {
            border-radius: 2px;
        }

        .card .card-header {
            border-radius: 2px 2px 0 0;
            color: #2a2c2c;
            font-size: 16px;
            font-weight: 700;
            padding: 20px 12px;
            text-transform: uppercase;
        }

        .card .card-block .card-title {
            font-size: 18px;
            font-weight: 700;
        }

        .card .list-group .list-group-item {
            border-color: #eee;
            border-width: 0 0 0 0;
            display: block;
            padding-bottom: 17px;
            padding-top: 17px;
        }

        .card .list-group .list-group-item + .list-group-item {
            border-width: 1px 0 0 0;
        }

        .card-table .card-block {
            padding: 0;
        }

        .card-table .card-footer {
            background-color: #f9f9f9;
            border-radius: 0 0 2px 2px;
            box-shadow: 0 3px 5px rgba(51, 51, 51, 0.1) inset;
            padding: 10px 12px;
        }

        .card-table .card-footer .pagination {
            margin-bottom: 0;
        }

        .card-table .card-footer .pagination .page-item .page-link {
            background-color: transparent;
            border: none;
            color: #adadad;
            font-size: 14px;
            padding: 5px 6px;
            text-transform: uppercase;
        }

        .card-table .card-footer .pagination .page-item .page-link:hover {
            color: #f07d00;
        }

        .card-table .card-footer .pagination .page-item.active .page-link {
            background-color: transparent;
            color: #f07d00;
        }

        .card-collapse + .card-collapse {
            border-top: 1px;
        }

        .card-collapse .card-header {
            align-items: center;
            color: #555555;
            display: flex;
            font-size: 14px;
            justify-content: space-between;
            padding: 15px;
            text-transform: uppercase;
        }

        .card-collapse .card-header:hover, .card-collapse .card-header:focus {
            color: #f07d00;
            text-decoration: none;
        }

        .card-collapse .card-header[aria-expanded="true"] {
            color: #f07d00;
        }

        .card-collapse .card-header.collapsed {
            border-bottom: none;
        }

        .card-collapse .card-block {
            border: none;
        }

        .payment ul {
            list-style: initial;
            padding-left: 40px;
        }

        .payment ul li {
            margin: 0 0 10px 0;
        }

        .payment .mb-3.mb-3-card .input-group-card {
            position: relative;
        }

        .payment .mb-3.mb-3-card .input-group-card .input-card {
            display: flex;
            align-items: center;
            position: absolute;
            height: 100%;
            padding: 0 10px;
            border-right: 1px solid #ced4da;
        }

        .payment .mb-3.mb-3-card .input-group-card .input-card img {
            height: 26px;
        }

        .payment .mb-3.mb-3-card .input-group-card .form-control {
            padding-left: 80px;
        }

        .payment .custom-select-lg {
            height:  48px;
            border-radius: 2px;
        }

        .form-check-label {
            padding-right: 1.25rem;
            margin-bottom: 0;
            cursor: pointer;
        }
    </style>
@endsection
