<?php
include "db.php";
include "function.php";

global $koneksi;

if($_POST['aksi'] == 'tambah_tag'){
      $nama = $_POST['nama_tag'];
      $hasil = tambah_tag($nama);
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
              echo "0";
            }
}

else if($_POST['aksi'] == 'hapus_tag'){
      if(!empty($id_tag = $_POST['id_tag'])){
          $sql = "DELETE FROM `tag` WHERE `tag`.`id_tag` = $id_tag";
          $run = run($sql);
          if($run){
            echo "tag behasil dihapus";
          }else{
            echo "tag gagal dihapus";
          }
        }else{
          echo "tag gagal dihapus";
        }
}

else if($_POST['aksi'] == 'show_edit_tag'){
  $id_tag = $_POST['id_tag'];
  $sql = "SELECT nama_tag FROM tag WHERE id_tag=$id_tag";
  $run = hasil($sql);
  $var = mysqli_fetch_assoc($run);
  $nama_tag = $var['nama_tag'];

  echo "    <div class='form-group'>
              <label >Nama Tag </label>
              <input type='text' class='form-control' id='edit_nama_tag' value='". $nama_tag ."'>
            </div>
            <button  class='btn btn-default' name='edit_tag' id='edit_tag'>Edit</button>
  					<div id='status_edit_tag'></div>
  ";
}

else {
  echo "No Aksi";
}

?>
