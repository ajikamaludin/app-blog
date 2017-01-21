<?php
include "core/init.php";

if($id = $_GET['id']){
    $posts = tampilkan_post_per_id($id);
    while($post = mysqli_fetch_assoc($posts)){
      $judul_post = $post['judul_post'];
      $nama_penulis = $post['nama'];
      $waktu_post = $post['waktu_post'];
      $gambar_post = $post['gambar_post'];
      $isi_post = $post['isi_post'];
    }
}else{
  $judul_post = '';
  $nama_penulis = '';
  $waktu_post = '';
  $gambar_post = 'notfound';
  $isi_post = '<h1 style='.'font-size:150px;'.'>Not Found</h1>';
}

include "view/header.php";
//Bagian Slider
include "view/slider.php";
?>
<div class="row>">
  <div class="col-md-8">
    <div class="post">
          <div class="post">
              <h2 class="post-judul"> <?= $judul_post ?> </a></h2>
              <p class="author"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= $nama_penulis ?> <span class="glyphicon glyphicon-time" aria-hidden="true" style="margin-left:5px;"></span> <?= $waktu_post ?> </p>
              <img src='./asset/img/<?= $gambar_post ?>.png' class="post-gambar">
              <p class="post-isi"><?= $isi_post ?></p>
          </div>
    </div>
  </div>
  <!--Bagian Sidebar-->
  <?php include "view/sidebar.php" ?>

</div><!--End Of Row-->
<?php

include "view/footer.php";

?>
