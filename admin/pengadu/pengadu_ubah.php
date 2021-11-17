<?php

if (isset($_GET['kode'])) {
  $sql_cek = "SELECT * FROM tb_pengusul WHERE id_desa='" . $_GET['kode'] . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>


<div class="panel panel-info">
  <div class="panel-heading">
    <i class="glyphicon glyphicon-edit"></i>
    <b>Ubah Desa</b>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form method="POST">

          <div class="form-group">
            <input type='hidden' class="form-control" name="id_desa" value="<?php echo $data_cek['id_desa']; ?>" readonly />
          </div>

          <div class="form-group">
            <label>Nama Desa</label>
            <input class="form-control" name="nama_desa" value="<?php echo $data_cek['nama_desa']; ?>" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="email" value="<?php echo $data_cek['email']; ?>" />
          </div>
          <div class="form-group">
            <label>No HP</label>
            <input class="form-control" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>" />
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" name="alamat" value="<?php echo $data_cek['alamat']; ?>" />
          </div>
          <div>
            <input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
            <a href="?page=pengadu_view" title="Kembali" class="btn btn-default">Batal</a>
          </div>

      </div>
      </form>
    </div>

  </div>
</div>
</div>


<?php

if (isset($_POST['Ubah'])) {

  $sql_ubah = "UPDATE tb_pengusul SET
		nama_desa='" . $_POST['nama_desa'] . "',
		email='" . $_POST['email'] . "',
		no_hp='" . $_POST['no_hp'] . "',
		alamat='" . $_POST['alamat'] . "' 
		WHERE id_desa='" . $_POST['id_desa'] . "'";
  $query_ubah = mysqli_query($koneksi, $sql_ubah);

  $sql_ub = "UPDATE tb_pengguna SET
        nama_pengguna='" . $_POST['nama_desa'] . "'
        WHERE id_pengguna='" . $_POST['id_desa'] . "'";
  $query_pengguna = mysqli_query($koneksi, $sql_ub);

  if ($query_ubah && $query_pengguna) {
    echo "<script>
        Swal.fire({title: 'Ubah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index?page=pengadu_view';
            }
        })</script>";
  } else {
    echo "<script>
        Swal.fire({title: 'Ubah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index?page=pengadu_view';
            }
        })</script>";
  }
}
?>
<!-- end -->