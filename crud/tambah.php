<?php 
require('function.php');
if(isset($_POST['proses'])){
	define('DB','data_buku.txt');
	if(!file_exists(DB)){
		simpan(DB,"kode buku|judul buku|pengarang|tahun terbit|jumlah halaman|penerbit|kategori|cover|".PHP_EOL,'a');
	}
	$load = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$kode_buku = $_POST['kode_buku'];
	$judul_buku = $_POST['judul_buku'];
	$pengarang = $_POST['pengarang'];
	$tahun_terbit = $_POST['tahun_terbit'];
	$jml_halaman = $_POST['jml_halaman'];
	$penerbit = $_POST['penerbit'];
	$kategori = $_POST['kategori'];
	$cover_url = $_POST['cover_url'];
    $cover_file = $_POST['cover_file'];
    if(empty($cover_file)){
	    simpan(DB,"$kode_buku|$judul_buku|$pengarang|$tahun_terbit|$jml_halaman|$penerbit|$kategori|$cover_url|".PHP_EOL,'a');
    }
    if(empty($cover_url)){
        simpan(DB,"$kode_buku|$judul_buku|$pengarang|$tahun_terbit|$jml_halaman|$penerbit|$kategori|$cover_file|".PHP_EOL,'a');
    }
    echo "Tambah data buku berhasil";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
</head>
<body>
	<header>
        <h2>DATA BUKU PERPUSTAKAAN</h2>
    </header>
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="icon">
                            <i class="fa fa-house"></i>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="tampil.php">
                        <span class="icon">
                            <i class="fa-solid fa-database"></i>
                        </span>
                        <span class="title">Tampil Data</span>
                    </a>
                </li>
                <li>
                    <a href="tambah.php">
                        <span class="icon">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                        <span class="title">Tambah Data</span>
                    </a>
                </li>
                <li>
                    <a href="ubah.php">
                        <span class="icon">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </span>
                        <span class="title">Ubah Data</span>
                    </a>
                </li>
                <li>
                    <a href="hapus.php">
                        <span class="icon">
                            <i class="fa-solid fa-trash"></i>
                        </span>
                        <span class="title">Hapus Data</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content"> 
            <main>
                <header>
                    <h3>Tambah Data</h3>
                </header>
                <form action="" method="POST">
                    <fieldset>
                        <legend>Form Data Buku</legend>
                        <table>
                            <tr>
                                <td>Kode Buku</td>
                                <td> : </td>
                                <td><input type="text" name="kode_buku" required></td>
                            </tr>
                            <tr>
                                <td>Judul Buku</td>
                                <td> : </td>
                                <td><input type="text" name="judul_buku" required></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td> : </td>
                                <td><input type="text" name="pengarang" required></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td> : </td>
                                <td><input type="text" name="tahun_terbit" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Halaman</td>
                                <td> : </td>
                                <td><input type="text" name="jml_halaman" required></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td> : </td>
                                <td><input type="text" name="penerbit" required></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td> : </td>
                                <td><input type="text" name="kategori" required></td>
                            </tr>
                        </table>
                        <table>
                            <tr><b>Pilih salah satu cara di bawah untuk input cover</b></tr>
                            <tr>
                                <td>Cover (masukkan url dari internet)</td>
                                <td> : </td>
                                <td><input type="url" name="cover_url" ></td>
                            </tr>
                            <tr>
                                <td>Cover (pilih file .jpg atau .jpeg atau .png)</td>
                                <td> : </td>
                                <td><input type="file" name="cover_file" accept="image/*""></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Simpan" name="proses">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                
</body>
</html>