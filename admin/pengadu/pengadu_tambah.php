<?php
function generate_uuid()
{
  return sprintf(
    '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0x0fff) | 0x4000,
    mt_rand(0, 0x3fff) | 0x8000,
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff)
  );
}

$UUID = generate_uuid();
?>
<div class="panel panel-info">
  <div class="panel-heading">
    <i class="glyphicon glyphicon-plus"></i>
    <b>Tambah Desa</b>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form method="POST">
          <div class="form-group">
            <label>Nama Desa</label>
            <input class="form-control" name="nama_desa" placeholder="Masukan Nama Desa" required />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="email" placeholder="Masukan Email" type="text" required>
          </div>
          <div class="form-group">
            <label>No Telp</label>
            <input class="form-control" name="no_hp" placeholder="Masukan No Telpon" required />
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" name="alamat" placeholder="Masukan Alamat" required />
          </div>
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="username" placeholder="Masukan Username" required />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" name="password" placeholder="Masukan Password" required />
          </div>
          <div>
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
            <a href="?page=user_data" title="Kembali" class="btn btn-default">Batal</a>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<?php

if (isset($_POST['Simpan'])) {

  $sql_simpan = "INSERT INTO tb_pengusul
   (id_desa, nama_desa, email, no_hp, alamat) VALUES (
			'$UUID',
			'" . $_POST['nama_desa'] . "',
			'" . $_POST['email'] . "',
			'" . $_POST['no_hp'] . "',
			'" . $_POST['alamat'] . "')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);

  $sql_pengguna = "INSERT INTO tb_pengguna (id_pengguna, nama_pengguna, username, password) VALUES (
			'$UUID',
			'" . $_POST['nama_desa'] . "',
			'" . $_POST['username'] . "',
			'" . $_POST['password'] . "')";
  $query_pengguna = mysqli_query($koneksi, $sql_pengguna);

  if ($query_simpan && $query_pengguna) {
    echo "<script>
            Swal.fire({title: 'Tambah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index?page=pengadu_view';
                }
            })</script>";
  } else {
    echo "<script>
            Swal.fire({title: 'Tambah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index?page=pengadu_view';
                }
            })</script>";
  }
}
?>
<!-- end -->