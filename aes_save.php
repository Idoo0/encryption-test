<?php
include 'config.php';

function aes_encrypt($data, $key) {
    $iv = openssl_random_pseudo_bytes(16);
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

$key = "kunci_rahasia_aes";

$nama = aes_encrypt($_POST['nama'], $key);
$nim = aes_encrypt($_POST['nim'], $key);
$alamat = aes_encrypt($_POST['alamat'], $key);

$conn->query("INSERT INTO aes_data (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')");
echo "Data terenkripsi dengan AES berhasil disimpan.";
?>
