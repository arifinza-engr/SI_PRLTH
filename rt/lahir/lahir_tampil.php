<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Kelahiran</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Kelahiran</th>
                                            <th>Nama lahir</th>
                                            <th>Tgl Lahir</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $data_ath = $_SESSION["ses_id"];

                                    $no = 1;
                                    $sql = $koneksi->query("select l.no_lahir , l.stv_lahir, p.nama_penduduk, p.tempat_lahir_pd, p.tgl_lahir_pd from
                                    tb_lahir l inner join tb_penduduk p ON l.no_pdd = p.no_pdd where stv_lahir='Berhasil' and ath_lahir='$data_ath'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_lahir']; ?></td>
                                        <td><?php echo $data['nama_penduduk']; ?></td>
                                        <td><?php echo $data['tgl_lahir_pd']; ?></td>             
                                        <td>
                                        <a href="?halaman=rt_lahir_detail&kode=<?php echo $data['no_lahir']; ?>" title="Detail Kelahiran" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="?halaman=rt_lahir_ubah&kode=<?php echo $data['no_lahir']; ?>" title="Ubah" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                        
                                        <a href="?halaman=rt_lahir_hapus&kode=<?php echo $data['no_lahir']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></>
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