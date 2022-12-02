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

    public function delete($table, $id){
        $sql = sprintf(
            'DELETE FROM %s WHERE %s;',
            $table,
            "id = :id"
        );

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute(compact('id'));
        } catch(Exception $e) {
            var_dump($id);
            die("Erro ao deletar do BD: {$e->getMessage()}");
        }
    }

    public function edit($id, $table, $param)
    {
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s;',
            $table,
            implode(', ',array_map(function($param){
                return "{$param} = :{$param}";
            },array_keys($param))),
            'id =:id'
        );

        $param['id'] = $id;

        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($param);
        } catch(Exception $e){
            die("Erro ao editar BD: {$e->getMessage()}");
        }

    }
}
