<?php

namespace App\Helpers;

class MaskHelper
{
    public static function cpf(string $cpf)
    {
        return (isset($cpf) ? preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf) : '');
    }

    public static function cnpj(string $cnpj)
    {
        return (isset($cnpj) ? preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj) : '');
    }

    public static function currency($symbol, $value)
    {
        if (isset($value)) {
            if ($symbol == 'R$') return ($symbol.' '.number_format($value, 2, ',', '.'));
            return ($symbol.' '.number_format($value, 2));
        } else {
            return '';
        }
    }

    public static function status($status) 
    {
        switch ($status) {
            case 'A':
                return '<span class="status-activated">ATIVO</span>';
                break;
            case 'D':
                return '<span class="status-deactivated">INATIVO</span>';
                break;
            default:
                return '<span class="status-unknown">DESCONHECIDO</span>';
        }
    }
}
