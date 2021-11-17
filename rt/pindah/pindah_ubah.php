<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select m.no_pindah , m.tgl_pindah, p.nama_penduduk, m.keterangan from tb_pindah
        m inner join tb_penduduk p ON m.no_pdd = p.no_pdd where no_pindah='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Ubah Kepindahan</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <div class="form-group">
                        <label>No. Pindah</label>
                        <input class="form-control" name="no_pindah" value="<?php echo $data_cek['no_pindah']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama_penduduk" value="<?php echo $data_cek['nama_penduduk'];?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pindah</label>
                        <input type="date" class="form-control" name="tgl_pindah" value="<?php echo $data_cek['tgl_pindah']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"/>
                    </div>

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="btn btn-success" >
                        <a href="?halaman=rt_pindah_tampil" title="Kembali" class="btn btn-default">Batal</a>
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
    $sql_ubah = "UPDATE tb_pindah SET
        tgl_pindah='".$_POST['tgl_pindah']."',
        keterangan='".$_POST['keterangan']."'
        WHERE no_pindah='".$_POST['no_pindah']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_pindah_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_pindah_tampil'>";
    }

    //selesai proses ubah
}

?>