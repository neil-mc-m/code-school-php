<?php

include_once __DIR__ . '../../User.php';

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

    public function getClassesOrderedByDate(): mysqli_result|bool
    {
        return $this->getConnection()->query('select * from class order by date desc');
    }

    public function registerUser($userName, $password, $email): bool|mysqli_stmt
    {
        $statement = $this->connection->prepare("INSERT INTO users VALUES (DEFAULT, ?, ?, DEFAULT, DEFAULT, ?)");

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement->bind_param('sss', $userName, $password_hash, $email);
        $statement->execute();

        return $statement;
    }

    public function loadUserFromSession(mixed $userId)
    {
        $statement = $this->getConnection()->prepare('SELECT * FROM users WHERE id = ?');

        $statement->bind_param('i', $userId);

        $statement->execute();

        return $this->asUser($statement->get_result());
    }

    public function asArray($mysqlResult): array
    {
        $dataRow = [];
        if ($mysqlResult->num_rows > 0) {
            while ($row = $mysqlResult->fetch_assoc()) {
                $dataRow[] = $row;
            }
        }

        return $dataRow;
    }

    public function asUser($mysqlResult): User|false
    {
        if ($mysqlResult->num_rows > 0) {
            $dataRow = $mysqlResult->fetch_assoc();
            return new User($dataRow);
        }

        return false;
    }

    public function createBooking(mixed $data):bool|mysqli_stmt
    {
        $statement = $this->getConnection()->prepare("INSERT INTO booking VALUES (DEFAULT, ?, ?, DEFAULT)");

        $classId = (int)$data['class_id'];
        $userId = (int)$data['user_id'];
        $statement->bind_param('ss', $classId, $userId);

        $statement->execute();

        return $statement;
    }

    public function loadBookings(): array
    {
        $statement = $this->getConnection()->prepare('SELECT * FROM booking;');

        $statement->execute();

        return $this->asArray($statement->get_result());
    }

    public function getClassById($classId)
    {
        $statement = $this->getConnection()->prepare('SELECT * FROM class WHERE id = ?;');
        $statement->bind_param('i', $classId);
        $statement->execute();
        $mysqlResult = $statement->get_result();
        if ($mysqlResult->num_rows > 0) {
            return $mysqlResult->fetch_assoc();
        }

        return [];
    }
}
