<?php

    require "koneksidb.php";

    if ($_POST['Submit'] == "Submit") {
        $namatol            = $_POST['nama_tol'];
        $tarif          = $_POST['bayar'];
        
		
		$login = mysqli_query($koneksi,"select * from tb_tol where nama_tol='$namatol'");

		// menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($login);
		 
		// cek apakah tol di temukan pada database
		if($cek > 0){
			header("location: tambah-tol.php?pesan=gagal");

		}else{
			//Masukan data ke Table
        $input = "INSERT INTO tb_tol (nama_tol, bayar) VALUES ('" . $namatol . "', '" . $tarif . "')";
        $koneksi->query($input);

        header("Location: tambah-tol.php?pesan=berhasil");
		}
        
    }

?>