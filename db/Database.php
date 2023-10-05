<?php

class Database extends PDO {
    private $mostrarQuery; // variavel bool que determina se as querys serão gravadas
    private $logFile = "queries.log";

    // contructor
    public function __construct($dsn, $username, $password, $mostrarQuery) {
        parent::__construct($dsn, $username, $password); // super/ pdo

        $this->mostrarQuery = $mostrarQuery;
    }

    public function query(string $query, ?int $fetchMode = null, mixed ...$fetchModeArgs) {
        if ($this->mostrarQuery === true) {
            $queryInserida = "- $query" . "\r\n";
            file_put_contents($this->logFile, $queryInserida, FILE_APPEND);
        }

    }

    public function setMostrarQuery($mostrarQuery)
    {
        $this->mostrarQuery = $mostrarQuery;
    }


} ?>