<div class="panel panel-info">
  <div class="panel-heading">
    <i class="glyphicon glyphicon-book"></i>
    <b>Data Usulan</b>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Kecamatan</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Pengusul</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = $koneksi->query("select a.id_pengaduan, a.nama_pengusul, a.foto, a.desa, a.status, a.keterangan, j.kecamatan, p.nama_desa, p.email
						from tb_pengaduan a join tb_kecamatan j on a.kecamatan=j.id_kecamatan
						join tb_pengadu p on a.author=p.id_desa where status='Selesai'");
          while ($data = $sql->fetch_assoc()) {
          ?>
            <tr>
              <td>
                <?php echo $no++; ?>
              </td>
              <td>
                <?php echo $data['keterangan']; ?>
              </td>
              <td>
                <?php echo $data['nama_pengusul']; ?>
              </td>
              <td>
                <?php echo $data['kecamatan']; ?>
              </td>
              <td>
                <?php echo $data['desa']; ?>
              </td>
              <td>
                <img src="foto/<?php echo $data['foto']; ?>" width="100px" />
              </td>
              <td>
                <?php echo $data['nama_desa']; ?>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <form action="?page=laporan_cetak" method="post">
        <input type="submit" class="btn btn-success" name="export" value="Export">
      </form>
    </div>
  </div>
</div>