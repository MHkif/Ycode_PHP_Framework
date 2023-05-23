<?php 
// namespace app\migrations;
use app\core\Migration; 

class m0001_users_table extends Migration {


    public function up(){
       
        $Sql = "id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL,
         password VARCHAR(255) NOT NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
         ";
        Migration::createTable('users', $Sql);

    }

    public function down(){
      
        $this->dropTable("users");
    }



}