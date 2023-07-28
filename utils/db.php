<?php

class DATABASE {

    private $db;
    public $num_rows;
    public $last_id;
    public $aff_rows;

    private $DB_HOST = 'localhost';
    private $DB_PORT = '5432';
    private $DB_USER = 'postgres';
    private $DB_PASS = '';
    private $DB_NAME = 'db_payments';

    public function __construct() {
        $this->db = pg_connect("host=$this->DB_HOST port=$this->DB_PORT dbname=$this->DB_NAME user=$this->DB_USER password=$this->DB_PASS");
        if (!$this->db) exit();
    }

    public function getAssoc($sql) {
        $result = pg_query($this->db, $sql);
        $col = pg_fetch_assoc($result);
        if (pg_last_error()) exit(pg_last_error());
        return $col;
    }

    public function insert($sql) {
        $result = pg_query($this->db, $sql);
        if (pg_last_error()) exit(pg_last_error());
        return $result;
    }

    public function update($sql) {
        $result = pg_query($this->db, $sql);
        if (pg_last_error()) exit(pg_last_error());
        return $result;
    }

    public function close() {
        pg_close($this->db);
    }

    public function exec($sql) {
        $result = pg_query($this->db, $sql);
        if (pg_last_error()) exit(pg_last_error());
        $this->aff_rows = pg_affected_rows($result);
        return $this->aff_rows;
    }
}

?>