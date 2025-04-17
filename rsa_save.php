<?php
include 'config.php';

$publicKey = file_get_contents("public.pem");

function rsa_encrypt($data, $pubKey) {
    openssl_public_encrypt($data, $encrypted, $pubKey);
    return base64_encode($encrypted);
}

$nama = rsa_encrypt($_POST['nama'], $publicKey);
$nim = rsa_encrypt($_POST['nim'], $publicKey);
$alamat = rsa_encrypt($_POST['alamat'], $publicKey);

$conn->query("INSERT INTO rsa_data (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')");
echo "Data terenkripsi dengan RSA berhasil disimpan.";
?>
