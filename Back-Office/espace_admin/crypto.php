<?php
define('ENCRYPTION_KEY', 'a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6'); // 32 caractères générés
define('ENCRYPTION_IV', 'q1w2e3r4t5y6u7i8'); // 16 caractères générés

// Fonction de chiffrement
function encryptPassword($password) {
    $cipher = 'aes-256-cbc';
    $options = 0;
    $encrypted_password = openssl_encrypt($password, $cipher, ENCRYPTION_KEY, $options, ENCRYPTION_IV);
    return $encrypted_password;
}

// Fonction de déchiffrement
function decryptPassword($encrypted_password) {
    $cipher = 'aes-256-cbc';
    $options = 0;
    $decrypted_password = openssl_decrypt($encrypted_password, $cipher, ENCRYPTION_KEY, $options, ENCRYPTION_IV);
    return $decrypted_password;
}
?>
