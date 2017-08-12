<?php

namespace App\Models;

class ValidatorModel
{
  static public $validatorMessage =  [
    'required' => ':attribute não informado',
    'unique' => ':attribute já está em uso',
    'array' => ':attribute tem que ser array',
    'in' => 'o array :attribute é inválido',
    'exists' => ':attribute não existe',
  ];
}
