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
                      <button class='edit_tag' data-id-tag='".$id_terahir."'>
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

  echo "<div id='tag_modal_". $id_tag ."'>
          <div class='form-group' id='tag_modal_". $id_tag ."'>
            <label >Nama Tag </label>
            <input type='text' class='form-control' id='update_name_tag' value='".$nama_tag."'>
          </div>

          <button  class='btn btn-default' name='update_tag' id='update_tag' data-id-tag-update='".$id_tag."'>Ubah</button>
        </div>
        ";
}

else if($_POST['aksi'] == 'proses_edit_tag'){
  $id_tag = $_POST['id_tag'];
  $name_tag = $_POST['name_tag'];
  $sql = "UPDATE `tag` SET `nama_tag` = '$name_tag' WHERE `tag`.`id_tag` = '$id_tag'";
  if(run($sql)){
    echo  "<tr id='tag_". $id_tag ."'>
              <td>". $id_tag ."</td>
              <td>". $name_tag ."</td>
            <td>
              <button class='edit_tag' data-id-tag='". $id_tag ."'>
                <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Edit
              </button>
              <button class='hapus_tag' data-id-tag='". $id_tag ."' >
                <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Hapus
              </button>
            </td>
            </tr>";
  }else{
    echo "0";
  }
}

else {
  echo "No Aksi";
}

?>
