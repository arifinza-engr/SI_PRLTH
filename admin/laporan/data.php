<div class="panel panel-info">
  <div class="panel-heading">
    <i class="glyphicon glyphicon-book"></i>
    <b>Data Aduan</b>
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
            <th>status</th>
            <th>Aksi</th>
          </tr>

        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = $koneksi->query("select a.id_pengaduan, a.nama_pengusul, a.desa, a.foto, a.status, j.kecamatan, p.nama_desa, a.keterangan
						from tb_pengaduan a join tb_kecamatan j on a.kecamatan=j.id_kecamatan
						join tb_pengadu p on a.author=p.id_desa where status='Proses'");
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
            </tr>

          <?php
          }
          ?>
        </tbody>
    </div>
  </div>
</div>