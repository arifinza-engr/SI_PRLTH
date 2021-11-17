<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select m.no_pindah , m.tgl_pindah, p.nama_penduduk, p.nik, m.keterangan, m.gambar_ktp, m.gambar_kk from
        tb_pindah m inner join tb_penduduk p ON m.no_pdd = p.no_pdd where no_pindah='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <b>Detail Pindah Keluar : <?php echo $data_cek['nama_penduduk'];?></b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    
                                    <tbody>
                                        <tr>
                                            <td>No. Pindah</td>                                          
                                            <td width="80%">: <?php echo $data_cek['no_pindah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td>: <?php echo $data_cek['nik'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pindah</td>
                                            <td>: <?php echo $data_cek['nama_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pindah</td>
                                            <td>: <?php  $tgl1 = $data_cek['tgl_pindah']; echo date("d - F - Y", strtotime($tgl1))?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>: <?php echo $data_cek['keterangan'];?></td>
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
                        <b>Berkas Pindah Keluar</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>KTP</th>
                                            <th>KK</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td align="left"><img src="img/<?php echo $data_cek['gambar_ktp']; ?>" width="450px" /></td>
                                        <td align="left"><img src="img/<?php echo $data_cek['gambar_kk']; ?>" width="450px" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

           