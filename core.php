<?php

require_once 'database.php';
require_once 'gallery.php';

function handleRequest()
{

    $db = new Database('g.db');
    $gallery = new Gallery($db);

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $photos = $gallery->getPhotos();
            echo json_encode($photos);
            break;
        case 'POST':
            $uploadedFile = $_FILES['file'];
            $photoId = $gallery->uploadPhoto($uploadedFile);
            $photos = $gallery->getPhotos();
            echo json_encode(['photoId' => $photoId, 'photos' => $photos]);
            break;
        default:
            http_response_code(405); // Method Not Allowed
            break;
    }
}

handleRequest();
