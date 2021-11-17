<?php
if(isset($_GET['kode'])){
    $sql_cek = "select * from tb_datang where no_datang='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

?>


<?php
            $gbr_ktp= $data_cek['gambar_ktp'];
                if (file_exists("img/$gbr_ktp")){
                    unlink("img/$gbr_ktp");
                    }

            $gbr_ket= $data_cek['gambar_ket_pindah'];
                if (file_exists("img/$gbr_ket")){
                    unlink("img/$gbr_ket");
                    }


            $sql_hapus = "DELETE tb_datang, tb_penduduk from tb_datang inner join tb_penduduk
            on tb_datang.no_pdd = tb_penduduk.no_pdd WHERE no_datang='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>alert('Hapus Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_datang_proses'>";
            }else{
                echo "<script>alert('Hapus Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_datang_proses'>";
            }
        

?>