<?php
$koneksi = mysqli_connect("localhost","root","","pkl_sipandu"); 

$data_ath = $_SESSION["ses_id"];

// kode auto
$carikode = mysqli_query($koneksi,"SELECT no_pindah FROM tb_pindah order by no_pindah desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['no_pindah'];
$urut = substr($kode, 1, 6);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
    $format = "K"."00000".$tambah;
    }else if (strlen($tambah) == 2){
    $format = "K"."0000".$tambah;
        }else if (strlen($tambah) == 3){
        $format = "K"."000".$tambah;
            }else if (strlen($tambah) == 4){
            $format = "K"."00".$tambah;
                }else if (strlen($tambah) == 5){
                    $format = "K"."0".$tambah;
                        }else (strlen($tambah) == 6){
                            $format = "K".$tambah
                        }

?>

<div class="panel panel-info">
    <div class="panel-heading">
        <b>Tambah Pindah Keluar</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>No. Pindah</label>
                        <input class="form-control" name="no_pindah" value="<?php echo $format; ?>" readonly required/>
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
                        <label>Tanggal Pindah Keluar</label>
                        <input type='date' class="form-control" name="tgl_pindah" />
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" name="keterangan" placeholder="Masukkan Ket. Pindah"/>
                    </div>

                    <div class="form-group">
                        <label>Foto KTP</label>
                        <input class="form-control" type="file" name="gambar_ktp" />
                    </div>

                    <div class="form-group">
                        <label>Foto KK</label>
                        <input class="form-control" type="file" name="gambar_kk" />
                    </div>


                    <div>
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-success" >
                        <a href="?halaman=rt_pindah_proses" title="Kembali" class="btn btn-default">Batal</a>
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>
</div>


<?php


    $sumber = @$_FILES['gambar_ktp']['tmp_name'];
    $target = 'img/';
    $nama_gambar = @$_FILES['gambar_ktp']['name'];

    $dari = @$_FILES['gambar_kk']['tmp_name'];
    $ke = 'img/';
    $nama_gbr = @$_FILES['gambar_kk']['name'];


    if (isset ($_POST['Simpan'])){
        //mulai proses simpan data
        $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
        $lempar = move_uploaded_file($dari, $ke.$nama_gbr);
        
        $sql_simpan = "INSERT INTO tb_pindah (no_pindah,no_pdd,tgl_pindah,keterangan,ath_pindah, gambar_ktp, gambar_kk) VALUES (
        '".$_POST['no_pindah']."',
        '".$_POST['no_pdd']."',
        '".$_POST['tgl_pindah']."',
        '".$_POST['keterangan']."',
        '".$data_ath."',
        '".$nama_gambar."',
        '".$nama_gbr."')";
        
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        if ($query_simpan) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_pindah_proses'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_pindah_proses'>";
        }
        //selesai proses simpan data
        }
    

?>