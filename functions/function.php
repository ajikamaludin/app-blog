<?php
function tampilkan_post(){
  $sql = "SELECT post.id_post, post.judul_post, post.gambar_post, post.isi_post, post.waktu_post, post.penulis_post,users.id_user,users.nama,tag.nama_tag FROM `post`,`users`,`tag` WHERE post.penulis_post=users.id_user AND post.id_tag=tag.id_tag";
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
?>
