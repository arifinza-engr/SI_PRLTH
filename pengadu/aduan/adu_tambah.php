<?php $author = $data_id;

$sql = $koneksi->query("SELECT * from tb_telegram");
while ($data = $sql->fetch_assoc()) {
  $id_chat = $data['id_chat'];
}
?>
<div class="panel panel-info">
  <div class="panel-heading">
    <i class="glyphicon glyphicon-plus"></i>
    <b>Tambah Usulan</b>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" name="nama_pengusul" placeholder="Masukan Nama" required />
          </div>
          <div class="form-group">
            <label>NIK</label>
            <input class="form-control" name="nik" rows="5" placeholder="Masukan NIK" required></input>
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <select name="kecamatan" class="form-control">
              <option value="">- Pilih -</option>
              <?php
              // ambil data dari database
              $query = "select * from tb_kecamatan";
              $hasil = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_array($hasil)) {
              ?>
                <option value="<?php echo $row['id_kecamatan'] ?>">
                  <?php echo $row['kecamatan'];  ?>
                </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" name="desa" placeholder="Masukan Alamat dan Nama Desa" required />
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" required />
          </div>
          <div>
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
            <a href="?page=aduan_view" title="Kembali" class="btn btn-default">Batal</a>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<?php



if (isset($_POST['Simpan'])) {

  $aduan = $_POST['nama_pengusul'];

  $sumber = $_FILES['foto']['tmp_name'];
  $nama_file = $_FILES['foto']['name'];
  $pindah = move_uploaded_file($sumber, 'foto/' . $nama_file);

  $sql_simpan = "INSERT INTO tb_usulan (`nama_pengusul`, `kecamatan`, `desa`, `nik`, `foto`, `author`) VALUES (
			'" . $_POST['nama_pengusul'] . "',
			'" . $_POST['kecamatan'] . "',
      '" . $_POST['desa'] . "',
			'" . $_POST['nik'] . "',
			'" . $nama_file . "',
			'$author')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);

  if ($query_simpan) {
    echo "<script>
            Swal.fire({title: 'Tambah Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index?page=aduan_view';
                }
			})</script>";

    $token = "2066596582:AAFzDcwNvTwtMhAlYEiNbjspXSpGxlPcJlU";
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $id_chat . "&parse_mode=HTML&text=INFO PENGAJUAN RTLH : Nama : " . $aduan . " dari " . $data_nama . ", memerlukan penanganan. Terimakasih";
    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $url);
    curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
    curl_setopt($curlHandle, CURLOPT_POST, 1);
    $results = curl_exec($curlHandle);
    curl_close($curlHandle);
  } else {
    echo "<script>
            Swal.fire({title: 'Tambah Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index?page=aduan_view';
                }
            })</script>";
  }
}
?>
<!-- end -->