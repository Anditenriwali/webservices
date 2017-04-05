<?php
include "koneksi.php";
if( !$xml = simplexml_load_file('barang.xml')){
    echo "load XML failed !";
} else {
    echo '<h1>Data Anda</h1>';
        foreach ($xml as $barang) {
            $kode = $barang ->kode;
            $satuan = $barang ->satuan;
            $harga = $barang ->harga;
            $pt_asal = $barang ->asal ->pt_asal;
            $kdwil_asal = $barang ->asal ->kdwil_asal;
            $pt_tujuan = $barang ->tujuan ->pt_tujuan;
            $kdwil_tujuan = $barang ->tujuan ->kdwil_tujuan;

            echo '<h3>Barang<h3>';
            echo 'Kode : '.$kode.'<br />';
            echo 'Satuan : '.$satuan.'<br />';
            echo 'Harga : '.$harga.'<br />';
            echo '<h4>Asal<h4>';
            echo 'PT(asal)  : '.$pt_asal.'<br />';
            echo 'Kodewil : '.$kdwil_asal.'<br />';
            echo '<h4>Tujuan<h4>';
            echo 'PT(tujuan) : '.$pt_tujuan.'<br />';
            echo 'Kodewil : '.$kdwil_tujuan.'<br />';
            echo '<br>';


            $query = mysql_query("insert into barang values('','$kode','$satuan','$harga','$pt_asal $kdwil_asal','$pt_tujuan $kdwil_tujuan')");
        }
            if ($query){
                echo '<h2>Data Anda Berhasil Disimpan</h2>';
            } else {
                echo '<h2>Data Anda Gagal Disimpan</h2>'.mysql_error();
            }
}
?>