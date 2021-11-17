</script>

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
            <th>status</th>
            <th>Aksi</th>
          </tr>

        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = $koneksi->query("select a.id_pengaduan, a.nama_pengusul, a.desa, a.foto, a.status, j.kecamatan, p.nama_desa, a.nik
						from tb_usulan a join tb_kecamatan j on a.kecamatan=j.id_kecamatan
						join tb_pengusul p on a.author=p.id_desa where status='Proses'");
          while ($data = $sql->fetch_assoc()) {
          ?>
            <tr>
              <td>
                <?php echo $no++; ?>
              </td>
              <td>
                <?php echo $data['nik']; ?>
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
                <img src="foto/<?php echo $data['foto']; ?>" onclick="showImage();" id="foto" width="100px" />
              </td>
              <td>
                <?php echo $data['nama_desa']; ?>
              </td>
              <td>
                <?php $stt = $data['status']  ?>
                <?php if ($stt == 'Proses') { ?>
                  <span class="label label-warning">Proses</span>
                <?php } elseif ($stt == 'Tanggapi') { ?>
                  <span class="label label-success">Ditanggapi</span>
                <?php } else { ?>
                  <span class="label label-primary">Selesai</span>
              </td>
            <?php } ?>

            <td>

              <a href="?page=aduan_kelola&kode=<?php echo $data['id_pengaduan']; ?>" title="Tanggapi" class="btn btn-primary btn-sm">
                <i class="glyphicon glyphicon-check"></i>
              </a>

            </td>

            </tr>

          <?php
          }
          ?>
        </tbody>
    </div>
  </div>
</div>