<?php

namespace App\Helpers;

//use App\Helpers\HelperVarious;

class ValidacaoLotofacil
{
    public static function validateConcurso($data)
    {
        if (empty($data['numero_concurso'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Número do Concurso!");
            return $array;
        } else if (empty($data['data'])) {
            $array = array('status' => 'error', 'message' => "Preencha a Data do Concurso!");
            return $array;
        } elseif (empty($data['bola1']) || $data['bola1'] > 25) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 1!");
            if ($data['bola1'] > 25) {
                $array = array('status' => 'error', 'message' => "Bola 1 maior que 25!");
            }
            return $array;
        } elseif (empty($data['bola2']) || $data['bola2'] > 25) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 2!");
            if ($data['bola2'] > 25) {
                $array = array('status' => 'error', 'message' => "Bola 2 maior que 25!");
            }
            return $array;
        } elseif (empty($data['bola3']) || $data['bola3'] > 25) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 3!");
            if ($data['bola3'] > 25) {
                $array = array('status' => 'error', 'message' => "Bola 3 maior que 25!");
            }
            return $array;
        } elseif (empty($data['bola4']) || $data['bola4'] > 25) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 4!");
            if ($data['bola4'] > 25) {
                $array = array('status' => 'error', 'message' => "Bola 4 maior que 25!");
            }
            return $array;
        } elseif (empty($data['bola5']) || $data['bola5'] > 25) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 5!");
            if ($data['bola5'] > 25) {
                $array = array('status' => 'error', 'message' => "Bola 5 maior que 25!");
            }
            return $array;
        } elseif (empty($data['bola6']) || $data['bola6'] > 25) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 6!");
            if ($data['bola6'] > 25) {
                $array = array('status' => 'error', 'message' => "Bola 6 maior que 25!");
            }
            return $array;
        } elseif (empty($data['bola7']) || $data['bola7'] > 25) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 7!");
            if ($data['bola7'] > 25) {
                $array = array('status' => 'error', 'message' => "Bola 7 maior que 25!");
            }
            return $array;
        } elseif (empty($data['bola8'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 8!");
            return $array;
        } elseif (empty($data['bola9'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 9!");
            return $array;
        } elseif (empty($data['bola10'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 10!");
            return $array;
        } elseif (empty($data['bola11'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 11!");
            return $array;
        } elseif (empty($data['bola12'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 12!");
            return $array;
        } elseif (empty($data['bola13'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 13!");
            return $array;
        } elseif (empty($data['bola14'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 14!");
            return $array;
        } elseif (empty($data['bola15'])) {
            $array = array('status' => 'error', 'message' => "Preencha o Valor da Bola 15!");
            return $array;
        }

        if (self::verificaNumerosDuplicados($data)) {
            $array = array('status' => 'error', 'message' => "Há Números Duplicados, Corrija!");
            return $array;
        }
        return false;
    }

    protected static function verificaNumerosDuplicados($data) 
    {
        $array = array($data['bola1'], $data['bola2'], $data['bola3'], $data['bola4'], $data['bola5'], $data['bola6'],
                 $data['bola7'], $data['bola8'], $data['bola9'], $data['bola10'], $data['bola11'], $data['bola12'], 
                 $data['bola13'], $data['bola14'], $data['bola15']);

        return array_unique(array_diff_assoc($array, array_unique($array)));          
    }

}
