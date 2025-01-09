<?php

class ActivityType
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function create(string $name, string $description): bool
    {
        $query = $this->db->prepare('INSERT INTO activity_types (name, description, created_at) VALUES (:name, :description, NOW())');
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);

        return $query->execute();
    }

    public function findAll()
    {
        $query = $this->db->prepare('SELECT * FROM activity_types');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}