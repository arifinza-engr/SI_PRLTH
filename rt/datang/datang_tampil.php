<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Pindah Masuk</b>
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
                                            <th>Tgl Datang</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $data_ath = $_SESSION["ses_id"];

                                    $no = 1;
                                    $sql = $koneksi->query("select d.no_datang, d.tgl_datang, d.alamat_asal, d.stv_datang, p.nik, p.nama_penduduk, p.jekel_penduduk from
                                    tb_datang d inner join tb_penduduk p ON d.no_pdd = p.no_pdd where stv_datang='Berhasil' and ath_datang='$data_ath'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_datang']; ?></td>
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['nama_penduduk']; ?></td>
                                        <td><?php echo $data['tgl_datang']; ?></td>           
                                        <td>
                                        <a href="?halaman=rt_datang_detail&kode=<?php echo $data['no_datang']; ?>" title="Detail Pindah Masuk" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="?halaman=rt_datang_ubah&kode=<?php echo $data['no_datang']; ?>" title="Ubah" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                       
                                        <a href="?halaman=rt_datang_hapus&kode=<?php echo $data['no_datang']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></>
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