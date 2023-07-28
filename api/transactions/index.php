<?php

require('../../utils/index.php');
require('../../utils/config.php');
require('./models.php');

$methods     = $_SERVER['REQUEST_METHOD'];
$models      = new MODELS();
$utils       = new UTILS();
$config      = new CONFIG();

switch ($methods) {
    case "GET":
        try {
            $data = ['merchant_id' => $_GET['merchant_id'], 'references_id'=> $_GET['references_id']];
            $verify = $utils::verifySignature(json_encode($data), $_GET['signature'], $config::$publicKey);
            if ($verify) {
                $results = $models->findById($_GET);
                if ($results) {
                    echo json_encode([
                        'status' => 'OK',
                        'success' => true,
                        'results' => $results
                    ]);
                }
            } else {
                echo json_encode([
                    'status' => 'OK',
                    'success' => false,
                    'message' => 'Invalid signature'
                ]);
            }
        } catch(Exception $e) {
            echo json_encode([
                'status' => 'OK',
                'success' => false,
                'message' => 'Page not found'
            ]);
        }
    break;
    case "POST":
        $data     = file_get_contents('php://input');
        $payloads = json_decode($data);

        $utils::validateStatement(empty($payloads->item_name), 'item_name must not be empty!');
        $utils::validateStatement(empty($payloads->amount), 'amount must not be empty!');
        $utils::validateStatement(empty($payloads->payment_type), 'payment_type must not be empty!');
        $utils::validateStatement(empty($payloads->customer_name), 'customer_name must not be empty!');
        $utils::validateStatement(empty($payloads->merchant_id), 'merchant_id must not be empty!');

        try {
            $payloads->invoice_id       = $utils::generateGuid();
            $payloads->references_id    = $utils::generateGuid();
            $payloads->virtual_account  = $utils::generateVA(16);
            $payloads->transaction_time = strtotime($utils::getDateNow());
            $payloads->expired_time     = strtotime(date("Y-m-d", strtotime("+ 1 day")));
            $payloads->signature        = $utils::generateSignature($payloads, $config::$privateKey);
            $payloads->payment_status   = $config::$paymentStatus[0];
            
            $insert = $models->created($payloads);
            if ($insert) {
                echo json_encode([
                    'status' => 'OK',
                    'success' => true,
                    'results' => [
                        'references_id' => $payloads->references_id,
                        'number_va' => $payloads->virtual_account,
                        'status' => $payloads->payment_status,
                        'signature' => $utils::generateSignature($payloads, $config::$privateKey)
                    ]
                ]);
            } else {
                echo json_encode([
                    'status' => 'OK',
                    'success' => false,
                    'message' => 'Insert transaction failed'
                ]);
            }
        } catch(Exception $e) {
            echo json_encode([
                'status' => 'OK',
                'success' => false,
                'results' => $e->getMessage()
            ]);
        }

    break;
    case "PUT":
        $data = file_get_contents('php://input');
        $payloads = json_decode($data);

        $check = $models->checkById($payloads);
        if ($check) {
            $data = ['merchant_id' => $check['merchant_id'], 'references_id'=> $payloads->references_id];
            $verify = $utils::verifySignature(json_encode($data), $payloads->signature, $config::$publicKey);
            if ($verify) {
                $updated = $models->updated($payloads);
                echo json_encode([
                    'status' => 'OK',
                    'success' => false,
                    'message' => 'Update transacion successful'
                ]);
            } else {
                echo json_encode([
                    'status' => 'OK',
                    'success' => false,
                    'message' => 'Invalid signature'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'OK',
                'success' => false,
                'message' => 'Data not found'
            ]);
        }
    break;
}

?>