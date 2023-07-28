<?php

class UTILS {

    public static function getDateNow() {
        return date(Config::DATE_FORMAT);
    }

    
    public static function generateGuid() {
        if (function_exists('com_create_guid') === true) return trim(com_create_guid(), '{}');

        $data    = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }


    public static function generateVA($digit) {
        $vaNumber = '';
        for($i = 0; $i < $digit; $i++) { 
            $vaNumber .= mt_rand(0, 9); 
        }
        return $vaNumber;
    }


    public static function generateSignature($payloads, $privateKey) {
        $signature = '';
        $data = [
            'merchant_id' => $payloads->merchant_id, 
            'references_id' => $payloads->references_id
        ];
        
        openssl_sign(json_encode($data, JSON_UNESCAPED_SLASHES), $signature, $privateKey, OPENSSL_ALGO_SHA256);
        return base64_encode($signature);
    }


    public static function verifySignature($data, $signatureBase64, $publicKey) {
        $binarySignature = base64_decode($signatureBase64);
        return (bool)openssl_verify($data, $binarySignature, $publicKey, OPENSSL_ALGO_SHA256);
    }


    public static function generateClientId() {
        return md5(microtime(true).mt_Rand());
    }


    public static function generateClientSecret() {
        return bin2hex(random_bytes(32));
    }


    public static function generateMerchantId() {
        return bin2hex(random_bytes(16));
    }


    public static function validateStatement($statement, $thrownMessage) {
        if ($statement) throw new Exception($thrownMessage);
    }
}
?>