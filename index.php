<?php
include "core/init.php";

include "view/header.php";

//Bagian Slider
include "view/slider.php";
?>


<div class="row">
  <div class="col-md-8">
<?php foreach ($posts as $post) { ?>
    <div class="post">
        <h2 class="post-judul"><a href='./post.php?id=<?=$post['id_post']?>'> <?= $post['judul_post'] ?> </a></h2>
        <p class="author">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= $post['nama'] ?>
          <span class="glyphicon glyphicon-time" aria-hidden="true" style="margin-left:5px;"></span> <?= $post['waktu_post'] ?>
          <span class="glyphicon glyphicon-comment" aria-hidden="true" style="margin-left:5px;"></span> 4 Komentar
        </p>
        <img src='./asset/img/<?= $post['gambar_post']?>.png' class="post-gambar">
        <p class="post-isi"><?= potong_900($post['isi_post']) ?></p>
        <a href='./post.php?id=<?=$post['id_post']?>' class="btn btn-primary readmore-btn">Read More </a>
    </div>
    <div class="footer-post">
      <div class="tag">
        <p><span class="glyphicon glyphicon-tag" aria-hidden="true" style="margin-right:5px;"></span><?= $post['nama_tag']; ?><p>
      </div>
    </div>
<?php } ?>

  </div>

<!--Bagian Sidebar-->
<?php include "view/sidebar.php" ?>

</div> <!--end of div of class row-->
<?php

include "view/footer.php";

?>
