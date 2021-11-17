<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select d.no_datang , d.tgl_datang, d.alamat_asal, d.gambar_ktp, d.gambar_ket_pindah, p.no_pdd, p.nik, p.nama_penduduk, p.tempat_lahir_pd, p.tgl_lahir_pd, p.jekel_penduduk from
        tb_datang d inner join tb_penduduk p ON d.no_pdd = p.no_pdd WHERE d.no_datang='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <b>Detail Pindah Masuk : <?php echo $data_cek['nama_penduduk'];?></b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    
                                    <tbody>
                                        <tr>
                                            <td>No. Pendatang</td>                                          
                                            <td width="80%">: <?php echo $data_cek['no_datang'];?></td>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td>: <?php echo $data_cek['nik'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pendatang</td>
                                            <td>: <?php echo $data_cek['nama_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir Pendatang</td>
                                            <td>: <?php echo $data_cek['tempat_lahir_pd'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Lahir Pendatang</td>
                                            <td>: <?php  $tgl = $data_cek['tgl_lahir_pd']; echo date("d - F - Y", strtotime($tgl))?></td>
                                        </tr>
                                        <tr>
                                            <td>Jekel Pendatang</td>
                                            <td>: <?php echo $data_cek['jekel_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Datang</td>
                                            <td>: <?php  $tgl1 = $data_cek['tgl_datang']; echo date("d - F - Y", strtotime($tgl1))?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Asal</td>
                                            <td>: <?php echo $data_cek['alamat_asal'];?></td>
                                        </tr>
                                        
                                        

                                    </tbody>

                                </table>

                                

                                       
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <b>Berkas Pindah Masuk</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>KTP</th>
                                            <th>Surat Ket. Pindah</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td align="left"><img src="img/<?php echo $data_cek['gambar_ktp']; ?>" width="450px" /></td>
                                        <td align="left"><img src="img/<?php echo $data_cek['gambar_ket_pindah']; ?>" width="450px" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

           