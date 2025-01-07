<?php

    require "koneksidb.php";

    if ($_POST['Submit'] == "Submit") {
        $rfid            = $_POST['rfid'];
		$saldo         	 = $_POST['saldo'];
		$saldoawal = query("SELECT * FROM tb_daftarrfid WHERE tb_daftarrfid.rfid='$rfid'" )[0];
		$awal = $saldoawal ['saldo'];
		$topup = $awal + $saldo;
        //Masukan data ke Table
		
        $input = "UPDATE tb_daftarrfid SET saldo='$topup' WHERE tb_daftarrfid.rfid='$rfid'";
        $koneksi->query($input);

	   
		$sqlsave = "INSERT INTO tb_topup (tanggal, rfid, nama, 
											alamat, telepon, saldo_awal, 
											topup, saldo_akhir) 
					VALUES 				('" . $tgl . "', '" . $rfid ."', '" . $saldoawal['nama']."', 
										'" . $saldoawal['alamat'] ."','" . $saldoawal['telepon'] ."','" . $awal . "', 
										'" . $saldo . "', '" . $topup . "')";
		$koneksi->query($sqlsave);
        header("Location: tambah-saldo.php?pesan=berhasil");
    }

?>