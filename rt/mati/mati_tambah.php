<?php
$koneksi = mysqli_connect("localhost","root","","pkl_sipandu"); 

$data_ath = $_SESSION["ses_id"];

// kode auto
$carikode = mysqli_query($koneksi,"SELECT no_mati FROM tb_mati order by no_mati desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['no_mati'];
$urut = substr($kode, 1, 6);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
    $format = "M"."00000".$tambah;
    }else if (strlen($tambah) == 2){
    $format = "M"."0000".$tambah;
        }else if (strlen($tambah) == 3){
        $format = "M"."000".$tambah;
            }else if (strlen($tambah) == 4){
            $format = "M"."00".$tambah;
                }else if (strlen($tambah) == 5){
                    $format = "M"."0".$tambah;
                        }else (strlen($tambah) == 6){
                            $format = "M".$tambah
                        }

?>

<div class="panel panel-info">
    <div class="panel-heading">
        <b>Tambah Kematian</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>No. Kematian</label>
                        <input class="form-control" name="no_mati" value="<?php echo $format; ?>" readonly required/>
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
                        <label>Umur</label>
                        <input class="form-control" name="umur_mati" placeholder="Masukkan Umur"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kematian</label>
                        <input type='date' class="form-control" name="tgl_mati" />
                    </div>

                    <div class="form-group">
                        <label>Sebab Kematian</label>
                        <input class="form-control" name="sebab_mati" placeholder="Masukkan Sebab Kematian"/>
                    </div>

                    <div class="form-group">
                        <label>Surat Ket. Kematian</label>
                        <input class="form-control" type="file" name="gambar_mati" />
                    </div>

                    <div>
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-success" >
                        <a href="?halaman=rt_mati_proses" title="Kembali" class="btn btn-default">Batal</a>
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>
</div>


<?php

    $sumber = @$_FILES['gambar_mati']['tmp_name'];
    $target = 'img/';
    $nama_gambar = @$_FILES['gambar_mati']['name'];

    if (isset ($_POST['Simpan'])){
        //mulai proses simpan data

        $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
        $sql_simpan = "INSERT INTO tb_mati (no_mati,no_pdd,umur_mati,tgl_mati,sebab_mati,ath_mati,gambar_mati) VALUES (
        '".$_POST['no_mati']."',
        '".$_POST['no_pdd']."',
        '".$_POST['umur_mati']."',
        '".$_POST['tgl_mati']."',
        '".$_POST['sebab_mati']."',
        '".$data_ath."',
        '".$nama_gambar."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        if ($query_simpan) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_mati_proses'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_mati_proses'>";
        }
        //selesai proses simpan data
        }
    

?>