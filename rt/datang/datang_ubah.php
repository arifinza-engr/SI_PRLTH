<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select d.no_datang , d.tgl_datang, d.alamat_asal, p.no_pdd, p.nik, p.nama_penduduk, p.tempat_lahir_pd, p.tgl_lahir_pd from
        tb_datang d inner join tb_penduduk p ON d.no_pdd = p.no_pdd WHERE d.no_datang='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Ubah Pindah Masuk</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <div class="form-group">
                        <label>No. Pendatang</label>
                        <input class="form-control" name="no_datang" value="<?php echo $data_cek['no_datang']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <input type='hidden' class="form-control" name="no_pdd" value="<?php echo $data_cek['no_pdd']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control" name="nik" value="<?php echo $data_cek['nik'];?>"/>
                    </div>

                    <div class="form-group">
                        <label>Nama Pendatang</label>
                        <input class="form-control" name="nama_penduduk" value="<?php echo $data_cek['nama_penduduk'];?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tempat_lahir_pd" value="<?php echo $data_cek['tempat_lahir_pd']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kelahiran</label>
                        <input type='date' class="form-control" name="tgl_lahir_pd" value="<?php echo $data_cek['tgl_lahir_pd']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jekel_penduduk" class="form-control">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                        
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kedatangan</label>
                        <input type="date" class="form-control" name="tgl_datang" value="<?php echo $data_cek['tgl_datang']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Asal</label>
                        <input class="form-control" name="alamat_asal" value="<?php echo $data_cek['alamat_asal']; ?>"/>
                    </div>

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="btn btn-success" >
                        <a href="?halaman=rt_datang_tampil" title="Kembali" class="btn btn-default">Batal</a>
                    </div>

            </div>
            </form>
        </div>

    </div>
</div>
</div>



<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE tb_penduduk SET
        nama_penduduk='".$_POST['nama_penduduk']."',
        tempat_lahir_pd='".$_POST['tempat_lahir_pd']."',
        tgl_lahir_pd='".$_POST['tgl_lahir_pd']."',
        jekel_penduduk='".$_POST['jekel_penduduk']."'
        WHERE no_pdd='".$_POST['no_pdd']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    $sql_ubah_d = "UPDATE tb_datang SET
    tgl_datang='".$_POST['tgl_datang']."',
    alamat_asal='".$_POST['alamat_asal']."'
    WHERE no_datang='".$_POST['no_datang']."'";
    $query_ubah_d = mysqli_query($koneksi, $sql_ubah_d);

    if ($query_ubah && $query_ubah_d) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_datang_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_datang_tampil'>";
    }

    //selesai proses ubah
}

?>
