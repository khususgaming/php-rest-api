<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/php-rest-api/?id=2");
curl_setopt( $ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$data = json_decode($response, true);
if(isset($data)){
    echo "Nama : ".$data[0]['nama']."<br>";
    echo "Email : ".$data[0]['email']."<br>";
    echo "Nomor HP : ".$data[0]['nomor_hp']."<br>";
    echo "Pekerjaan : ".$data[0]['pekerjaan']."<br>";
}else{
    echo "Data tidak tersedia!";
}
?>