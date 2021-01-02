<?php
$conn = mysqli_connect("localhost", "root", "", "mobile_lejen");

function getIdWriter($data){
    global $conn;
    $query = "SELECT id_penulis FROM writer WHERE nama = '$data' ";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getIdPublisher($data){
    global $conn;
    $query = "SELECT id_publisher FROM publisher WHERE nama = '$data' ";
    $result = mysqli_query($conn, $query);
    return $result;
}

function tambah($data, $gambar){
    global $conn;
    $name = htmlspecialchars($data['nama_hero']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $id_role = $data['id_role'];
    $image   = addslashes(file_get_contents($gambar['gambar']['tmp_name']));

    $query = "INSERT INTO hero (nama_hero, id_role, gambar, deskripsi)
                VALUES 
                ('$name', '$id_role', '$image', '$deskripsi')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function getAllRole(){
    global $conn;
    $query = "SELECT * FROM role_hero ";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function getAll() {
    global $conn;
    $query = "SELECT * 
    FROM hero
    JOIN role_hero
    ON hero.id_role = role_hero.id_role
    ";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM hero WHERE id_hero = $id ");
    return mysqli_affected_rows($conn);
}


?>