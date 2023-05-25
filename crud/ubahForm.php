<?php 
require('function.php');
if(isset($_POST['proses'])){
	define('DB','data_buku.txt');
	if(!file_exists(DB)){
		simpan(DB,'a');
	}
	$kode = $_GET['kode'];

	$kode = $_POST['kode_buku'];
	$judul = $_POST['judul_buku'];
	$pengarang = $_POST['pengarang'];
	$thn_terbit = $_POST['tahun_terbit'];
	$jml_halaman = $_POST['jml_halaman'];
	$penerbit = $_POST['penerbit'];
	$kategori = $_POST['kategori'];
	$cover_url = $_POST['cover_url'];
    $cover_file = $_POST['cover_file'];
	$dataLast = edit($_GET['kode']);
    if(!empty($cover_url)){
        $content = str_replace($dataLast,"$kode|$judul|$pengarang|$thn_terbit|$jml_halaman|$penerbit|$kategori|$cover_url|",file_get_contents(DB));
    } else {
        $content = str_replace($dataLast,"$kode|$judul|$pengarang|$thn_terbit|$jml_halaman|$penerbit|$kategori|$cover_file|",file_get_contents(DB));
    }
    
	simpan(DB,$content,'w');
	
    header('location:ubah.php' );

    
}

if(!empty($_GET['kode'])){
	$data = edit($_GET['kode']);
	$data_buku = explode('|',$data);
	$kode = $data_buku[0];
	$judul = $data_buku[1];
	$pengarang = $data_buku[2];
	$thn_terbit = $data_buku[3];
	$jml_halaman = $data_buku[4];
	$penerbit = $data_buku[5];
	$kategori = $data_buku[6];
	$cover = $data_buku[7];
	
}

function edit($kode){
	$db = 'data_buku.txt';
	$load = @file($db, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($load as $data){
		$data_buku = explode('|',$data);
		$kode_buku = $data_buku[0];
		if($kode_buku==$kode){
			break;
		}else{
			$data = null;
		}
		
	}
	
return $data;
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
                                <td><input type="text" name="kode_buku" value="<?=$kode;?>" required></td>
                            </tr>
                            <tr>
                                <td>Judul Buku</td>
                                <td> : </td>
                                <td><input type="text" name="judul_buku" value="<?=$judul;?>" required></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td> : </td>
                                <td><input type="text" name="pengarang" value="<?=$pengarang;?>" required></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td> : </td>
                                <td><input type="text" name="tahun_terbit" value="<?=$thn_terbit;?>" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Halaman</td>
                                <td> : </td>
                                <td><input type="text" name="jml_halaman" value="<?=$jml_halaman;?>" required></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td> : </td>
                                <td><input type="text" name="penerbit" value="<?=$penerbit;?>" required></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td> : </td>
                                <td><input type="text" name="kategori" value="<?=$kategori;?>" required></td>
                            </tr>
                        </table>
                        <table>
                            <b>Pilih 1 cara upload cover(jika dengan cara upload maka hapus url jika ada)<b> 
                            <?php 
                                if(filter_var($cover, FILTER_VALIDATE_URL) == true){
                                    $cover_url = $cover;
                                    echo "
                                        <tr>
                                            <td>Cover (masukkan url dari internet)</td>
                                            <td> : </td>
                                            <td><input type='url' name='cover_url' value='$cover_url'></td>
                                        </tr>";
                            ?>
                                        <tr>
                                            <td>Cover (pilih file .jpg atau .jpeg atau .png)</td>
                                            <td> : </td>
                                            <td>
                                                <input type="file" name="cover_file" accept="image/jpg, image/png, image/jpeg" id="tombol_up_cover" style="display:none">
                                                <label for="tombol_up_cover" style="cursor:pointer; color:green; width:10px; border:1px solid;">Upload cover</label>
                                            </td>
                                            <td></td>
                                        </tr>
                            <?php
                                } else {
                                    $cover_file = $cover;
                                    echo "
                                        <tr>
                                            <td>Cover (masukkan url dari internet)</td>
                                            <td> : </td>
                                            <td><input type='url' name='cover_url'></td>
                                        </tr>";
                            ?>
                                    <tr>
                                        <td>Cover (pilih file)</td>
                                        <td> : </td>
                                        <td>
                                            <input type="file" name="cover_file" accept="image/jpg, image/png, image/jpeg" id="tombol_up_cover" style="display:none">
                                            <label for="tombol_up_cover" style="cursor:pointer; color:green; width:10px; border:1px solid;">Upload cover</label>
                                            <?php
                                                echo "nama file sebelumnya : <a href='$cover_file' target='$cover_file'>$cover_file</a>";
                                            ?>
                                        </td>
                                    </tr>
                                <td></td>
                            <?php
                                }
                            ?>
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