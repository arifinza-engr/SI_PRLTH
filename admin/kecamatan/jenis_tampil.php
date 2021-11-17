<div class="panel panel-info">
  <div class="panel-heading">
    <i class="glyphicon glyphicon-book"></i>
    <b>Kecamatan</b>
  </div>
  <div class="panel-body">

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>No</th>
            <th>Kecamatan</th>
            <th>Aksi</th>
          </tr>

        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = $koneksi->query("select * from tb_kecamatan");
          while ($data = $sql->fetch_assoc()) {
          ?>
            <tr>
              <td>
                <?php echo $no++; ?>
              </td>
              <td>
                <?php echo $data['kecamatan']; ?>
              </td>

              <td>
                <a href="?page=jenis_ubah&kode=<?php echo $data['id_kecamatan']; ?>" title="Ubah" class="btn btn-success btn-sm">
                  <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a href="?page=jenis_hapus&kode=<?php echo $data['id_kecamatan']; ?>" onclick="return confirm('Apakah anda yakin hapus kecamatan ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                  <i class="glyphicon glyphicon-trash"></i>
              </td>
            </tr>

          <?php
          }
          ?>
          <a href="?page=jenis_tambah" class="btn btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Tambah</a>
          <br>
          <br>
        </tbody>
    </div>
  </div>
</div>