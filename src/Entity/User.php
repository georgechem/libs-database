<?php


namespace App\Entity;


class User implements EntityInterface
{
    private string $id;

    private string $username;

    private string $password;

    private string $role;


    public function create()
    {
        // TODO: Implement create() method.
        echo 'create';
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
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
}
