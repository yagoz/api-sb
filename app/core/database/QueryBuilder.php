<?php

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    
    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Return all records from a table
     *
     * @param  string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Find a record by id
     *
     * @param  string $table
     * @param  int  $id
     */
    public function findById($table, $id)
    {
        $statement = $this->pdo->prepare("select * from {$table} where id = {$id}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }


    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
            $id = $this->pdo->lastInsertId();
            return $id;
        } catch (\Exception $e) {
            //
        }
    }

    /**
     * Update a record from a table.
     *
     * @param  string $table
     * @param  array  $parameters
     * @param  int  $id
     */
    public function update($table, $parameters, $id)
    {

        foreach($parameters as $parameter =>  $value){
            $str .= "{$parameter}='{$value}',";
        }
        $str = rtrim($str, ",");
        
        $sql = sprintf(
            'UPDATE %s SET %s where id = %s',
            $table,
            $str,
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            
        } catch (\Exception $e) {
            //
        }
    }

    /**
     * Delete a record from a table.
     *
     * @param  string $table
     * @param  int  $id
     */
    public function delete($table, $id)
    {

        $sql = sprintf(
            'DELETE FROM %s where id = %s',
            $table,
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (\Exception $e) {
            //
        }
    }

}