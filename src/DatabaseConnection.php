<?php

namespace App;

use mysqli;

class DatabaseConnection
{
    private string $username = 'php-user';
    private string $password = 'J_g]6!uv]@XHUmf8';
    private string $database = 'recipes';

    public function getConnection(): mysqli|bool
    {
        return mysqli_connect('localhost', $this->username, $this->password, $this->database);
    }
}
