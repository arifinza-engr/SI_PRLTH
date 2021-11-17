<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Kartu Keluarga</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. KK</th>
                                            <th>Nama</th>
                                            <th>Desa</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Kecamatan</th>
                                            <th>Provinsi</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php
                                    $data_ath = $_SESSION["ses_id"];

                                    $no = 1;
                                    $sql = $koneksi->query("select * from tb_kk where ath_kk='$data_ath'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_kk']; ?></td>
                                        <td><?php echo $data['nama_kk']; ?></td>
                                        <td><?php echo $data['desa_kk']; ?></td>
                                        <td><?php echo $data['rt_kk']; ?></td> 
                                        <td><?php echo $data['rw_kk']; ?></td>
                                        <td><?php echo $data['kec_kk']; ?></td> 
                                        <td><?php echo $data['prov_kk']; ?></td>                  
                                        <td>
                                        <a href="?halaman=rt_kk_ubah&kode=<?php echo $data['no_kk']; ?>" title="Ubah" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="?halaman=rt_kk_detail&kode=<?php echo $data['no_kk']; ?>" title="Anggota Keluarga" class="btn btn-primary"><i class="glyphicon glyphicon-random"></i></a>
                                        
                                        <a href="?halaman=rt_kk_hapus&kode=<?php echo $data['no_kk']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></>
                                        
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