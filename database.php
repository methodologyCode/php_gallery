<?php

class Database
{
    private $db;

    public function __construct($dbname)
    {
        $this->db = new PDO("sqlite:$dbname");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->initDatabase();
    }

    private function initDatabase()
    {
        // Создаем таблицу для фотографий, если она не существует
        $query = 'CREATE TABLE IF NOT EXISTS photos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            filename TEXT NOT NULL
        );';

        $this->db->exec($query);
    }

    public function getDb()
    {
        return $this->db;
    }
}
