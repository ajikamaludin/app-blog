<?php

include "db.php";
include "function.php";

global $koneksi;

$aksi_ajax = $_POST['aksi'];

// Ajax to PHP Tambah Tag
if($aksi_ajax == 'tambah_tag'){
      $nama = $_POST['nama_tag'];
      $hasil = tambah_tag($nama);
      $id_terahir = mysqli_insert_id($koneksi);
      if($hasil){
          echo " <tr id='tag_". $id_terahir ."'>
                  <td>". $id_terahir ."</td>
                  <td>". $nama ."</td>
                  <td>
                    <button class='edit_tag' data-id-tag='".$id_terahir."'>
                      Edit
                    </button>
                    <button class='hapus_tag' data-id-tag='". $id_terahir ."' >
                      Hapus
                    </button>
                   </td>
                  </tr>
              ";
            }else{
              echo "0";
            }

//Ajax To PHP Hapus Tag
}else if($aksi_ajax == 'hapus_tag'){
      if(!empty($id_tag = $_POST['id_tag'])){
          $hapus = hapus_tag($id_tag);

          if($hapus){ echo "tag behasil dihapus";
          }else{echo "tag gagal dihapus";}

        }else{
          echo "tag gagal dihapus";
        }
//Ajax To PHP Menampilkan Edit Tag
}else if($aksi_ajax == 'show_edit_tag'){
  $id_tag = $_POST['id_tag'];
  $nama_tag = show_edit_tag($id_tag);
  echo "
        <div id='tag_modal_". $id_tag ."'>
          <div class='form-group' id='tag_modal_". $id_tag ."'>
            <label >Nama Tag </label>
            <input type='text' class='form-control' id='update_name_tag' value='".$nama_tag."'>
          </div>
          <button  class='btn btn-default' name='update_tag' id='update_tag' data-id-tag-update='".$id_tag."'>Ubah</button>
          <button class='btn btn-default' id='batal_update_tag'  data-id-tag-update='".$id_tag."'>Batal</button>
  				<div id='tag-gagal-diupdate' >Tag Gagal Diubah</div>
        </div>
        ";
}
//Ajax To PHP Menampilkan Proses Tag
else if($aksi_ajax == 'proses_edit_tag'){
  $id_tag = $_POST['id_tag'];
  $name_tag = $_POST['name_tag'];
  $hasil = proses_edit_tag($id_tag,$name_tag);
  if($hasil){
    echo  "<tr id='tag_". $id_tag ."'>
              <td>". $id_tag ."</td>
              <td>". $name_tag ."</td>
            <td>
              <button class='edit_tag' data-id-tag='". $id_tag ."'>
                Edit
              </button>
              <button class='hapus_tag' data-id-tag='". $id_tag ."' >
                Hapus
              </button>
            </td>
            </tr>";
  }else{
    echo "0";
  }
}
//Ajax To PHP Logout
else if($aksi_ajax == 'logout'){
  $logout = logout();
  echo "$logout";
}

else {
  echo "No Aksi";
}

?>
