<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isim = $_POST['isim'];

    $stmt = $pdo->prepare("INSERT INTO kategoriler (isim) VALUES (?)");
    $stmt->execute([$isim]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Kategori Ekle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Yeni Kategori Ekle</h1>
        <form method="POST">
            <div class="form-group">
                <label>Kategori İsmi:</label>
                <input type="text" class="form-control" name="isim" required>
            </div>
            <button type="submit" class="btn btn-primary">Ekle</button>
            <a href="index.php" class="btn btn-secondary">Geri Dön</a>
        </form>
    </div>
</body>
</html>
