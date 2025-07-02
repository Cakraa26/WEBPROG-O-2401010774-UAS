<?php
include_once("config/koneksi.php");

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $sql = "DELETE FROM m_kategori WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-kategori.php?pesan=gagal"));
    }

    header("Location: data-kategori.php?pesan=hapus_sukses");
    exit();
}

if (!isset($_POST["simpan"])) {
    die(header("Location: data-kategori.php?pesan=gagal"));
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

if (!empty($id)) {
    $sql = "UPDATE m_kategori SET kategori='$kategori', deskripsi='$deskripsi' WHERE id='$id'";

    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-kategori.php?pesan=gagal"));
    }

    header("Location: data-kategori.php?pesan=edit_sukses");
} else {
    $sql = "INSERT INTO m_kategori (kategori, deskripsi) 
            VALUES ('$kategori', '$deskripsi')";

    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-kategori.php?pesan=gagal"));
    }

    header("Location: data-kategori.php?pesan=sukses");
}

exit();
?>