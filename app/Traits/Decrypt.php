<?php

namespace App\Traits;

trait Decrypt

{
    // Decrypt
    public function descrypt($l, $e, $n, $encrypts)
    {
        $d = $this->privateKey($l, $e);

        $decrypt = [];
        foreach (explode(".", $encrypts) as $value) {

            (int)$cipherText = bcpowmod($value, $d, $n);

            $chr = chr($cipherText);
            array_push($decrypt, $chr);

        }

        return implode("", $decrypt);
    }

    // Mencari nilai d
    public function privateKey($l, $e)
    {
        $ds = [];
        for ($i = 1; $i < $l*10 ; $i++) {
            if ($i * $e % $l == 1) {

                array_push($ds, $i);
            }
        }

        return $ds[0];
    }



}
