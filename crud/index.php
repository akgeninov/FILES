<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
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
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <span class="fa-solid fa-book"></span>
                        </div>
                        <div>
                            <?php
                                $nama_file = "data_buku.txt";
                                $tampil = file($nama_file);
                                $jml = count($tampil);
                            ?>
                            <h2><?php echo $jml; ?></h2>
                            <small>Buku</small>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    
</body>
</html>