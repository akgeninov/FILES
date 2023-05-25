<?php 
	require('function.php');

	if(!empty($_GET['kode'])){
		dell($_GET['kode']);
		header('location:hapus.php');
		
	}else{
		header('location:hapus.php');
	}

	function dell($kode){
		$nama_file = 'data_buku.txt';
		$load = @file($nama_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach ($load as $data){
			$data_buku = explode('|',$data);
			$kode_buku = $data_buku[0];
			if($kode_buku==$kode){
				$dell = str_replace($data.PHP_EOL,'',file_get_contents($nama_file));
				simpan($nama_file,$dell,'w');
				break;
			}else{
				$data = null;
			}
			
		}
		
	return $data;
	}
?>