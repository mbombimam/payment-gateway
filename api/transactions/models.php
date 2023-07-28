<?php 

require('../../utils/db.php');

class MODELS {

    public function findById($params) {
        $pg = new DATABASE();
        
        $merchant_id   = pg_escape_string($params['merchant_id']);
        $references_id = pg_escape_string($params['references_id']);

        $results = $pg->getAssoc("
            SELECT 
                references_id,
                invoice_id,
                status
            FROM transactions
            WHERE merchant_id='{$merchant_id}' 
                AND references_id='{$references_id}'
        ");
        
        return $results;
    }

    public function checkById($params) {
        $pg = new DATABASE();
        
        $references_id = pg_escape_string($params->references_id);

        $results = $pg->getAssoc("
            SELECT 
                merchant_id,
                references_id,
                status
            FROM transactions
            WHERE references_id='{$references_id}'
        ");
        
        return $results;
    }

    public function created($params) {
        $pg = new DATABASE();
        
        $invoice_id       = pg_escape_string($params->invoice_id);
        $merchant_id      = pg_escape_string($params->merchant_id);
        $references_id    = pg_escape_string($params->references_id);
        $item_name        = pg_escape_string($params->item_name);
        $amount           = pg_escape_string($params->amount);
        $payment_type     = pg_escape_string($params->payment_type);
        $customer_name    = pg_escape_string($params->customer_name);
        $virtual_account  = pg_escape_string($params->virtual_account);
        $payment_status   = pg_escape_string($params->payment_status);
        $signature        = pg_escape_string($params->signature);
        $transaction_time = pg_escape_string($params->transaction_time);
        $expired_time     = pg_escape_string($params->expired_time);
        
        $insert = $pg->insert("INSERT INTO transactions (invoice_id, merchant_id, references_id, item_name, amount, payment_type, customer_name, number_va, status, signature, created, expired) 
            VALUES('{$invoice_id}', '{$merchant_id}', '{$references_id}', '{$item_name}', '{$amount}', '{$payment_type}', '{$customer_name}', '{$virtual_account}', '{$payment_status}', '{$signature}', '{$transaction_time}', '${expired_time}')");
        
        return $insert;
    }

    public function updated($params) {
        $pg = new DATABASE();

        $references_id  = pg_escape_string($params->references_id);
        $payment_status = pg_escape_string($params->status);

        $updated = $pg->update("UPDATE transactions SET status='{$payment_status}' WHERE references_id='{$references_id}'");
        return $updated;
    }
}

?>