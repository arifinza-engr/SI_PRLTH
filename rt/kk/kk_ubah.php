<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kk WHERE no_kk='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Ubah Kartu Keluarga</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <div class="form-group">
                        <label>No. KK</label>
                        <input class="form-control" name="no_kk" value="<?php echo $data_cek['no_kk']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Nama lengkap</label>
                        <input class="form-control" name="nama_kk" value="<?php echo $data_cek['nama_kk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Desa</label>
                        <input class="form-control" name="desa_kk" value="<?php echo $data_cek['desa_kk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>RT</label>
                        <input class="form-control" name="rt_kk" value="<?php echo $data_cek['rt_kk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>RW</label>
                        <input class="form-control" name="rw_kk" value="<?php echo $data_cek['rw_kk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input class="form-control" name="kec_kk" value="<?php echo $data_cek['kec_kk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <input class="form-control" name="prov_kk" value="<?php echo $data_cek['prov_kk']; ?>"/>
                    </div>

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="btn btn-success" >
                        <a href="?halaman=rt_kk_tampil" title="Kembali" class="btn btn-default">Batal</a>
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
    $sql_ubah = "UPDATE tb_kk SET
        nama_kk='".$_POST['nama_kk']."',
        desa_kk='".$_POST['desa_kk']."',
        rt_kk='".$_POST['rt_kk']."',
        rw_kk='".$_POST['rw_kk']."',
        kec_kk='".$_POST['kec_kk']."',
        prov_kk='".$_POST['prov_kk']."'
        WHERE no_kk='".$_POST['no_kk']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_kk_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_kk_tampil'>";
    }

    //selesai proses ubah
}

?>