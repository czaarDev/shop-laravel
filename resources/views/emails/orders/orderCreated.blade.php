<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="color-scheme" content="light">
        <meta name="supported-color-schemes" content="light">
        <style>
            @media only screen and (max-width: 600px) {
                .inner-body {
                    width: 100% !important;
                }
                .footer {
                    width: 100% !important;
                }
            }
            @media only screen and (max-width: 500px) {
                .button {
                    width: 100% !important;
                }
            }
        </style>
    </head>
    <body>
        <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td align="center">
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td class="header" style="text-align: center;">
                                <a href="" style="display: inline-block;">
                                    <img src="{{ asset('assets/images/site/logo.png') }}" class="logo" alt="{{ config('app.name') }}" style="width: 100px;">
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="header" style="text-align: center;">
                                <hr />
                            </td>
                        </tr>

                        <tr>
                            <td class="body" width="100%" cellpadding="0" cellspacing="0">
                                <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <td class="content-cell">
                                            <p style="text-align: center;">
                                                Recebemos seu pedido do produto <b>{{ $order->order_items->implode('product.name') }}</b>!
                                            </p>
                                            <p style="text-align: center;">
                                                Caso você feito a compra via boleto, agora você deve pagá-lo e aguardar a compensação.
                                                Se você pagou com cartão e foi aprovado, a sua matrícula já está confirmada.
                                            </p>

                                            <p style="text-align: center;">
                                                Por favor, clique no botão abaixo para visualizar o pagamento.
                                            </p>

                                            <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                <tr>
                                                    <td align="center">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                                                            <tr>
                                                                <td align="center">
                                                                    <a href="{{ route('site.order.thanksPayment', $order) }}" class="button button-primary" target="_blank" rel="noopener">
                                                                        Ver pedido
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p style="text-align: center;">@lang('Se você não criou esse pagamento, nenhuma outra ação será necessária.')</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td class="header" style="text-align: center;">
                                <hr />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <td class="content-cell" align="center">
                                            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
