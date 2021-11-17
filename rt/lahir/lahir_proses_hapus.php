<?php
if(isset($_GET['kode'])){
    $sql_cek = "select * from tb_lahir where no_lahir='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
            $gbr_h= $data_cek['gambar_lahir'];

            if (file_exists("img/$gbr_h")){
                unlink("img/$gbr_h");
                }

            $sql_hapus = "DELETE tb_lahir, tb_penduduk from tb_lahir inner join tb_penduduk
            on tb_lahir.no_pdd = tb_penduduk.no_pdd WHERE no_lahir='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>alert('Hapus Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_lahir_proses'>";
            }else{
                echo "<script>alert('Hapus Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_lahir_proses'>";
            }
        
?>