<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_penduduk WHERE no_pdd='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>alert('Hapus Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_penduduk_tampil'>";
            }else{
                echo "<script>alert('Hapus Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_penduduk_tampil'>";
            }
        }

?>