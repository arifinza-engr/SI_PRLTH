<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <a href="?halaman=rt_datang_tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    <br><br>

                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Pendataan Pindah Masuk</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Pendatang</th>
                                            <th>NIK</th>
                                            <th>Nama Pendatang</th>
                                            <th>Status Verifikasi</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php
                                    $data_ath = $_SESSION["ses_id"];

                                    $no = 1;
                                    $sql = $koneksi->query("select d.no_datang, d.stv_datang, p.nik, p.nama_penduduk
                                    from tb_datang d inner join tb_penduduk p ON d.no_pdd = p.no_pdd where ath_datang='$data_ath'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_datang']; ?></td>
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['nama_penduduk']; ?></td>

                                        <?php $warna = $data['stv_datang']  ?>
                                            <td> <?php if ($warna == 'Berhasil') { ?> 
                                                <?php echo "<b><font color='blue'>$warna" ?></font></b></td>
                                            <?php } elseif ($warna == 'Gagal') { ?>
                                                <?php echo "<b><font color='red'>$warna" ?></font></b></td>
                                            <?php }  else { ?>
                                               <?php echo "<b><font color='black'>$warna" ?></font></b></td>
                                            <?php } ?>

                                        <td>
                                        <a href="?halaman=rt_datang_detail&kode=<?php echo $data['no_datang']; ?>" title="Detail Proses Pindah Masuk" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="?halaman=rt_datang_proses_hapus&kode=<?php echo $data['no_lahir']; ?>" title="Hapus Proses Pindah Masuk" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                       
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