<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Compressor (WebP)</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <h2 class="card-title text-center mb-4 text-primary">Image Compressor (WebP)</h2>
                        
                        <form action="compress.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="image" class="form-label">Select an image to compress</label>
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="compress" class="btn btn-primary btn-lg">
                                     Compress Image
                                </button>
                            </div>
                        </form>

                        <p class="mt-4 text-muted small text-center">
                            Supported: JPG, PNG, GIF → Output: WebP
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
