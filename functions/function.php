<?php
//Berhubungan Dengan Menampilkan
function tampilkan_post(){
  $sql = "SELECT post.id_post, post.judul_post,
  post.gambar_post, post.isi_post, post.waktu_post,
  post.penulis_post,post.id_tag,users.id_user,
  users.nama,tag.nama_tag FROM `post`,`users`,`tag` WHERE post.penulis_post=users.id_user AND post.id_tag=tag.id_tag LIMIT 8";

  return hasil($sql);
}

function jumlah_post($table){
  $sql = " SELECT * FROM $table";
  $jumlah = mysqli_num_rows(hasil($sql));
  echo $jumlah;
}

function tampilkan_post_per_id($id){
  $sql = "SELECT post.id_post, post.judul_post,
  post.gambar_post, post.isi_post, post.waktu_post,
  post.penulis_post,users.id_user,users.nama FROM `post`,`users` WHERE post.penulis_post=users.id_user AND id_post=$id";

  return hasil($sql);
}

function tampil_slide_3(){
  $sql = "SELECT id_post,judul_post,gambar_post, isi_post FROM `post` LIMIT 3";
  return hasil($sql);
}

function tampilkan_tag(){
  $sql = "SELECT id_tag,nama_tag FROM `tag`";
  return hasil($sql);
}

function tambah_tag($nama){
    if(!empty($nama)){
      $nama_post = cek_string($nama);
        if(cek_ada($nama_post,'tag')){
          $sql = "INSERT INTO `tag` (`nama_tag`) VALUES ('$nama')";
          if(run($sql)){
            return true;
          }else{
            return false;
          }
        }else{
          return false;
        }
    }else{
    return false;
  }
}

function hapus_tag($id_tag){
  if(!empty($id_tag)){
    $sql = "DELETE FROM `tag` WHERE `tag`.`id_tag` = $id_tag";
    return run($sql);
  }else{
    return false;
  }
}

function show_edit_tag($id_tag){
  $sql = "SELECT nama_tag FROM tag WHERE id_tag=$id_tag";
  $run = hasil($sql);
  $var = mysqli_fetch_assoc($run);
  $nama_tag = $var['nama_tag'];
  return $nama_tag;
}

function proses_edit_tag($id_tag,$nama_tag){
  if(!empty($nama_tag)){
      if(cek_ada($nama_tag,'tag')){
        $sql = "UPDATE `tag` SET `nama_tag` = '$nama_tag' WHERE `tag`.`id_tag` = '$id_tag'";
        if(run($sql)){
          return true;
        }else{
          return false;
        }
      }else{ return false; }
  }else{ return false; }

}

function tampilkan_komentar(){
  $sql = "SELECT komentar.isi_komentar,
          komentar.waktu_komentar, post.id_post,
          post.judul_post FROM komentar JOIN post ON komentar.id_post = post.id_post";

  return hasil($sql);
}

function tampilkan_users(){
  $sql = "SELECT users.nama, users.user_name FROM `users`";
  return hasil($sql);
}

//Mengembalikan Hasil Query
function hasil($sql){
  global $koneksi;
  return mysqli_query($koneksi,$sql);
}

//Mengambalikan Nilai  Dari Hasil Query
function run($sql){
  global $koneksi;

    if(mysqli_query($koneksi,$sql)){
      return true;
    }else{
      return false;
    }

}


//Fungsi Tambahan
function potong_900($string){
	$string = substr($string, 0, 1000);
	return $string ."...";
}

function potong_300($string){
	$string = substr($string, 0, 300);
	return $string ."...";
}


//Fungsi Pengecekan data
function cek_string($data){
	global $koneksi;
	return mysqli_real_escape_string($koneksi, $data);
}

function cek_ada($data,$nama_table){
  global $koneksi;
  $sql = "SELECT * FROM $nama_table WHERE nama_$nama_table='$data'";
  $tersedia = mysqli_num_rows(hasil($sql));
  if($tersedia != 0){
    return false;
  }else{
    return true;
  }
}

//Fungsi Untuk Cek User Login
function login_user($user, $password){
  $user = cek_string($user);
  $password = cek_string($password);
  $password = md5($password);

  $sql = "SELECT user_name,password FROM users WHERE user_name='$user' AND password='$password'";

  global $koneksi;
  if ($hasil = mysqli_query($koneksi, $sql)){
    if(mysqli_num_rows($hasil) != 0) return true;
    else return false;
  }

}

//Fungsi Untuk User Logout
function logout(){
  session_start();
  unset($_SESSION['user']);
  session_destroy();
  return true;
}
?>
