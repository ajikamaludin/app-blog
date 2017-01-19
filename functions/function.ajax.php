<?php
include "db.php";
include "function.php";

global $koneksi;

if($_POST['aksi'] == 'tambah_tag'){
  $nama = $_POST['nama_tag'];
  $sql = "INSERT INTO `tag` (`nama_tag`) VALUES ('$nama')";
  $id_terahir = mysqli_insert_id($koneksi);
  $hasil = hasil($sql);
  if($hasil){
    echo  '<tr>
          <td'.$id_terahir.'</td>
          <td>'.$nama.'</td>
          <td>Hapus Edit</td>
          </tr>';
  }else{
    echo "data gagal masuk";
  }
}

?>
