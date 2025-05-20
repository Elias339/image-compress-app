<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Compression Result</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5 text-center">
                        <?php
                        if (isset($_POST['compress']) && isset($_FILES['image'])) {
                            $image = $_FILES['image'];

                            $uploadDir = 'uploads/';
                            $compressedDir = 'compressed/';
                            $fileName = basename($image['name']);
                            $uploadPath = $uploadDir . $fileName;

                            if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
                                $imageInfo = getimagesize($uploadPath);
                                $mime = $imageInfo['mime'];
                                $webpName = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
                                $webpPath = $compressedDir . $webpName;

                                switch ($mime) {
                                    case 'image/jpeg':
                                        $img = imagecreatefromjpeg($uploadPath);
                                        break;
                                    case 'image/png':
                                        $img = imagecreatefrompng($uploadPath);
                                        break;
                                    case 'image/gif':
                                        $img = imagecreatefromgif($uploadPath);
                                        break;
                                    default:
                                        echo "<div class='alert alert-danger'>Unsupported image type.</div>";
                                        exit;
                                }

                                if (imagewebp($img, $webpPath, 60)) {
                                    echo "<h3 class='text-success mb-3'>Image Compressed Successfully!</h3>";
                                    echo "<img src='$webpPath' alt='Compressed Image' class='img-fluid rounded shadow mb-4' style = 'height:200px;'> <br>";
                                    echo "<a href='$webpPath' download class='btn btn-success btn-lg'>Download Compressed Image</a>";
                                } else {
                                    echo "<div class='alert alert-danger'>Compression failed.</div>";
                                }

                                imagedestroy($img); 

                            } else {
                                echo "<div class='alert alert-warning'>Image upload failed.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-info'>No image selected.</div>";
                        }
                        ?>
                        <br><br>
                        <a href="index.php" class="btn btn-outline-secondary mt-3">Back to Compressor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
