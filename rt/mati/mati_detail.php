<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select m.no_mati ,m.umur_mati, m.tgl_mati, m.gambar_mati, p.nama_penduduk, m.sebab_mati from tb_mati
        m inner join tb_penduduk p ON m.no_pdd = p.no_pdd where no_mati='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <b>Detail Kematian : <?php echo $data_cek['nama_penduduk'];?></b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    
                                    <tbody>
                                        <tr>
                                            <td>No. Kematian</td>                                          
                                            <td width="80%">: <?php echo $data_cek['no_mati'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Kematian</td>
                                            <td>: <?php echo $data_cek['nama_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Umur</td>
                                            <td>: <?php echo $data_cek['umur_mati'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Kematian</td>
                                            <td>: <?php  $tgl = $data_cek['tgl_mati']; echo date("d - F - Y", strtotime($tgl))?></td>
                                        </tr>
                                        <tr>
                                            <td>Sebab Kematian</td>
                                            <td>: <?php echo $data_cek['sebab_mati'];?></td>
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
                        <b>Berkas Kematian</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Surat Ket. Kematian</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td align="left"><img src="img/<?php echo $data_cek['gambar_mati']; ?>" width="450px" /></td>
                                        
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

           