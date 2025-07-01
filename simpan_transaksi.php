<?php
include_once("config/koneksi.php");

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $sql = "DELETE FROM t_transaksi WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-transaksi.php?pesan=gagal"));
    }

    header("Location: data-transaksi.php?pesan=hapus_sukses");
    exit();
}

if (!isset($_POST["simpan"])) {
    die(header("Location: data-transaksi.php?pesan=gagal"));
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$tgl = $_POST['tgl'];
$nmpelanggan = $_POST['nmpelanggan'];
$produkfk = $_POST['produkfk'];
$jml = $_POST['jml'];
$total_harga = $_POST['total_harga'];

if (!empty($id)) {
    $sql = "UPDATE t_transaksi SET tgl='$tgl', nmpelanggan='$nmpelanggan', produkfk='$produkfk', jml='$jml', total_harga='$total_harga' WHERE id='$id'";

    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-transaksi.php?pesan=gagal"));
    }

    header("Location: data-transaksi.php?pesan=edit_sukses");
} else {
    $sql = "INSERT INTO t_transaksi (tgl, nmpelanggan, produkfk, jml, total_harga) 
            VALUES ('$tgl', '$nmpelanggan', '$produkfk', '$jml', '$total_harga')";

    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die(header("Location: data-transaksi.php?pesan=gagal"));
    }

    header("Location: data-transaksi.php?pesan=sukses");
}

exit();
?>