<?php
    // Función de desencriptación
    function decrypt($encryptedData, $key) {
        $key = hash('sha256', $key, true);
        $data = base64_decode($encryptedData);
        $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
        $decrypted = openssl_decrypt(substr($data, openssl_cipher_iv_length('aes-256-cbc')), 'aes-256-cbc', $key, 0, $iv);
        return $decrypted;
    }
    
    // Desencriptar la contraseña almacenada
    $decryptedData = decrypt("", "milochomil10008000");
    
    echo $decryptedData;
?>