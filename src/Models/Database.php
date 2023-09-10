<?php

namespace Src\Models;
use mysqli, mysqli_sql_exception;

class Database
{
    private static object $c;
    private string $query;

    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            require(BASE_PATH . 'database/credentials.php');
            self::$c = new mysqli($dbServer, $dbUser, $dbPass, $dbName, $dbPort);
        } catch (mysqli_sql_exception $e) {
            throw new mysqli_sql_exception($e -> getMessage(), $e -> getCode());
        } finally {
            unset($dbServer, $dbUser, $dbPass, $dbName, $dbPort);
        }
    }

    public function select(string|array $columns): Database
    {
        if (is_string($columns)) {
            $this->query = "SELECT {$columns} ";
            return $this;
        };

        $string = '';
        foreach ($columns as $column) {
            $string .= $column . ',';
        }

        $this->query = "SELECT ".rtrim($string, ',')." ";
        return $this;
    }

    public function from(string|array $tables): Database
    {
        if (is_string($tables)) {
            $this->query = $this->query."FROM {$tables} ";
            return $this;
        }

        foreach ($tables as $table) {
            $string = $string . $table . ',';
        }

        $this->query .= "FROM ".rtrim($string, ',')." ";
        return $this;
    }

    public function insert(array $values): Database
    {
        $tableColumns = '';
        $insertingValues = '';
        foreach ($values as $key => $value) {
            $tableColumns .= "`{$key}`, ";
            switch ($value) {
                case is_string($value):
                    $insertingValues .= "\"{$value}\", ";
                    break;
                case is_int($value):
                case is_float($value):
                case 'default':
                case 'null':
                    $insertingValues .= "{$value}, ";
                    break;
            }

        }

        $tableColumns = rtrim($tableColumns, ', ');
        $insertingValues = rtrim($insertingValues, ', ');


        $this->query = "({$tableColumns}) VALUES ({$insertingValues})";
        return $this;
    }

    public function into(string $table): Database
    {
        $this->query = "INSERT INTO `{$table}` ".$this->query;
        return $this;
    }

    public function where(string|array $conditions): Database
    {
        if (is_string($conditions)) {
            $this->query = $this->query."WHERE {$conditions}";
            return $this;
        }

        foreach ($conditions as $condition) {
            $string = $string . $condition . ' AND ';
        }

        $this->query .= "WHERE ".rtrim($string, ' AND')." ";
        return $this;
    }

    public function orderBy(string $column, string $way = 'ASC'): Database
    {
        $this->query .= " ORDER BY ".$column." ".$way;
        return $this;
    }

    public function fetchColumn(): string
    {
        return self::$c
            ->execute_query($this->query.';')
            ->fetch_column();
    }

    public function fetchAssoc(): ?array
    {
        return self::$c
            ->execute_query($this->query.';')
            ->fetch_assoc();
    }

    public function fetchAll(): ?array
    {
        return self::$c
            ->execute_query($this->query.';')
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function execute(): true|mysqli_sql_exception
    {
        return self::$c->execute_query($this->query.';');
    }

    public static function insertedId(): int
    {
        return self::$c->insert_id;
    }
}