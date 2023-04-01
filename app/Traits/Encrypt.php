<?php


namespace App\Traits;


trait Encrypt
{
    protected $p = 47;
    protected $q = 71;



    public function encrypt()
    {

        $n = $this->p * $this->q;

        $l = ($this->p - 1) * ($this->q - 1);

        // Mendapatkan nilai relatif prima dari $l
        $e  = $this->isCoPrime($l); //Public Key

        $response = [
            'n' => $n,
            'l' => $l,
            'e' => $e
        ];

        return $response;

    }


    // Menghitung nilai koprima
    public function isCoPrime($l)
    {

        $prime = [];
        for($i=1;$i < $l;$i++){

            $a = 0;

            for($j=1;$j<=$i;$j++){

                if($i % $j == 0){
                    $a++;
                }
            }

            if($a == 2){
                array_push($prime, $i);
            }
        }

        $countBil = count($prime);

        $getPositionBil = ($countBil / 2) + 0.5;
        return $prime[$getPositionBil];
    }


    // Random Text
    public function randomMessage($n)
    {
        return substr(md5(microtime()), 0, $n);
    }


    // Encrypt
    public function publicKey($code, $e, $n)
    {
        $cipherTextArr = [];
        foreach (str_split($code) as $key) {

            $ascii = ord($key); // Ubah data ke ascii
            $cipherText = bcpowmod($ascii, $e, $n);


            array_push($cipherTextArr, $cipherText);
        }

        return $cipherTextArr;
    }

}

