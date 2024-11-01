<?php

namespace App\Enums;

enum PaymentMethod: string {

    case CREDIT_CARD = 'CREDIT_CARD';

    case BOLETO = 'BOLETO';

    case PIX = 'PIX';

}
