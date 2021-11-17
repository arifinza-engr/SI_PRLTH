<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_penduduk WHERE no_pdd='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="panel panel-info">
<div class="panel-heading">
<b>Ubah Data Penduduk</b>
</div>
<div class="panel-body">
            <div class="row">
            <div class="col-md-6">
            <form method="POST">
            <div class="form-group">
                    <label>No Penduduk</label>
                    <input class="form-control" name="no_pdd" value="<?php echo $data_cek['no_pdd']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control" name="nik" value="<?php echo $data_cek['nik']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" name="nama_penduduk" value="<?php echo $data_cek['nama_penduduk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tempat_lahir_pd" value="<?php echo $data_cek['tempat_lahir_pd']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir_pd" value="<?php echo $data_cek['tgl_lahir_pd']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jekel_penduduk" class="form-control">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                        
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Agama</label>
                        <select name="agama_penduduk" class="form-control">
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Katolik</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input class="form-control" name="kerja_penduduk" value="<?php echo $data_cek['kerja_penduduk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Pendidikan</label>
                        <select name="pendidikan_penduduk" class="form-control">
                        <option>SD</option>
                        <option>SMP</option>
                        <option>SMA</option>
                        <option>S-1</option>
                        <option>S-2</option>
                        
                    </select>
                    </div>
</div>


        <div class="col-md-6">
                    <div class="form-group">
                        <label>Kwarganegaraan</label>
                        <select name="kwarganegaraan" class="form-control">
                        <option>WNI</option>
                        <option>WNA</option>
                        
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Status Perkawinan</label>
                        <select name="kawin_penduduk" class="form-control">
                        <option>Kawin</option>
                        <option>Belum Kawin</option>
                        
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Golongan Darah</label>
                        <input class="form-control" name="gol_darah_pd" value="<?php echo $data_cek['gol_darah_pd']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat (Desa)</label>
                        <input class="form-control" name="alamat_penduduk" value="<?php echo $data_cek['alamat_penduduk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat (RT)</label>
                        <input class="form-control" name="rt_penduduk" value="<?php echo $data_cek['rt_penduduk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat (RW)</label>
                        <input class="form-control" name="rw_penduduk" value="<?php echo $data_cek['rw_penduduk']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input class="form-control" name="kecamatan_penduduk" value="<?php echo $data_cek['kecamatan_penduduk']; ?>"/>
                    </div>
                    <br>

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="btn btn-success" >
                        <a href="?halaman=rt_penduduk_tampil" title="Kembali" class="btn btn-default">Batal</a>
                    </div>
                                                               
        </form>
        </div>


<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE tb_penduduk SET
        nik='".$_POST['nik']."',
        nama_penduduk='".$_POST['nama_penduduk']."',
        tempat_lahir_pd='".$_POST['tempat_lahir_pd']."',
        tgl_lahir_pd='".$_POST['tgl_lahir_pd']."',
        jekel_penduduk='".$_POST['jekel_penduduk']."',
        agama_penduduk='".$_POST['agama_penduduk']."',
        kerja_penduduk='".$_POST['kerja_penduduk']."',
        pendidikan_penduduk='".$_POST['pendidikan_penduduk']."',
        kwarganegaraan='".$_POST['kwarganegaraan']."',
        kawin_penduduk='".$_POST['kawin_penduduk']."',
        gol_darah_pd='".$_POST['gol_darah_pd']."',
        alamat_penduduk='".$_POST['alamat_penduduk']."',
        rt_penduduk='".$_POST['rt_penduduk']."',
        rw_penduduk='".$_POST['rw_penduduk']."', 
        kecamatan_penduduk='".$_POST['kecamatan_penduduk']."'
        WHERE no_pdd='".$_POST['no_pdd']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_penduduk_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_penduduk_tampil'>";
    }

    //selesai proses ubah
}

?>