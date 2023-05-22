<?php

namespace app\models;
use app\core\Model;

class UserModel extends Model 
{
    public string $username;
    public string $email;
    public string $password;
    public string $created_at;

}
