<?php
include 'db.php';

$stmt = $pdo->query("SELECT personeller.*, kategoriler.isim AS kategori_ismi FROM personeller JOIN kategoriler ON personeller.kategori_id = kategoriler.id");
$personeller = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Personel Yönetim Sistemi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Tüm Personeller</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>İsim</th>
                    <th>Soyisim</th>
                    <th>Kategori</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personeller as $personel): ?>
                <tr>
                    <td><?= $personel['id'] ?></td>
                    <td><?= $personel['isim'] ?></td>
                    <td><?= $personel['soyisim'] ?></td>
                    <td><?= $personel['kategori_ismi'] ?></td>
                    <td>
                        <a href="sil.php?id=<?= $personel['id'] ?>" class="btn btn-danger btn-sm">Sil</a>
                        <a href="guncelle.php?id=<?= $personel['id'] ?>" class="btn btn-warning btn-sm">Güncelle</a> 
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="personel_ekle.php" class="btn btn-primary">Yeni Personel Ekle</a>
        <a href="kategori_ekle.php" class="btn btn-secondary">Yeni Kategori Ekle</a>
        
    </div>
</body>
</html>
