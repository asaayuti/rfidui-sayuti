<?php

    require "koneksidb.php";

    if ($_POST['Submit'] == "Submit") {
        $username            = $_POST['username'];
        $password            = $_POST['password'];
		
		$login = mysqli_query($koneksi,"select * from tb_user where username='$username'");

		// menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($login);
		 
		// cek apakah username dan password di temukan pada database
		if($cek > 0){
			header("location: register.php?pesan=gagal");
		}
		else{
			$input = "INSERT INTO tb_user (username,password) VALUES ('" . $username . "', '" . $password . "')";
        $koneksi->query($input);

        header("Location: register.php?pesan=berhasil");
		}
        //Masukan data ke Table
        
    }

?>