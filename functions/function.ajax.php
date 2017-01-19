<?php
include "db.php";
include "function.php";

global $koneksi;

if($_POST['aksi'] == 'tambah_tag'){
  $nama = $_POST['nama_tag'];
  $sql = "INSERT INTO `tag` (`nama_tag`) VALUES ('$nama')";
  $hasil = run($sql);
  $id_terahir = mysqli_insert_id($koneksi);
  if($hasil){
    echo  "<tr id='tag_". $id_terahir ."'>
            <td>". $id_terahir ."</td>
            <td>". $nama ."</td>
          <td>
            <button class=''>
              <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Edit
            </button>
            <button class='hapus_tag' data-id-tag='". $id_terahir ."' >
              <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Hapus
            </button>
          </td>
          </tr>";
  }else{
    echo "post gagal masuk bertambah";
  }
}else if($_POST['aksi'] == 'hapus_tag'){
  $id_tag = $_POST['id_tag'];
  $sql = "DELETE FROM `tag` WHERE `tag`.`id_tag` = $id_tag";
  $run = run($sql);
  if($run){
    echo "tag behasil dihapus";
  }else{
    echo "tag gagal dihapus";
  }
}

?>
