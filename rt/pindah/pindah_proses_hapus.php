<?php
if(isset($_GET['kode'])){
    $sql_cek = "select * from tb_pindah where no_pindah='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

?>


<?php

$gbr_ktp= $data_cek['gambar_ktp'];
if (file_exists("img/$gbr_ktp")){
    unlink("img/$gbr_ktp");
    }

$gbr_kk= $data_cek['gambar_kk'];
if (file_exists("img/$gbr_kk")){
    unlink("img/$gbr_kk");
    }


if(isset($_GET['kode'])){
            $sql_hapus = "DELETE tb_pindah, tb_penduduk from tb_pindah inner join tb_penduduk
            on tb_pindah.no_pdd = tb_penduduk.no_pdd WHERE no_pindah='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>alert('Hapus Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_pindah_proses'>";
            }else{
                echo "<script>alert('Hapus Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_pindah_proses'>";
            }
        }

?>