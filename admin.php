<?php
session_start();

include "core/init.php";

$error = '';

if (isset($_POST['submit'])) {
  
	$user = $_POST['user'];
	$password = $_POST['password'];

	if (!empty(trim($user)) && !empty(trim($password))) {

		if (cek_data($user, $password)){
			   $_SESSION['user'] = $user;
		}else{
			$error = 'Anda punya masalah hidup saat login !! ';
		}

	}else{
		$error = 'Username dan Password wajib diisi';
	}

}

$user = isset($_SESSION['user']);
if(!$user){

?>
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
              <form>
                  <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <?php echo $error;?>
                  <button type="submit" name="submit" class="btn btn-default">Login</button>
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
          <li role="presentation" id="tag-table"><a href="#">Tag</a></li>
          <li role="presentation" id="user-table"><a href="#">Users</a></li>
          <li role="presentation"><a href="#">Keluar</a></li>
        </ul>
      </div>
      <!--End Of Admin Menu-->
      <!--div kosong-->
      <div class="col-md-1"></div>
      <!--Admin View-->
      <div class="col-md-8 admin-panel2" id="view-panel">
        <p id="halo-admin" style="font-size:20px;font-weight:bold;">
          Selamat Datang Admin
        </p>

        <!--This Is Dashboard Admin-->
        <div id="dashboard-admin">
          <div class="dashboard-admin-main" style="background-color: #adf177;">
              <h1>Posting : 10</h1>
              <a href="#"><span class="glyphicon glyphicon-chevron-right arrow" aria-hidden="true"></span></a>
          </div>
          <div class="dashboard-admin-main" style="background-color:#a360df;">
              <h1>Komentar : 10</h1>
              <a href="#"><span class="glyphicon glyphicon-chevron-right arrow" aria-hidden="true"></span></a>
          </div>
        </div>
        <!--End Of This Is Dashboard Admin-->

        <!--This Is Post Table View Isi Post-->
        <div class="post-table" id="post-table-admin">
          <table class="table table-hover">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Konten</th>
              <th>Gambar</th>
              <th>Tanggal Post</th>
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1</td>
              <td>Berita Pertama</td>
              <td>Iki Isi ... isi ... isi ...</td>
              <td>sample.png</td>
              <td>22/12/2017</td>
              <td>Hapus Edit</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Berita Kedua</td>
              <td>Iki Isi ... isi ... isi ...</td>
              <td>sample.png</td>
              <td>22/12/2017</td>
              <td>Hapus Edit</td>
            </tr>
          </table>
        </div>
        <!--End Of This Is Post Table View Isi Post-->

        <!--This Is Tag-->
        <div class="post-table" id="tag-table-admin">
          <table class="table table-hover">
            <tr>
              <th>No</th>
              <th>ID Tag</th>
              <th>Nama Tag</th>
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1</td>
              <td>1</td>
              <td>Berita</td>
              <td>Hapus Edit</td>
            </tr>
            <tr>
              <td>2</td>
              <td>3</td>
              <td>Komputer</td>
              <td>Hapus Edit</td>
            </tr>
          </table>
        </div>
        <!--End Of Tag-->

        <!--This Is User-->
        <div class="post-table" id="user-table-admin">
          <table class="table table-hover">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1</td>
              <td>Aji Kamaludin</td>
              <td>ajikamaludin</td>
              <td type="password">ajikamaludin</td>
              <td>Hapus Edit</td>
            </tr>
          </table>
        </div>
        <!--End Of User-->

        </div>
      </div>
      <!--End Of Admin View-->

    </div>
  </div>
</body>
<?php include "view/footer.php" ?>
</html>
<?php } ?>
