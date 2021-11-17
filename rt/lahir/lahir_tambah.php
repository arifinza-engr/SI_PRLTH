<?php
$koneksi = mysqli_connect("localhost","root","","pkl_sipandu"); 

$data_ath = $_SESSION["ses_id"];

// kode auto
$carikode = mysqli_query($koneksi,"SELECT no_lahir FROM tb_lahir order by no_lahir desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['no_lahir'];
$urut = substr($kode, 1, 6);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
    $format = "L"."00000".$tambah;
    }else if (strlen($tambah) == 2){
    $format = "L"."0000".$tambah;
        }else if (strlen($tambah) == 3){
        $format = "L"."000".$tambah;
            }else if (strlen($tambah) == 4){
            $format = "L"."00".$tambah;
                }else if (strlen($tambah) == 5){
                    $format = "L"."0".$tambah;
                        }else (strlen($tambah) == 6){
                            $format = "L".$tambah
                        }

?>

<?php

// kode auto
$carikode = mysqli_query($koneksi,"SELECT no_pdd FROM tb_penduduk order by no_pdd desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['no_pdd'];
$urut = substr($kode, 1, 6);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
    $format2 = "P"."00000".$tambah;
    }else if (strlen($tambah) == 2){
    $format2 = "P"."0000".$tambah;
        }else if (strlen($tambah) == 3){
        $format2 = "P"."000".$tambah;
            }else if (strlen($tambah) == 4){
            $format2 = "P"."00".$tambah;
                }else if (strlen($tambah) == 5){
                    $format2 = "P"."0".$tambah;
                        }else (strlen($tambah) == 6){
                            $format2 = "P".$tambah
                        }

?>

<div class="panel panel-info">
    <div class="panel-heading">
        <b>Tambah Kelahiran</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>No. Kelahiran</label>
                        <input class="form-control" name="no_lahir" value="<?php echo $format; ?>" readonly required/>
                    </div>

                    <div class="form-group">
                        <input type='hidden' class="form-control" name="no_pdd" value="<?php echo $format2; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control" name="nik" placeholder="Masukkan NIK"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Kelahiran</label>
                        <input class="form-control" name="nama_penduduk" placeholder="Masukkan Nama Penduduk"/>
                    </div>

                    <div class="form-group">
                        <label>Tempat Kelahiran</label>
                        <input class="form-control" name="tempat_lahir_pd" placeholder="Masukkan Tempat lahir"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kelahiran</label>
                        <input type='date' class="form-control" name="tgl_lahir_pd" />
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jekel_penduduk" class="form-control">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                        
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Surat Ket. Lahir</label>
                        <input class="form-control" type="file" name="gambar_lahir" />
                    </div>

                    <div>
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-success" >
                        <a href="?halaman=rt_lahir_proses" title="Kembali" class="btn btn-default">Batal</a>
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>
</div>


<?php

    $sumber = @$_FILES['gambar_lahir']['tmp_name'];
    $target = 'img/';
    $nama_gambar = @$_FILES['gambar_lahir']['name'];

    if (isset ($_POST['Simpan'])){
        //mulai proses simpan data
        $sql_simpan_p = "INSERT INTO tb_penduduk (no_pdd,nik,nama_penduduk,tempat_lahir_pd,tgl_lahir_pd,jekel_penduduk,st_ada,ath_penduduk) VALUES (
            '".$_POST['no_pdd']."',
            '".$_POST['nik']."',
            '".$_POST['nama_penduduk']."',
            '".$_POST['tempat_lahir_pd']."',
            '".$_POST['tgl_lahir_pd']."',
            '".$_POST['jekel_penduduk']."',
            '"."tdk"."',
            '".$data_ath."')";
        $query_simpan_p = mysqli_query($koneksi, $sql_simpan_p);
        
        $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
        $sql_simpan_l = "INSERT INTO tb_lahir (no_lahir,no_pdd,ath_lahir,gambar_lahir) VALUES (
            '".$_POST['no_lahir']."',
            '".$_POST['no_pdd']."',
            '".$data_ath."',
            '".$nama_gambar."')";
        $query_simpan_l = mysqli_query($koneksi, $sql_simpan_l);

        if ($query_simpan_p && $query_simpan_l) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_lahir_proses'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=rt_lahir_proses'>";
        }
        //selesai proses simpan data
        }
    

?>