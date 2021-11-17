<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                 

                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Penduduk</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tgl Lahir</th>
                                            <th>Aksi</th>
                                           

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("select * from tb_penduduk where st_ada='ada' and ath_penduduk='$data_ath'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['nama_penduduk']; ?></td> 
                                        <td>
                                        <?php  $tgl = $data['tgl_lahir_pd']; echo date("d - F - Y", strtotime($tgl))?>
                                        </td>            
                                        <td>
                                        <a href="?halaman=rt_penduduk_detail&kode=<?php echo $data['no_pdd']; ?>" title="Detail Penduduk" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="?halaman=rt_penduduk_ubah&kode=<?php echo $data['no_pdd']; ?>" title="Ubah" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                       
                                        <a href="?halaman=rt_penduduk_hapus&kode=<?php echo $data['no_pdd']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></>
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