<?php 
   
   require "koneksidb.php";

   $ambilrfid	 = $_GET["rfid"];
   $ambillokasi	 = $_GET["namatol"];
   //$ambilsaldo 	 = $_GET["saldo"];
   
   date_default_timezone_set('Asia/Jakarta');
   $tgl=date("Y-m-d G:i:s");
   
   	  	// $data = query("SELECT * FROM tabel_monitoring")[0];
		//UPDATE DATA REALTIME PADA TABEL tb_daftarrfid
		$sql      = "UPDATE tb_daftarrfid SET nama_tol='$ambillokasi' WHERE tb_daftarrfid.rfid='$ambilrfid'";
		$koneksi->query($sql);
		
		//$sql      = "UPDATE tb_daftarrfid SET saldo='$ambilsaldo' WHERE tb_daftarrfid.rfid='$ambilrfid'";
		//$koneksi->query($sql);
		
		//MENGAMBIL DATA HARGA TOL
		$tbtol = query("SELECT * FROM tb_tol WHERE tb_tol.nama_tol='$ambillokasi'" )[0];
		$bayar = $tbtol['bayar'];
		
		//mengambil saldo dari tb daftarrfid
		$tbtol2 = query("SELECT * FROM tb_daftarrfid WHERE tb_daftarrfid.rfid='$ambilrfid'" )[0];
		$bayar2 = $tbtol2['saldo'];
		
		
		//UPDATE DATA REALTIME PADA TABEL tb_monitoring
		$sql      = "UPDATE tb_monitoring SET tanggal	= '$tgl', rfid	= '$ambilrfid'";
		$koneksi->query($sql);

		// menyeleksi data user dengan username dan password yang sesuai
		$login = mysqli_query($koneksi,"select * from tb_tol where tb_tol.nama_tol='$ambillokasi'");
		// menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($login);

		
		//kondisi ketika saldo tidak cukup 
		if($bayar2 >= $bayar){
		$total = $bayar2 - $bayar;
		//echo $total;
		if($cek > 0){
		$sql      = "UPDATE tb_daftarrfid SET saldo='$total' WHERE tb_daftarrfid.rfid='$ambilrfid'";
		$koneksi->query($sql);
		
		//INSERT DATA REALTIME PADA TABEL tb_simpan  
		
		$sqlsave = "INSERT INTO tb_simpan (tanggal, rfid, nama, alamat, telepon, saldo_awal, bayar, saldo_akhir, nama_tol) VALUES ('" . $tgl . "', '" . $ambilrfid ."', '" . $tbtol2['nama'] ."', '" . $tbtol2['alamat'] ."','" . $tbtol2['telepon'] ."','" . $bayar2 . "', '" . $bayar . "', '" . $total . "', '" . $ambillokasi . "')";
		$koneksi->query($sqlsave);
		
		
		//MENJADIKAN JSON DATA
		//$response = query("SELECT * FROM tb_monitoring")[0];
		$response = query("SELECT * FROM tb_daftarrfid,tb_monitoring WHERE tb_daftarrfid.rfid='$ambilrfid'" )[0];
      	$result = json_encode($response);
     	echo $result;		
			}
		}
		else {
			header("location:dashboard.php?pesan=gagal");
		}


 ?>