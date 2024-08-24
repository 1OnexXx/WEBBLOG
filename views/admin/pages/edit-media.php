<?php
require_once '../../../config/database.php';
require_once '../../admin/classes/post_media.php';

// Membuat koneksi ke database
$database = new Database();
$db = $database->getConnection();

$post = new Post_media($db);

if (isset($_GET['media_id'])) {
    $encoded_id = htmlspecialchars($_GET['media_id']);
    $media_id = base64_decode($encoded_id);
    if ($media_id === false || !is_numeric($media_id)) {
        // Jika decoding gagal atau hasil bukan angka, redirect ke halaman lain atau tampilkan pesan error
        header('Location: kelola-media.php');
        exit();
    }
    // Menetapkan media_id ke objek Post_media
    $post->media_id = $media_id;

    // Mengambil data artikel untuk ditampilkan di form
    if ($post->readOne()) {
        $file_path = $post->file_path;
        $uploaded_by = $post->uploaded_by;
        $uploaded_at = $post->uploaded_at;
    } else {
        header('Location: kelola-media.php');
        exit();
    }
} else {
    // Redirect atau tampilkan pesan error jika media_id tidak ditemukan
    header('Location: kelola-media.php');
    exit();
}


// if (isset($_GET['media_id'])) {
//     $encoded_id = htmlspecialchars($_GET['media_id']);
//     $media_id = base64_decode($encoded_id);
//     if ($media_id === false) {
//         // Jika decoding gagal, redirect ke halaman lain atau tampilkan pesan error
//         header('Location: kelola-media.php');
//         exit();
//     }
//     // Menetapkan media_id ke objek Post_media
//     $post->media_id = $media_id;

//     // Mengambil data artikel untuk ditampilkan di form
//     if ($post->readOne()) {
//         $file_path = $post->file_path;
//         $uploaded_by = $post->uploaded_by;
//         $uploaded_at = $post->uploaded_at;
//     } else {
//         header('Location: kelola-media.php');
//         exit();
//     }
// } else {
//     // Redirect atau tampilkan pesan error jika media_id tidak ditemukan
//     header('Location: kelola-media.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Media</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .card-header h3 {
            margin: 0;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Media</h3>
        <!-- Form edit media -->
        <form action="../../../proses/proses-media-edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="media_id" value="<?php echo htmlspecialchars($encoded_id); ?>">

            <div class="form-group">
                <label for="current_image">Current Image</label><br>
                <img src="/raihan_belajar_php/belajarPHP/phpOPP/ProjekOOP/WEBBLOG/storage/<?php echo isset($file_path) ? htmlspecialchars(basename($file_path)) : ''; ?>" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
            </div>

            <div class="form-group">
                <label for="new_image">New Image</label>
                <input type="file" name="new_image" id="new_image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="uploaded_by">file path</label>
                <input type="text" name="file_path" id="file_path" value="<?php echo htmlspecialchars($file_path); ?>" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="uploaded_by">Uploaded By</label>
                <input type="text" name="uploaded_by" id="uploaded_by" value="<?php echo htmlspecialchars($uploaded_by); ?>" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Update Media</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>