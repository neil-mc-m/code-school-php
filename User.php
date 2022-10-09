<?php

class User
{
    private string $email;
    private int $id;
    private string $userName;
    private ?string $createdAt;
    private string $role;

    public function __construct(array $userData){
        $this->id = $userData['id'];
        $this->userName = $userData['username'];
        $this->createdAt = $userData['created_at'];
        $this->email = $userData['email'];
        $this->role = $userData['role'];
    }

    public function isUserAdmin(): bool
    {
        return $this->getRole() === 'admin';
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}