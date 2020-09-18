<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/php-rest-api/");
curl_setopt( $ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$data = json_decode($response, true);
foreach($data as $user){
    echo "<p>Nama : ".$user['nama']."<br>";
    echo "Email : ".$user['email']."<br>";
    echo "Nomor HP : ".$user['nomor_hp']."<br>";
    echo "Pekerjaan : ".$user['pekerjaan']."<br></p>";
}
?>