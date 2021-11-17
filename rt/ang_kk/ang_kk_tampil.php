<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Anggota Kartu Keluarga</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. KK</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Status Dlm Keluarga</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php
                                    $data_ath = $_SESSION["ses_id"];

                                    $no = 1;
                                    $sql = $koneksi->query("select d.id_detail, d.no_kk, d.nik, d.status_kk, p.nama_penduduk
                                    from tb_detail_kk d inner join tb_penduduk p ON d.nik = p.nik
                                    where p.st_ada='ada'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>



                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_kk']; ?></td>
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['nama_penduduk']; ?></td>
                                        <td><?php echo $data['status_kk']; ?></td>                
                                        <td>
                                        <a href="?halaman=rt_ang_kk_hapus&kode=<?php echo $data['id_detail']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></>
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