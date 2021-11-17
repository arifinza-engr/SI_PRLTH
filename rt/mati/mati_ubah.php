<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select m.no_mati ,m.umur_mati, m.tgl_mati, p.nama_penduduk, m.sebab_mati from tb_mati
        m inner join tb_penduduk p ON m.no_pdd = p.no_pdd where no_mati='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Ubah Kematian</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <div class="form-group">
                        <label>No. Kematian</label>
                        <input class="form-control" name="no_mati" value="<?php echo $data_cek['no_mati']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama_penduduk" value="<?php echo $data_cek['nama_penduduk'];?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Umur</label>
                        <input class="form-control" name="umur_mati" value="<?php echo $data_cek['umur_mati']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kematian</label>
                        <input type="date" class="form-control" name="tgl_mati" value="<?php echo $data_cek['tgl_mati']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Sebab Kematian</label>
                        <input class="form-control" name="sebab_mati" value="<?php echo $data_cek['sebab_mati']; ?>"/>
                    </div>

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="btn btn-success" >
                        <a href="?halaman=rt_mati_tampil" title="Kembali" class="btn btn-default">Batal</a>
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
    $sql_ubah = "UPDATE tb_mati SET
        umur_mati='".$_POST['umur_mati']."',
        tgl_mati='".$_POST['tgl_mati']."',
        sebab_mati='".$_POST['sebab_mati']."'
        WHERE no_mati='".$_POST['no_mati']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_mati_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_mati_tampil'>";
    }

    //selesai proses ubah
}

?>