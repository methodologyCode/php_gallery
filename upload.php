<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <a class="home-link" href="index.php">Go to Photo Gallery</a>
        <h1>Upload Photo</h1>
        <form id="uploadForm">
            <label for="file">Choose a file:</label>
            <input type="file" id="file" name="file" required>
            <button type="submit">Upload</button>
            <p id="uploadMessage"></p>
        </form>
    </div>

    <script src="upload.js"></script>
</body>

</html>