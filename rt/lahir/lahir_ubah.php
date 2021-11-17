<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select l.no_lahir, l.gambar_lahir, p.no_pdd, p.nama_penduduk, p.tempat_lahir_pd, p.tgl_lahir_pd from
        tb_lahir l inner join tb_penduduk p ON l.no_pdd = p.no_pdd WHERE l.no_lahir='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }

    $gbr_u = $data_cek['gambar_lahir'];
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Ubah Kelahiran</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">

                
                    <div class="form-group">
                        <label>No. Kelahiran</label>
                        <input class="form-control" name="no_lahir" value="<?php echo $data_cek['no_lahir']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <input type='hidden' class="form-control" name="no_pdd" value="<?php echo $data_cek['no_pdd']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Nama Kelahiran</label>
                        <input class="form-control" name="nama_penduduk" value="<?php echo $data_cek['nama_penduduk']; ?>"/>
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

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="btn btn-success" >
                        <a href="?halaman=rt_lahir_tampil" title="Kembali" class="btn btn-default">Batal</a>
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

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_lahir_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_lahir_tampil'>";
    }

    //selesai proses ubah
}

?>