<?php
$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as proses  from tb_usulan where status='Proses'");
while ($data = $sql->fetch_assoc()) {
  $proses = $data['proses'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as tanggapi  from tb_usulan where status='Tanggapi'");
while ($data = $sql->fetch_assoc()) {
  $tangan = $data['tanggapi'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as selesai  from tb_usulan where status='Selesai'");
while ($data = $sql->fetch_assoc()) {
  $sel = $data['selesai'];
}

$sql = $koneksi->query("SELECT COUNT(id_desa) as orang  from tb_pengusul");
while ($data = $sql->fetch_assoc()) {
  $or = $data['orang'];
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
      <i class="fa fa-bars"></i>
    </span>
    <div class="text-box">
      <h1>
        <?= $proses; ?>
      </h1>
      <p>Pengaduan Menunggu</p>
      <a href="?page=aduan_admin">Detail
      </a>
    </div>
  </div>
</div>
<div class="col-md-4 col-sm-6 col-xs-6">
  <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-green set-icon">
      <i class="fa fa-bars"></i>
    </span>
    <div class="text-box">
      <h1>
        <?= $tangan; ?>
      </h1>
      <p>Pengaduan Ditanggapi</p>
      <a href="?page=aduan_admin_tanggap">Detail
      </a>
    </div>
  </div>
</div>
<div class="col-md-4 col-sm-6 col-xs-6">
  <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
      <i class="fa fa-bars"></i>
    </span>
    <div class="text-box">
      <h1>
        <?= $sel; ?>
      </h1>
      <p>Pengaduan Selesai</p>
      <a href="?page=aduan_admin_selesai">Detail
      </a>
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