<?php
session_start();

include "core/init.php";

$error = '';

if (isset($_POST['submit_login'])) {

	$user = $_POST['user'];
	$password = $_POST['password'];

	if (!empty(trim($user)) && !empty(trim($password))) {

		if (login_user($user, $password)){
			   $_SESSION['user'] = $user;
         header("Refresh:0");
		}else{
			$error = 'Anda Punya Masalah Hidup Saat Login !!! ';
		}

	}else{
		$error = 'Username dan Password wajib diisi';
	}

}

$user = isset($_SESSION['user']);
if(!$user){

?>
<!--Headernya Waktu Login-->
  <!DOCTYPE html>
  <html>
  <head>
    <title> A J I B L O G : Selamat Datang Admin </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
    <link href="./asset/css/my.css" rel="stylesheet">
  </head>
    <body>
    <?php include "view/navbar.php" ?>
    <p class="no-session">
      No Session();
    </p>

        <!-- Modal Login -->
      <div class="modal fade bs-example-modal-sm" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Login Panel</h4>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                  <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <?php echo "<p>$error</p>";?>
                  <button type="submit" name="submit_login" class="btn btn-default">Login</button>
                </form>
            </div>

          </div>
        </div>
      </div>
      <!--End Modal Login -->

    </body>
    <?php include "view/footer.php" ?>
  </html>

<?php
}else{

?>
<!--Headernya Sudah Login-->
<!DOCTYPE html>
<html>
<head>
  <title> A J I B L O G : Selamat Datang Admin </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./asset/css/bootstrap.css" rel="stylesheet">
  <link href="./asset/css/my.css" rel="stylesheet">
</head>
<body>
  <?php include "view/navbar.php" ?>
  <div class="container">
    <div class="row">
      <!--Admin Menu-->
      <div class="col-md-3 admin-panel">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation" id="dashboard"><a href="#">Dashboard</a></li>
          <li role="presentation" id="post-table"><a href="#">Post</a></li>
          <li role="presentation" id="komentar-table"><a href="#">Komentar</a></li>
          <li role="presentation" id="tag-table"><a href="#">Tag</a></li>
          <li role="presentation" id="user-table"><a href="#">Users</a></li>
          <li role="presentation" id="logout_keluar"><a href="#">Keluar</a></li>
        </ul>
      </div>
      <!--End Of Admin Menu-->


			<div class="col-md-9 admin-panel2" id="view-panel">


        <!--This Is Dashboard Admin-->
        <div id="dashboard-admin">
          <p id="halo-admin">
            Selamat Datang Admin
          </p>
          <div class="dashboard-admin-main" style="background-color: #adf177;">
              <h1>Posting : <?php jumlah_post('post')?></h1>
              <a href="#" ><span class="glyphicon glyphicon-chevron-right arrow" aria-hidden="true"></span></a>
          </div>
          <div class="dashboard-admin-main" style="background-color:#a360df;">
              <h1>Komentar : <?php jumlah_post('komentar')?></h1>
              <a href="#" id="komentar-table"><span class="glyphicon glyphicon-chevron-right arrow" aria-hidden="true"></span></a>
          </div>
					<div class="dashboard-admin-main" style="background-color: #77f1c9;">
							<h1>Users : <?php jumlah_post('users')?></h1>
							<a href="#" id="user-table"><span class="glyphicon glyphicon-chevron-right arrow" aria-hidden="true"></span></a>
					</div>
        </div>
        <!--End Of This Is Dashboard Admin-->

        <!--This Is Post Table View Isi Post-->
        <div class="post-table" id="post-table-admin">
          <p id="halo-admin">
            Post
          </p>
          <button class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#tambah-post">Tambah Post</button>
          <table class="table table-hover">
            <tr>
              <th>Judul</th>
              <th>Konten</th>
              <th>Gambar</th>
              <th>Tanggal Post</th>
							<th>Tag</th>
              <th>Aksi</th>
            </tr>
    <?php foreach ($posts as $post) {?>
            <tr>
              <td><?= $post['judul_post']?></td>
              <td><?= potong_300($post['isi_post'])?></td>
              <td><?= $post['gambar_post']?></td>
              <td><?= $post['waktu_post']?></td>
							<td><?= $post['nama_tag']?></td>
              <td>
								<button class="edit_post" data-id-tag="<?= $tag['id_post']?>">
									Edit
								</button>
								<button class="hapus_tag" data-id-tag="<?= $tag['id_tag']?>" >
									Hapus
								</button>
							</td>
            </tr>
    <?php } ?>
          </table>
        </div>
        <!--End Of This Is Post Table View Isi Post-->


        <!--This Is Komentar Table View -->
        <div class="post-table" id="komentar-table-admin">
          <p id="halo-admin">
            Komentar
          </p>
          <table class="table table-hover">
            <tr>
              <th>ID Post</th>
              <th>Post</th>
              <th>Komentar</th>
							<th>Waktu Komentar</th>
              <th>Aksi</th>
            </tr>
	<?php foreach( $komentars as $komentar ) { ?>
            <tr>
              <td><?= $komentar['id_post']?></td>
              <td><?= $komentar['judul_post']?></td>
              <td><?= $komentar['isi_komentar']?></td>
							<td><?= $komentar['waktu_komentar']?></td>
              <td>Hapus Edit Balas</td>
            </tr>
	<?php } ?>
          </table>
        </div>
        <!--End Of This Is komentar Table View-->


        <!--This Is Tag Table View-->
        <div class="post-table" id="tag-table-admin">
          <p id="halo-admin">
            Tag
          </p>
          <button class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#tambah-tag">Tambah Tag</button>
          <table class="table table-hover">
					<tbody id="table_tag">
            <tr>
              <th>ID Tag</th>
              <th>Nama Tag</th>
              <th>Aksi</th>
            </tr>
		<?php	foreach ($tags as $tag) { ?>
            <tr id="tag_<?= $tag['id_tag']?>">
              <td><?= $tag['id_tag']?></td>
              <td><?= $tag['nama_tag']?></td>
              <td>
								<button class="edit_tag" data-id-tag="<?= $tag['id_tag']?>">
									Edit
								</button>
								<button class="hapus_tag" data-id-tag="<?= $tag['id_tag']?>" >
									Hapus
								</button>
							</td>
            </tr>
		<?php } ?>
					</tbody>
          </table>

        </div>
        <!--End Of Tag Table View-->

        <!--This Is User Table View-->
        <div class="post-table" id="user-table-admin">
          <p id="halo-admin">
            User
          </p>
          <button class="btn btn-primary tombol-tambah">Tambah User</button>
          <table class="table table-hover">
            <tr>
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
	<?php foreach($users as $user) {?>
            <tr>
              <td><?= $user['nama']?></td>
              <td><?= $user['user_name']?></td>
              <td type="password">password</td>
              <td>Hapus Edit</td>
            </tr>
	<?php } ?>
          </table>
        </div>
        <!--End Of User Table View-->

        </div>
      </div>
      <!--End Of Admin View-->

<!--Kumpulan Modal Tambah Data -->

<!-- Modal Tambah Post -->
<div class="modal fade" id="tambah-post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Post</h4>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label >Judul Post </label>
            <input type="text" class="form-control" id="tambah_judul_post">
          </div>
          <div class="form-group">
            <label>Isi Post</label>
            <textarea class="form-control" rows="6" id="editor2" name="editor"></textarea>
          </div>
          <div class="form-group">
            <label>Gambar : (Belum di fungsikan)</label>
            <input type="file">
            <p class="help-block">Gambar Yang Ditampilka Bersama dengan post.</p>
          </div>
          <button  class="btn btn-default" name="tambah_post" id="tambah_post">Tambah</button>

      </div>
    </div>
  </div>
</div>
<!-- Akhir Dari Modal Tambah Post -->

<!-- Modal Tambah Tag -->
<div class="modal fade" id="tambah-tag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Tag</h4>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label >Nama Tag </label>
            <input type="text" class="form-control" id="tambah_nama_tag">
          </div>

          <button  class="btn btn-default" name="tambah_tag" id="tambah_tag">Tambah</button>
					<div id="tag-ditambahkan" >Tag Ditambahkan</div>
					<div id="tag-gagal-ditambahkan" >Tag Gagal Ditambahkan</div>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Dari Modal Tambah Tag -->

<!-- Modal Edit Tag -->
<div class="modal fade" id="edit_tag-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Edit Tag</h4>
      </div>
      <div class="modal-body" id="modal-body-tag">

      </div>
    </div>
  </div>
</div>
<!-- Akhir Dari Modal Edit Tag -->

<!--Akhir Dari Kumpulan Modal Tambah Data -->

    </div>
  </div>
</body>
<?php include "view/footer.php" ?>
</html>
<?php } ?>
