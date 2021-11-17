<?php
// Load the database configuration file 
include_once './inc/koneksi.php';
include_once 'laporan.php';

$output = '';
if (isset($_POST['export'])) {
  $sql = "SELECT * FROM tb_pengaduan";
  $result = mysqli_query($koneksi, $sql);
  if (mysqli_num_rows($result) > 0) {
    $output .= '
        <table class="table" bordered="1">
        <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Kecamatan</th>
        <th>Alamat</th>
        <th>Foto</th>
      </tr>
        ';

    while ($row = mysqli_fetch_array($result)) {
      $output .= '
          <tr>
          <td>' . $row['id_pengaduan'] . '</td>
          <td>' . $row['keterangan'] . '</td>
          <td>' . $row['nama_pengusul'] . '</td>
          <td>' . $row['kecamatan'] . '</td>
          <td>' . $row['desa'] . '</td>
          <td>' . $row['foto'] . '</td>
        </tr>
          ';
    }
    $output .= '<table>';
    header("Content-Type : application/xls");
    header("Content-Disposition : attachment; filename=download.xls");
    echo $output;
  }
}
