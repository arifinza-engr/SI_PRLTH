<?php
$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as proses  from tb_usulan where status='Proses' and author='$data_id'");
while ($data = $sql->fetch_assoc()) {
  $proses = $data['proses'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as tanggapi  from tb_usulan where status='Tanggapi' and author='$data_id'");
while ($data = $sql->fetch_assoc()) {
  $tangan = $data['tanggapi'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as selesai  from tb_usulan where status='Selesai' and author='$data_id'");
while ($data = $sql->fetch_assoc()) {
  $sel = $data['selesai'];
}

?>
<hr>
<div>
  <center>
    <h1>Selamat Datang,
      <?= $data_nama ?> -
      <?= $data_level ?>
    </h1>
  </center>
</div>
<hr>
<div class="col-md-4 col-sm-6 col-xs-6">
  <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-red set-icon">
      <i class="fa fa-bell"></i>
    </span>
    <div class="text-box">
      <h1>
        <?= $proses; ?>
      </h1>
      <p>Pengusulan Menunggu</p>

    </div>
  </div>
</div>
<div class="col-md-4 col-sm-6 col-xs-6">
  <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-green set-icon">
      <i class="fa fa-bell"></i>
    </span>
    <div class="text-box">
      <h1>
        <?= $tangan; ?>
      </h1>
      <p>Pengusulan Ditanggapi</p>

    </div>
  </div>
</div>
<div class="col-md-4 col-sm-6 col-xs-6">
  <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
      <i class="fa fa-bell"></i>
    </span>
    <div class="text-box">
      <h1>
        <?= $sel; ?>
      </h1>
      <p>Pengusulan Selesai</p>

    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>
  <h4>
    <a href="https://www.instagram.com/arifinza.engr/" target="blank">Copyright@2021 - Arifinza Eska Nugraha</a>
  </h4>
</center>