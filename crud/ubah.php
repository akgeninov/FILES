

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
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
                    <h3>Ubah Data</h3>
                </header>
                <div class="tabelHasil">
                    <table border=3>
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No.</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Jumlah Halaman</th>
                                <th>Penerbit</th>
                                <th>Kategori</th>
                                <th>Cover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- tampil -->
                            <?php
                                require('function.php');
                                define('DB','data_buku.txt');
                                if(!file_exists(DB)){
                                    simpan(DB, 'a');
                                }
                                $load = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                $no = 1;
                                foreach($load as $data){
                                    $data_buku = explode('|',$data);
                                    $jml_index = count($data_buku);
                                    $last_index = $jml_index-2;
                                    echo "<tr>";
                                        echo    "<td>
                                                    <a href='ubahForm.php?kode=$data_buku[0]'>Ubah</a>
                                                </td>";
                                        echo    "<td>$no</td>";
                                                for($i = 0; $i < $jml_index-2; $i++){
                                                    echo "<td>$data_buku[$i]</td>";
                                                }
                                        echo    "<td>
                                                    <a href='$data_buku[$last_index]' target='$data_buku[$last_index]'>
                                                        $data_buku[$last_index]
                                                    </a>
                                                </td>";
                                    echo "</tr>";
                            ?>
                            <?php 
                                        $no++;
                                    }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
</body>
</html>
