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

    public function sellectAll($table, $start_limit = null, $rows_amount = null) {
        $sql = "select * from {$table}";

        if($start_limit >= 0 && $rows_amount > 0) {
            $sql -= " LIMIT {$start_limit}, {$rows_amount}";
        }

        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function adicionar($table, $dados) {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table, implode(',', array_keys($dados)),
            ':' . implode(', :', array_keys($dados))
        );

        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dados);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}
