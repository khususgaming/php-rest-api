<?php
function tampilDataAll(){
    global $koneksi;
    $sql = mysqli_query($koneksi, "SELECT * FROM users");
    $data = array();
    while($row = mysqli_fetch_assoc($sql)){
        $data[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
}

function tampilData($id){
    global $koneksi;
    $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
    if($sql->num_rows < 1){
        exit("Data tidak tersedia!");
    }
    $data = array();
    while($row = mysqli_fetch_assoc($sql)){
        $data[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
}

function cekValidData($data){
    if(!isset($data['nama'])){
        return false;
    }
    if(!isset($data['email'])){
        return false;
    }
    if(!isset($data['nomor_hp'])){
        return false;
    }else{
        if(!is_numeric($data['nomor_hp']) || $data['nomor_hp'] <= 0){
            return false;
        }
    }
    if(!isset($data['pekerjaan'])){
        return false;
    }
    return true;
}

function buatData(){
    $data = (array)json_decode(file_get_contents('php://input'), TRUE);
    if(!cekValidData($data)){
        header("HTTP/1.1 422 Unprocessable Entity");
        exit();
    }
    global $koneksi;
    $nama = $data['nama'];
    $email = $data['email'];
    $nomor_hp = $data['nomor_hp'];
    $pekerjaan = $data['pekerjaan'];
    $simpan = mysqli_query($koneksi, "INSERT INTO users (nama, email, nomor_hp, pekerjaan) 
    VALUES ('$nama', '$email', '$nomor_hp', '$pekerjaan')");
    if($simpan){
        echo "Penyimpanan data berhasil dilakukan!";
    }else{
        echo "Penyimpanan data gagal dilakukan!";
    }
}
?>