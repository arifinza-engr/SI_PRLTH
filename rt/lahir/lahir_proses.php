<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <a href="?halaman=rt_lahir_tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    <br><br>

                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Pendataan Kelahiran</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Kelahiran</th>
                                            <th>Nama Kelahiran</th>
                                            <th>Status Verifikasi</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php
                                    $data_ath = $_SESSION["ses_id"];

                                    $no = 1;
                                    $sql = $koneksi->query("select l.no_lahir , l.stv_lahir, p.nama_penduduk, p.tempat_lahir_pd, p.tgl_lahir_pd from
                                    tb_lahir l inner join tb_penduduk p ON l.no_pdd = p.no_pdd where ath_lahir='$data_ath'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_lahir']; ?></td>
                                        <td><?php echo $data['nama_penduduk']; ?></td>

                                        <?php $warna = $data['stv_lahir']  ?>
                                            <td> <?php if ($warna == 'Berhasil') { ?> 
                                                <?php echo "<b><font color='blue'>$warna" ?></font></b></td>
                                            <?php } elseif ($warna == 'Gagal') { ?>
                                                <?php echo "<b><font color='red'>$warna" ?></font></b></td>
                                            <?php }  else { ?>
                                               <?php echo "<b><font color='black'>$warna" ?></font></b></td>
                                            <?php } ?>

                                        <td>
                                        <a href="?halaman=rt_lahir_detail&kode=<?php echo $data['no_lahir']; ?>" title="Detail Proses Kelahiran" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="?halaman=rt_lahir_proses_hapus&kode=<?php echo $data['no_lahir']; ?>" title="Hapus Proses Kelahiran" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                       
                                        </td>

                                    </tr>
                                    <?php
                                    }
                                    ?>

                                    </tbody>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>