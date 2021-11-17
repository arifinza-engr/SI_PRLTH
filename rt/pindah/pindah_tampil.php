<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Pindah Keluar</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Pindah</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php
                                    $data_ath = $_SESSION["ses_id"];

                                    $no = 1;
                                    $sql = $koneksi->query("select m.no_pindah , m.tgl_pindah, m.keterangan, p.nik, p.nama_penduduk from tb_pindah
                                    m inner join tb_penduduk p ON m.no_pdd = p.no_pdd where stv_pindah='Berhasil' and ath_pindah='$data_ath'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_pindah']; ?></td>
                                        <td><?php echo $data['nik']; ?></td> 
                                        <td><?php echo $data['nama_penduduk']; ?></td> 
                    
                                        <td>
                                        <a href="?halaman=rt_pindah_detail&kode=<?php echo $data['no_pindah']; ?>" title="Detail Pindah Keluar" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="?halaman=rt_pindah_ubah&kode=<?php echo $data['no_pindah']; ?>" title="Ubah" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                       
                                        <a href="?halaman=rt_pindah_hapus&kode=<?php echo $data['no_pindah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></>
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