<?php

    require "koneksidb.php";

    if ($_POST['Submit'] == "Submit") {
        $rfid            = $_POST['rfid'];
        $nama            = $_POST['nama'];
        $alamat          = $_POST['alamat'];
        $telepon         = $_POST['telepon'];
		$saldo         	 = $_POST['saldo'];
		
		$datarfid = mysqli_query($koneksi,"SELECT rfid from tb_daftarrfid WHERE tb_daftarrfid.rfid='$rfid'");
		$cek = mysqli_num_rows($datarfid);
		if($cek > 0){
			header("Location: inputdata.php?pesan=gagal");
		}
		else {
        //Masukan data ke Table
        $input = "INSERT INTO tb_daftarrfid (rfid, nama, alamat, telepon, saldo) VALUES ('" . $rfid . "', '" . $nama . "', '" . $alamat . "', '" . $telepon . "', '" . $saldo . "')";
        $koneksi->query($input);

        header("Location: inputdata.php?pesan=berhasil");
    }
	}

?>