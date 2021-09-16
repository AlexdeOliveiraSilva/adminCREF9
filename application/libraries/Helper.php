<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper {

        public function extensao($nome){
            $extensao = explode(".",$nome);
            $extensao = $extensao[count($extensao)-1];
            return $extensao;
        }

        public function generateRandomString($length = 10) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
        }

}