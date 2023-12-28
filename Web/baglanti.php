<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<?php
// Veritabanı bağlantısı
$host = "localhost"; // Veritabanı sunucusu
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı parolası
$dbname = "iletisim"; // Veritabanı adı  // bi bakarmısın siteye olur

// Veritabanı bağlantısını oluştur
$conn = new mysqli($host, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// POST verilerini güvenli bir şekilde alın
$ad= mysqli_real_escape_string($conn, $_POST["ad"]);
$soyad = mysqli_real_escape_string($conn, $_POST["soyad"]);
$mail = mysqli_real_escape_string($conn, $_POST["mail"]);
$telefon = mysqli_real_escape_string($conn, $_POST["telefon"]);

// Verileri veritabanına ekleyin
$sql = "INSERT INTO iletisim_formu (ad, soyad, mail, telefon) VALUES ('$ad', '$soyad', '$mail', '$telefon')";

if ($conn->query($sql) === TRUE) {
    echo "Veriler başarıyla kaydedildi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
</body>
</html>