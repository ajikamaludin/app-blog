<!--Bagian Slider-->
<div class="row">
  <div class="slide">
<?php foreach ($slider as $slide) { ?>
    <div name='slide-<?= $slide['id_post']?>' onclick="window.location='./post.php?id=<?= $slide['id_post']?>'">
      <img src="./asset/img/<?= $slide['gambar_post']?>.png" class="img-slide">
      <div class="text-slide">
        <h2> <?= $slide['judul_post']?> </h2>
        <p> <?= potong_300($slide['isi_post'])?></p>
      </div>
    </div>
<?php } ?>
  </div>
</div>
<!-- Akhir Bagian Slider-->
