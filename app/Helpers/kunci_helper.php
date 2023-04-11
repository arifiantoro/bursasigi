<?php

    function enkripkan($kata = null)
    {
        $method = "AES-128-CTR";
        $key = "s1n4rindo5iner6i";
        // dd(openssl_cipher_iv_length($method));
        $iv = 1836529461279053;
        $enc = openssl_encrypt($kata, $method, $key, 0, $iv);
        
        return $enc;
    }
    
    function dekripsi($enc = null)
    {
        $method = "AES-128-CTR";
        $key = "s1n4rindo5iner6i";
        // dd(openssl_cipher_iv_length($method));
        $iv = 1836529461279053;
        $dec = openssl_decrypt($enc, $method, $key, 0, $iv);

        return $dec;
    }

?>