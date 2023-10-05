<?php

require_once 'Database.php';

class DatabaseManager {

    private static $instance;
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Database(
                'mysql:host=localhost;dbname=users',
                'root',
                '1234',
                true
            );
        }

        return self::$instance;
    }

    public static function mostrarQuery($mostrar) {
        $db = self::getInstance();
        $db->setMostrarQuery($mostrar);
    }
}

?>

