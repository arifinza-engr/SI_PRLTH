<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Kematian</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Kematian</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>Tanggal kematian</th>
                                            <th>Sebab</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php
                                    $data_ath = $_SESSION["ses_id"];

                                    $no = 1;
                                    $sql = $koneksi->query("select m.no_mati , m.umur_mati, m.tgl_mati, m.sebab_mati, p.nama_penduduk from tb_mati
                                    m inner join tb_penduduk p ON m.no_pdd = p.no_pdd where stv_mati='Berhasil' and ath_mati='$data_ath'");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['no_mati']; ?></td>
                                        <td><?php echo $data['nama_penduduk']; ?></td> 
                                        <td><?php echo $data['umur_mati']; ?></td>
                                        <td><?php echo $data['tgl_mati']; ?></td>
                                        <td><?php echo $data['sebab_mati']; ?></td>              
                                        <td>
                                        <a href="?halaman=rt_mati_detail&kode=<?php echo $data['no_mati']; ?>" title="Detail Kematian" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="?halaman=rt_mati_ubah&kode=<?php echo $data['no_mati']; ?>" title="Ubah" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                       
                                        <a href="?halaman=rt_mati_hapus&kode=<?php echo $data['no_mati']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></>
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