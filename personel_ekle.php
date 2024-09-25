<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM kategoriler");
$kategoriler = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isim = $_POST['isim'];
    $soyisim = $_POST['soyisim'];
    $kategori_id = $_POST['kategori_id'];

    $stmt = $pdo->prepare("INSERT INTO personeller (isim, soyisim, kategori_id) VALUES (?, ?, ?)");
    $stmt->execute([$isim, $soyisim, $kategori_id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Personel Ekle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Yeni Personel Ekle</h1>
        <form method="POST">
            <div class="form-group">
                <label>İsim:</label>
                <input type="text" class="form-control" name="isim" required>
            </div>
            <div class="form-group">
                <label>Soyisim:</label>
                <input type="text" class="form-control" name="soyisim" required>
            </div>
            <div class="form-group">
                <label>Kategori:</label>
                <select class="form-control" name="kategori_id" required>
                    <?php foreach ($kategoriler as $kategori): ?>
                        <option value="<?= $kategori['id'] ?>"><?= $kategori['isim'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ekle</button>
            <a href="index.php" class="btn btn-secondary">Geri Dön</a>
        </form>
    </div>
</body>
</html>
