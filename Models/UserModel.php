<?php

namespace Main\models;

use Main\app\Model;

class UserModel extends Model
{
    public string $username;
    public string $email;
    public string $password;
    public string $created_at;

    public function rules($auth): array
    {
        return [];
    }
}
