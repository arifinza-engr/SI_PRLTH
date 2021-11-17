<?php

$koneksi = mysqli_connect("localhost","root","","pkl_sipandu"); 
$data_ath = $_SESSION["ses_id"];

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_kk WHERE no_kk='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

?>

<div class="panel panel-info">
    <div class="panel-heading">
        <b>Tambah Anggota Kartu Keluarga</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                <div class="form-group">
                        <label>No. KK</label>
                        <select name="no_kk" id="no_kk" class="form-control" required>
                        <option value=""></option>
                        <?php
                        // ambil data dari database
                        $query = "select * from tb_kk where ath_kk='$data_ath'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $row['no_kk'] ?>"><?php echo $row['no_kk'] ?> - <?php echo $row['nama_kk'] ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>

                <div class="form-group">
                        <label>NIK - Nama</label>
                        <select name="no_pdd" id="no_pdd" class="form-control" required>
                        <option value=""></option>
                        <?php
                        // ambil data dari database
                        $query = "select * from tb_penduduk where st_ada='ada' and ath_penduduk='$data_ath'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $row['no_pdd'] ?>"><?php echo $row['nik'] ?> - <?php echo $row['nama_penduduk'] ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status Dalam Keluarga</label>
                        <input class="form-control" name="status_kk" />
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
        $sql_simpan = "INSERT INTO tb_detail_kk (no_pdd,no_kk,status_kk) VALUES (
        '".$_POST['no_pdd']."',
        '".$_POST['no_kk']."',
        '".$_POST['status_kk']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        if ($query_simpan) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_kk_detail&kode=".$_POST['no_kk']."'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_kk_detail&kode=".$_POST['no_kk']."'>";
        }
        //selesai proses simpan data
        }
    
?>

