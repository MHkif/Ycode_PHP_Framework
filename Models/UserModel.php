<?php

namespace app\models;

class UserModel extends Model 
{
    public string $username;
    public string $email;
    public string $password;
    public string $created_at;

}
