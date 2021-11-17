<?php
$koneksi = mysqli_connect("localhost","root","","pkl_sipandu");

$data_ath = $_SESSION["ses_id"];
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <b>Tambah Kartu Keluarga</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <div class="form-group">
                        <label>No. KK</label>
                        <input class="form-control" name="no_kk" placeholder="Masukkan Nomor KK"/>
                    </div>

                    <div class="form-group">
                        <label>Nama KK</label>
                        <input class="form-control" name="nama_kk" placeholder="Masukkan Nama KK"/>
                    </div>

                    <div class="form-group">
                        <label>Desa</label>
                        <input class="form-control" name="desa_kk" placeholder="Masukkan Desa"/>
                    </div>

                    <div class="form-group">
                        <label>RT</label>
                        <input class="form-control" name="rt_kk" placeholder="Masukkan RT"/>
                    </div>

                    <div class="form-group">
                        <label>RW</label>
                        <input class="form-control" name="rw_kk" placeholder="Masukkan RW"/>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input class="form-control" name="kec_kk" placeholder="Masukkan Kecamatan"/>
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <input class="form-control" name="prov_kk" placeholder="Masukkan Provinsi"/>
                    </div>

                    

                    <div>
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-success" >
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>
</div>


<?php

    if (isset ($_POST['Simpan'])){
        //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_kk (no_kk,nama_kk,desa_kk,rt_kk,rw_kk,kec_kk,prov_kk,ath_kk) VALUES (
        '".$_POST['no_kk']."',
        '".$_POST['nama_kk']."',
        '".$_POST['desa_kk']."',
        '".$_POST['rt_kk']."',
        '".$_POST['rw_kk']."',
        '".$_POST['kec_kk']."',
        '".$_POST['prov_kk']."',
        '".$data_ath."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        if ($query_simpan) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_kk_tampil'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_kk_tampil'>";
        }
        //selesai proses simpan data
        }
    

?>