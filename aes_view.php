<?php
include 'config.php';

function aes_decrypt($data, $key) {
    $data = base64_decode($data);
    $iv = substr($data, 0, 16);
    $cipher = substr($data, 16);
    return openssl_decrypt($cipher, 'AES-256-CBC', $key, 0, $iv);
}

$key = "kunci_rahasia_aes";

$result = $conn->query("SELECT * FROM aes_data");
while ($row = $result->fetch_assoc()) {
    echo "Nama: " . aes_decrypt($row['nama'], $key) . "<br>";
    echo "NIM: " . aes_decrypt($row['nim'], $key) . "<br>";
    echo "Alamat: " . aes_decrypt($row['alamat'], $key) . "<hr>";
}
?>
