<?php

$URL = "http://localhost/201971021";

session_start();

// koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "201971021";

$conn = new mysqli($servername, $username, $password, $dbname);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// untuk data user saja
function user($key)
{
    $kuy = $_SESSION["user"];
    return query("SELECT * FROM users WHERE id  = $kuy")[0][$key];
}

$store = mysqli_query($conn, "SELECT * FROM store");
$pesanan = mysqli_query($conn, "SELECT * FROM pesanan");

// fungsi insert data
function beli($data)
{
    global $conn;
    $nama_barang = $data['nama_barang'];
    $merek = $data['merek'];
    $ukuran = $data['ukuran'];
    $nama_pembeli = $data['nama_pembeli'];
    $no_hp = $data['no_hp'];
    $alamat = $data['alamat'];
    $harga = $data['harga'];

    // query insert data
    $query = "INSERT INTO pesanan
                    VALUES
                    ('', '$nama_barang', '$merek', '$ukuran', '$nama_pembeli', '$no_hp', '$alamat', $harga)
                    ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    // var_dump($_POST);
    // die;
    $id = $data['id'];
    $nama_barang = $data['nama_barang'];
    $merek = $data['merek'];
    $ukuran = $data['ukuran'];
    $harga = $data['harga'];
    $gambar = $data['gambar'];
    $gambar_lama = $data['gambar_lama'];

    if (!empty($gambar)) {
        $img = $gambar;
    } else {
        $img = $gambar_lama;
    }

    /// query update data
    $query = "UPDATE nilai SET
    -- id = '$id',
    nama_barang = '$nama_barang',
    merek = '$merek',
    ukuran = '$ukuran',
    harga = '$harga',
    gambar = '$gambar',
    WHERE id = $id
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function jual($data)
{
    global $conn;

    $filename = $_FILES["gambar"]["name"];
    $filename = explode(".", $filename);
    $filekstensi = strtolower(end($filename));
    $newfilename = uniqid();
    $newfilename = $newfilename . "." . $filekstensi;

    move_uploaded_file($_FILES["gambar"]["tmp_name"], "assets/produk/" . $newfilename);

    $nama_barang = $data['nama_barang'];
    $merek = $data['merek'];
    $ukuran = $data['ukuran'];
    $harga = $data['harga'];

    // query insert data
    $query = "INSERT INTO store
                    VALUES
                    ('', '$nama_barang', '$merek', '$ukuran', '$harga', '$newfilename')
                    ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
// function untuk menghapus data
function delete($data, $key)
{
    $id = $data['id'];
    global $conn;
    mysqli_query($conn, "DELETE FROM $key WHERE id = $id");

    return mysqli_affected_rows($conn);
}
