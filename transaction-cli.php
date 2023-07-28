<?php

require('./utils/db.php');
require('./utils/config.php');

if (count($argv) > 1 && isset($argv[1]) && isset($argv[2])) {
    $references_id = $argv[1];
    $status        = $argv[2];

    $pg = new DATABASE();
    $check = $pg->getAssoc("SELECT invoice_id, merchant_id, references_id, status FROM transactions WHERE references_id='{$references_id}'");
    if ($check) {
        $update = $pg->update("UPDATE transactions SET status='{$status}' WHERE references_id='{$references_id}' AND invoice_id='{$check['invoice_id']}'");
        if ($update) {
            echo 'Update transaction successful';
        } else {
            echo 'Update transaction failed';
        }
    } else {
        echo 'Data not found';
    }
} else {
    echo 'Please insert parameter';
}

?>