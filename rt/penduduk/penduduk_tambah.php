<?php
$koneksi = mysqli_connect("localhost","root","","pkl_sipandu");

$data_ath = $_SESSION["ses_id"];

// kode auto
$carikode = mysqli_query($koneksi,"SELECT no_pdd FROM tb_penduduk order by no_pdd desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['no_pdd'];
$urut = substr($kode, 1, 6);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
    $format = "P"."00000".$tambah;
    }else if (strlen($tambah) == 2){
    $format = "P"."0000".$tambah;
        }else if (strlen($tambah) == 3){
        $format = "P"."000".$tambah;
            }else if (strlen($tambah) == 4){
            $format = "P"."00".$tambah;
                }else if (strlen($tambah) == 5){
                    $format = "P"."0".$tambah;
                        }else (strlen($tambah) == 6){
                            $format = "P".$tambah
                        }

?>



<div class="panel panel-info">
<div class="panel-heading">
<b>Tambah Penduduk</b>
</div>
<div class="panel-body">
            <div class="row">
            <div class="col-md-6">
            <form method="POST">
            <div class="form-group">
                    
                    <label>No Penduduk</label>
                        <input class="form-control" name="no_pdd" value="<?php echo $format; ?>" readonly required/>
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control" name="nik" placeholder="Masukkan NIK"/>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" name="nama_penduduk" placeholder="Masukkan Nama Penduduk"/>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tempat_lahir_pd" placeholder="Masukkan Tempat Lahir Penduduk"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir_pd" />
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
                        <input class="form-control" name="kerja_penduduk" placeholder="Masukkan Pekerjaan Penduduk"/>
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
                        <input class="form-control" name="gol_darah_pd" placeholder="Masukkan Gol Darah Penduduk"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat (Desa)</label>
                        <input class="form-control" name="alamat_penduduk" placeholder="Masukkan Desa"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat (RT)</label>
                        <input class="form-control" name="rt_penduduk" placeholder="Masukkan RT"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat (RW)</label>
                        <input class="form-control" name="rw_penduduk" placeholder="Masukkan RW"/>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input class="form-control" name="kecamatan_penduduk" placeholder="Masukkan Kecamatan"/>
                    </div>

                    <br>

                    <div>
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-success" >
                    </div>
                                                               
        </form>
        </div>
                                        


<?php

    if (isset ($_POST['Simpan'])){
        //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_penduduk (no_pdd,nik,nama_penduduk,tempat_lahir_pd,tgl_lahir_pd,jekel_penduduk,agama_penduduk,kerja_penduduk,pendidikan_penduduk,
        kwarganegaraan,kawin_penduduk,gol_darah_pd,alamat_penduduk,rt_penduduk,rw_penduduk,kecamatan_penduduk,ath_penduduk) VALUES (
        '".$_POST['no_pdd']."',
        '".$_POST['nik']."',
        '".$_POST['nama_penduduk']."',
        '".$_POST['tempat_lahir_pd']."',
        '".$_POST['tgl_lahir_pd']."',
        '".$_POST['jekel_penduduk']."',
        '".$_POST['agama_penduduk']."',
        '".$_POST['kerja_penduduk']."',
        '".$_POST['pendidikan_penduduk']."',
        '".$_POST['kwarganegaraan']."',
        '".$_POST['kawin_penduduk']."',
        '".$_POST['gol_darah_pd']."',
        '".$_POST['alamat_penduduk']."',
        '".$_POST['rt_penduduk']."',
        '".$_POST['rw_penduduk']."',
        '".$_POST['kecamatan_penduduk']."',
        '".$data_ath."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        if ($query_simpan) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_penduduk_tampil'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_penduduk_tampil'>";
        }
        //selesai proses simpan data
        }
    

?>