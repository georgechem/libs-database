<?php


namespace App\Entity;


use App\Database\Database;

class User implements EntityInterface
{
    private int $id;

    private string $username;

    private string $password;

    private array $role;

    public static function createTable()
    {
        $conn = Database::connect();

        $sql = "CREATE TABLE users (id int NOT NULL AUTO_INCREMENT PRIMARY KEY , username varchar(255) NOT NULL, password varchar(255), role varchar(1024))";

        $stmt = $conn->prepare($sql);

        if(!$stmt->execute()){
            $sql = "DROP TABLE users";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $sql = "CREATE TABLE users (id int NOT NULL AUTO_INCREMENT PRIMARY KEY , username varchar(255) NOT NULL, password varchar(255), role varchar(1024))";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        };

    }

    public function create()
    {
        $conn = Database::connect();

        $sql = 'INSERT INTO users (username, password, role) VALUES (?, ?, ?)';

        $stmt = $conn->prepare($sql);

        if(!isset($this->username) || !isset($this->password) || !isset($this->role)){
            echo 'Object is not prepared for INSERT - Missing fileds';
            exit;
        }
        $roles = json_encode($this->role);
        $stmt->bind_param('sss', $this->username, $this->password, $roles);

        $stmt->execute();

        $conn->close();

    }

    public function read(int $id)
    {
        $conn = Database::connect();

        $sql = "SELECT id, username, password, role FROM users WHERE id=?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('i', $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $user = $result->fetch_object();

        $this->setUsername($user->username);

        $this->setPassword($user->password);

        $this->setRole(json_decode($user->role, true));

    }

    public function update(int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): array
    {
        return $this->role;
    }

    public function setRole(array $role): void
    {
        $this->role = $role;
    }
}
