<?php
if(isset($_GET['nama'])
AND isset($_GET['email'])
AND isset($_GET['hp'])
AND isset($_GET['pekerjaan'])){
    $nama = $_GET['nama'];
    $email = $_GET['email'];
    $hp = $_GET['hp'];
    $pekerjaan = $_GET['pekerjaan'];
    $url = "http://localhost/php-rest-api/";
    $data = array(
        "token" => "token123",
        "nama" => $nama,
        "email" => $email,
        "nomor_hp" => $hp,
        "pekerjaan" => $pekerjaan
    );
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n".
                        "Authorization: Basic ".base64_encode("user123:pass123"),
            'content' => json_encode($data)
        )
    ));
    $response = file_get_contents($url, FALSE, $context);
}else{
    $response = "URI tidak valid, isi dengan parameter ?nama={nama}&email={email}&hp={hp}&pekerjaan={pekerjaan}";
}
echo $response;

?>