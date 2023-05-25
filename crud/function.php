<?php 

function simpan($id_file,$id_content,$kode){
	if(!file_exists($id_file)) fopen($id_file,"w");
	$buka_file = fopen($id_file,$kode) or die ("Gagal membuka file $id_file");
	fputs($buka_file,$id_content);
	fclose($buka_file) or die ("Gagal menutup file!");
}

?>