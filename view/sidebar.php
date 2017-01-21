<!--Bagian SideBar -->
  <div class="col-md-4">

    <div class="side-menu">
      <h4>Cari Disini : </h4>
      <form action="" method="get">
        <input type="text" name="cari" class="form-control" placeholder="Cari disini . . . ">
        <input class="btn btn-default" style="margin-top:7px;" type="submit" value=" Cari ">
      </form>
    </div>

    <div class="side-menu">
      <h3 class="post-judul"> Archive</h3>
      <details>
        <summary>
          Bulan
        </summary>
        <p>
          Juli
        </p>
        <p>
          Juni
        </p>
      </details>
    </div>

    <div class="side-menu">
      <h3 class="post-judul"> Tag </h3>
      <?php foreach ($tags as $tag) { ?>
          <h4 style="display:inline;" ><span class="label label-info"><?= $tag['nama_tag'] ?></span></h4>
      <?php } ?>
    </div>

  </div>
<!--Akhir Bagian SideBar -->
