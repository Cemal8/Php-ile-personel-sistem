<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM personeller WHERE id = ?");
$stmt->execute([$id]);
$personel = $stmt->fetch();

$kategori_stmt = $pdo->query("SELECT * FROM kategoriler");
$kategoriler = $kategori_stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isim = $_POST['isim'];
    $soyisim = $_POST['soyisim'];
    $kategori_id = $_POST['kategori_id'];

    $update_stmt = $pdo->prepare("UPDATE personeller SET isim = ?, soyisim = ?, kategori_id = ? WHERE id = ?");
    $update_stmt->execute([$isim, $soyisim, $kategori_id, $id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Personel Güncelle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Personel Güncelle</h1>
        <form method="POST">
            <div class="form-group">
                <label>İsim:</label>
                <input type="text" class="form-control" name="isim" value="<?= $personel['isim'] ?>" required>
            </div>
            <div class="form-group">
                <label>Soyisim:</label>
                <input type="text" class="form-control" name="soyisim" value="<?= $personel['soyisim'] ?>" required>
            </div>
            <div class="form-group">
                <label>Kategori:</label>
                <select class="form-control" name="kategori_id" required>
                    <?php foreach ($kategoriler as $kategori): ?>
                        <option value="<?= $kategori['id'] ?>" <?= $kategori['id'] == $personel['kategori_id'] ? 'selected' : '' ?>>
                            <?= $kategori['isim'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Güncelle</button>
            <a href="index.php" class="btn btn-secondary">Geri Dön</a>
        </form>
    </div>
</body>
</html>
