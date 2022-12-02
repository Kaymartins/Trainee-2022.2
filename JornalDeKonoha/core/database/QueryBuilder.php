<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $start_limit = null, $rows_amount = null) {
        $sql = "select * from {$table}";

        if($start_limit >= 0 && $rows_amount > 0) {
            $sql .= " LIMIT {$start_limit}, {$rows_amount}";
        }

        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function countAll($table){

        $sql = "SELECT COUNT(*) FROM {$table}";

        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);
        } catch(Exception $e){
            die("Erro ocorrido: {$e->getMessage()}");
        }
    }
}
