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

        foreach ($columns as $column) {
            $string = $string . $column . ',';
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

    public function orderBy(?string $column, string $way = 'ASC'): Database
    {
        $this->query .= "ORDER BY ".$column ?? $way;
        return $this;
    }

    public function fetchColumn(): string
    {
        return self::$c
            ->execute_query($this->query.';')
            ->fetch_column();
    }

    public function fetchAssoc(): array|null
    {
        return self::$c
            ->execute_query($this->query.';')
            ->fetch_assoc();
    }

    public function fetchAll(): array|null
    {
        return self::$c
            ->execute_query($this->query.';')
            ->fetch_all(MYSQLI_ASSOC);
    }

    public static function insertedId(): int
    {
        return self::$c->insert_id;
    }
}