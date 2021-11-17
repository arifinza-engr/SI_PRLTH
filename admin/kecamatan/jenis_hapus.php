<?php
if (isset($_GET['kode'])) {
    $sql_hapus = "DELETE FROM tb_kecamatan WHERE id_kecamatan='" . $_GET['kode'] . "'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
                Swal.fire({title: 'Hapus Sukses',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'index?page=jenis_view';
                    }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Hapus Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'index?page=jenis_view';
                    }
                })</script>";
    }
}

?>

<!-- end -->