<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select l.no_lahir, l.gambar_lahir, p.no_pdd, p.nama_penduduk, p.tempat_lahir_pd, p.tgl_lahir_pd, p.jekel_penduduk from
        tb_lahir l inner join tb_penduduk p ON l.no_pdd = p.no_pdd WHERE l.no_lahir='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <b>Detail Kelahiran : <?php echo $data_cek['nama_penduduk'];?></b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    
                                    <tbody>
                                        <tr>
                                            <td>No. Kelahiran</td>                                          
                                            <td width="80%">: <?php echo $data_cek['no_lahir'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Kelahiran</td>
                                            <td>: <?php echo $data_cek['nama_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Kelahiran</td>
                                            <td>: <?php echo $data_cek['tempat_lahir_pd'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Kelahiran</td>
                                            <td>: <?php  $tgl = $data_cek['tgl_lahir_pd']; echo date("d - F - Y", strtotime($tgl))?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>: <?php echo $data_cek['jekel_penduduk'];?></td>
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
                        <b>Berkas Kelahiran</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Surat Ket. Lahir</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td align="left"><img src="img/<?php echo $data_cek['gambar_lahir']; ?>" width="450px" /></td>
                                        
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

           