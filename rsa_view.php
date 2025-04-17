<?php
include 'config.php';

$privateKey = file_get_contents("private.pem");

function rsa_decrypt($data, $privKey) {
    openssl_private_decrypt(base64_decode($data), $decrypted, $privKey);
    return $decrypted;
}

$result = $conn->query("SELECT * FROM rsa_data");
while ($row = $result->fetch_assoc()) {
    echo "Nama: " . rsa_decrypt($row['nama'], $privateKey) . "<br>";
    echo "NIM: " . rsa_decrypt($row['nim'], $privateKey) . "<br>";
    echo "Alamat: " . rsa_decrypt($row['alamat'], $privateKey) . "<hr>";
}
?>
