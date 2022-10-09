<?php

class Database
{
    private mysqli|false $connection;

    public function __construct()
    {
        $user = 'neil-php';
        $pass = 'cKv@NLxM(4wo_j/t';
        $databaseName = 'dublin-code-school';
        $host = 'localhost';

        $this->connection = mysqli_connect($host, $user, $pass, $databaseName);
    }

    public function getConnection(): bool|mysqli
    {
        return $this->connection;
    }

    public function findUserFromUsername($userName): bool|mysqli_result
    {
        $statement = $this->getConnection()->prepare('select * from users where username = ?');

        $statement->bind_param('s', $userName);

        $statement->execute();

        return $statement->get_result();
    }

    public function getClassesOrderedByDate(): string
    {
        $result = $this->getConnection()->query('select * from class order by created_at desc');

        $html = '';

        while ($row = $result->fetch_assoc()) {
            $formattedDate = (new DateTime($row['date']))->format('Y-m-d');
            $html .= "<div class='class-row'>";
            $html .= "<h3>{$row['title']}</h3>";
            $html .= "<div>{$row['content']}</div>";
            $html .= "<p>$formattedDate</p>";
            $html .= "</div>";
        }

        return $html;
    }

    public function registerUser($userName, $password, $email): bool|mysqli_stmt
    {
        $statement = $this->connection->prepare("INSERT INTO users VALUES (DEFAULT, ?, ?, DEFAULT, DEFAULT, ?)");

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement->bind_param('sss', $userName, $password_hash, $email);
        $statement->execute();

        return $statement;
    }
}
