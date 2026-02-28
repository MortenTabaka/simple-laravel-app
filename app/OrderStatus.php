<?php

namespace App;

enum OrderStatus: string
{
    case CREATED = 'CREATED';
    case CONFIRMED = 'CONFIRMED';
}
