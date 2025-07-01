<?php
include_once("config/koneksi.php");

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $sql = "DELETE FROM m_sepatu WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-sepatu.php?pesan=gagal"));
    }

    header("Location: data-sepatu.php?pesan=hapus_sukses");
    exit();
}

if (!isset($_POST["simpan"])) {
    die(header("Location: data-sepatu.php?pesan=gagal"));
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nm = $_POST['nm'];
$merk = $_POST['merk'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$gambar = '';
$deskripsi = $_POST['deskripsi'];

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $folder_tujuan = 'uploads/';

    $nama_baru = uniqid() . '_' . $nama_file;

    if (move_uploaded_file($tmp_file, $folder_tujuan . $nama_baru)) {
        $gambar = $nama_baru;
    } else {
        die(header("Location: data-sepatu.php?pesan=gagal_upload"));
    }
}

if (!empty($id)) {
    if (empty($gambar)) {
        $getOld = mysqli_query($conn, "SELECT gambar FROM m_sepatu WHERE id='$id'");
        $dataOld = mysqli_fetch_assoc($getOld);
        $gambar = $dataOld['gambar'];
    }
    $sql = "UPDATE m_sepatu SET nm='$nm', merk='$merk', kategori='$kategori', harga='$harga', stok='$stok', gambar='$gambar',deskripsi='$deskripsi' WHERE id='$id'";

    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-sepatu.php?pesan=gagal"));
    }

    header("Location: data-sepatu.php?pesan=edit_sukses");
} else {
    $sql = "INSERT INTO m_sepatu (nm, merk, kategori, harga, stok, gambar, deskripsi) 
            VALUES ('$nm', '$merk', '$kategori', '$harga', '$stok','$gambar', '$deskripsi')";

    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-sepatu.php?pesan=gagal"));
    }

    header("Location: data-sepatu.php?pesan=sukses");
}

exit();
?>