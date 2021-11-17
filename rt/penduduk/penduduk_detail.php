<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_penduduk WHERE no_pdd='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <b>Detail Penduduk : <?php echo $data_cek['nama_penduduk'];?></b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    
                                    <tbody>
                                        <tr>
                                            <td>No. Penduduk</td>                                          
                                            <td width="80%">: <?php echo $data_cek['no_pdd'];?></td>
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
                                            <td>Tempat lahir</td>
                                            <td>: <?php echo $data_cek['tempat_lahir_pd'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal lahir</td>
                                            <td>: <?php  $tgl = $data_cek['tgl_lahir_pd']; echo date("d - F - Y", strtotime($tgl))?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>: <?php echo $data_cek['jekel_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>: <?php echo $data_cek['agama_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>: <?php echo $data_cek['kerja_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan</td>
                                            <td>: <?php echo $data_cek['pendidikan_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kwarganegaraan</td>
                                            <td>: <?php echo $data_cek['kwarganegaraan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>St. Perkawinan</td>
                                            <td>: <?php echo $data_cek['kawin_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Gol. darah</td>
                                            <td>: <?php echo $data_cek['gol_darah_pd'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Desa</td>
                                            <td>: <?php echo $data_cek['alamat_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>RT</td>
                                            <td>: <?php echo $data_cek['rt_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>RW</td>
                                            <td>: <?php echo $data_cek['rw_penduduk'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>: <?php echo $data_cek['kecamatan_penduduk'];?></td>
                                        </tr>
                                        

                                    </tbody>

                                </table>

                                

                                       
                            </div>
                        </div>
                    </div>
                </div>
