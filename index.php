<?php
require "koneksi.php";
require "fungsi.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
if(isset($_SERVER["HTTP_AUTHORIZATION"])){
    $auth = $_SERVER["HTTP_AUTHORIZATION"];
    $auth_array = explode(" ", $auth);
    $auth_data = explode(":", base64_decode($auth_array[1]));
    $user = $auth_data[0];
    $pass = $auth_data[1];
    if($user == "user123" AND $pass == "pass123"){
        $id = null;
        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];
        }
        $metode = $_SERVER["REQUEST_METHOD"];
        switch($metode){
            case 'GET':
            {
                if($id == null){
                    tampilDataAll();
                }else{
                    tampilData($id);
                }
                break;
            }
            case 'POST':
            {
                buatData();
                break;

            }
        }
    }else{
        header('HTTP/1.0 401 Unauthorized');
        exit();
    }
}
?>