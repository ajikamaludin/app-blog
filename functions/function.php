<?php
function tampilkan_post(){
  $sql = "SELECT post.id_post, post.judul_post, post.gambar_post, post.isi_post, post.waktu_post, post.penulis_post,users.id_user,users.nama,tag.nama_tag FROM `post`,`users`,`tag` WHERE post.penulis_post=users.id_user AND post.id_tag=tag.id_tag LIMIT 8";
  return hasil($sql);
}

function tampilkan_post_per_id($id){
  $sql = "SELECT post.id_post, post.judul_post, post.gambar_post, post.isi_post, post.waktu_post, post.penulis_post,users.id_user,users.nama FROM `post`,`users` WHERE post.penulis_post=users.id_user AND id_post=$id";
  return hasil($sql);
}

function tampil_slide_3(){
  $sql = "SELECT id_post,judul_post,gambar_post, isi_post FROM `post` LIMIT 3";
  return hasil($sql);
}

function hasil($sql){
  global $koneksi;
  return mysqli_query($koneksi,$sql);
}

function run($sql){
  global $koneksi;
  //if(mysqli_query($koneksi,$sql)) return true;
  //else return false;

  if(mysqli_query($koneksi)){
    return true;
  }else{
    return false;
  }

}

function potong_900($string){
	$string = substr($string, 0, 1000);
	return $string ."...";
}

function potong_300($string){
	$string = substr($string, 0, 300);
	return $string ."...";
}

function cek_string($data){
	global $koneksi;
	return mysqli_real_escape_string($koneksi, $data);
}

//function untuk login
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

function tampilkan_tag(){
  $sql = "SELECT id_tag,nama_tag FROM `tag`";
  return hasil($sql);
}

function tampilkan_komentar(){
  $sql = "";
  return hasil($sql);
}

function tampilkan_users(){
  $sql = "";
  return hasil($sql);
}


?>
