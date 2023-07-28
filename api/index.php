<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method=='GET') {
    echo json_encode([
        'status' => '200',
        'success' => true,
        'results' => [
            'status' => 'RUNNING',
            'app_name' => 'Payment Services',
            'app_desc' => 'Payment Gateway Services'
        ]
    ]);
} else {
    echo json_encode([
        'status' => '405',
        'success' => false,
        'message' => 'Method not allowed'
    ]);
}

?>