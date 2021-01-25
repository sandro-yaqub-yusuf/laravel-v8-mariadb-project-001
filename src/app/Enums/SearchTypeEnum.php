<?php

namespace App\Enums;

/**
 * Class SearchTypeEnum
 * @package App\Enums
 */
class SearchTypeEnum extends Enum
{
    public const CONTAINS = 'CONTAINS';
    public const EQUAL = 'EQUAL';
    public const GTE = 'GREATER_THAN_OR_EQUAL';
    public const GT = 'GREATER_THAN';
    public const LTE = 'LOWER_THAN_OR_EQUAL';
    public const LT = 'LOWER_THAN';
}
