<?php

namespace App\Support;

use App\Enums\SearchTypeEnum;

class SearchHelper
{
    public static function where(array $fields, array $configs): array
    {
        $values = [];
        
        foreach ($fields as $field => $value)
        {
            if ($value === null) continue;
    
            $config = ($configs[$field] ?? []);
            $column = ($config['column'] ?? $field);

            $type = $config['type'] ?? SearchTypeEnum::EQUAL;
            
            $values[] = self::getConditions($type, $column, $value);
        }
        
        return $values;
    }
    
    /**
     * @param string $type
     * @param string $field
     * @param $value
     * @return array|string[]
     */
    private static function getConditions(string $type, string $field, $value): array
    {
        switch ($type) {
            case SearchTypeEnum::EQUAL:
                return [$field, '=', $value];
            case SearchTypeEnum::CONTAINS:
                return [$field, 'like', "%{$value}%"];
            case SearchTypeEnum::GT:
                return [$field, '>', $value];
            case SearchTypeEnum::GTE:
                return [$field, '>=', $value];
            case SearchTypeEnum::LT:
                return [$field, '<', $value];
            case SearchTypeEnum::LTE:
                return [$field, '<=', $value];
            default:
                return [$field, $value];
        }
    }
}
