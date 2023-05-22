<?php

namespace app\core;

abstract class Migration{
    
    protected function createTable(string $table, string $values){
        $db = Application::$app->db;
       $SQL =  "CREATE TABLE IF NOT EXISTS $table($values) ENGINE=INNODB;";
       $db->pdo->exec($SQL);
    }

    protected function dropTable(string $table){
        $db = Application::$app->db;
       $SQL =  "DROP TABLE $table;";
       $db->pdo->exec($SQL);
    }
}