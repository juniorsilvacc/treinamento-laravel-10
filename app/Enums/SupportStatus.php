<?php

namespace App\Enums;

enum SupportStatus: string
{
    case O = 'Open';
    case P = 'Pendent';
    case C = 'Closed';
}
