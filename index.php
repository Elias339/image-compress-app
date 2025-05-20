<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image compresser</title>
</head>
<body>
    <h2>Upload an Image To Compress</h2>
    <form action="compress.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" >
        <button type="submit">Compress to WebP</button>
    </form>
</body>
</html>