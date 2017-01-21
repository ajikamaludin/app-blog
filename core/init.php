<?php
require_once "./functions/db.php";
require_once "./functions/crud.php";
require_once "./functions/function.php";

//Variable Panggil
$posts = tampilkan_post();
$slider = tampil_slide_3();
$tags = tampilkan_tag();
$komentars = tampilkan_komentar();
$users = tampilkan_users();

?>
