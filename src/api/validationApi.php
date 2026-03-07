<?php

class ValidationApi
{
    private static $encryptionKey = $_ENV['API_ENCRYPTION_KEY'];
    private static $encryptionMethod = $_ENV['API_ENCRYPTION_METHOD'];

    public static function validateAdminUser()
    {
        $token = self::getToken();
        if (empty($token)) {
            return false;
        }

        $tokenData = self::decryptToken($token);
        if (!$tokenData || !isset($tokenData['role'])) {
            return false;
        }

        return $tokenData['role'] == 'admin';
    }

    public static function encryptToken($data)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$encryptionMethod));
        $encrypted = openssl_encrypt(json_encode($data), self::$encryptionMethod, self::$encryptionKey, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    public static function decryptToken($token)
    {
        $data = base64_decode($token);
        list($encrypted_data, $iv) = explode('::', $data, 2);
        $decrypted = openssl_decrypt($encrypted_data, self::$encryptionMethod, self::$encryptionKey, 0, $iv);
        return json_decode($decrypted, true);
    }

    private static function getToken()
    {
        return "";
    }
}