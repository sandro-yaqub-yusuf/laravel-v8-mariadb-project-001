<?php

namespace App\Support;

class RequestHelper
{
    public static function valid(string $field): bool
    {
        $value = self::get($field);
        
        return ($value !== null);
    }
    
    public static function get(string $field, $default = null)
    {
        return app('request')->get($field, $default);
    }
    
    public static function all(array $fields)
    {
        return app('request')->all($fields);
    }
    
    public static function anyValid(array $fields): bool
    {
        $values = self::all($fields);
        
        foreach ($values as $field => $value){
            if ($value !== null) return true;
        }
        
        return false;
    }
}
