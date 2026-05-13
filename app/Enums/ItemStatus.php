<?php

namespace App\Enums;

enum ItemStatus: string
{
    case AVAILABLE = 'available';
    case IN_USE = 'in_use';
    case REPAIR = 'repair';
    case RETIRED = 'retired';
}
