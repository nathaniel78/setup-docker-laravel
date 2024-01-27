<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Componentes extends Model
{
    use HasFactory;

    public function formatacaoMascaraDinheiroDecimal($valor)
    {
        $tamanho = strlen($valor);
        $dados = str_replace(',', '.', $valor);

        if($tamanho <= 6) {
            $dados = str_replace(',', '.', $valor);
        } else {
            $separarVirgulaPorPonto = str_replace(',', '.', $valor);
            $separarPorIndice = explode('.', $separarVirgulaPorPonto);
            $dados = $separarPorIndice[0] . $separarPorIndice[1];
        }

        return $dados;
    }

    public function criptoPassword($password)
    {
        return Hash::make($password);
    }
}
