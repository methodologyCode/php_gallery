<?php

class Gallery
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getPhotos()
    {
        $query = 'SELECT * FROM photos';
        $statement = $this->db->getDb()->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function uploadPhoto($file)
    {
        $uploadDir = 'uploaded/';

        // Проверяем, что директория для загрузки существует
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Генерируем уникальное имя файла
        $uniqueFilename = uniqid() . '_' . $file['name'];
        $filename = $uploadDir . $uniqueFilename;

        // Сохраняем файл на сервере
        move_uploaded_file($file['tmp_name'], $filename);

        // Добавление информации о фотографии в базу данных
        $query = 'INSERT INTO photos (filename) VALUES (:filename)';
        $statement = $this->db->getDb()->prepare($query);
        $statement->bindParam(':filename', $filename);
        $statement->execute();

        return $this->db->getDb()->lastInsertId();
    }
}
?>


