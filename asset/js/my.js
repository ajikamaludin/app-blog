//JQuery Effect Only
$(".slide > div:gt(0)").hide();

setInterval(function() {
  $('.slide > div:first')
    .fadeOut(0)
    .next()
    .fadeIn(2000)
    .end()
    .appendTo('.slide');
},  5000);

$( "#dashboard" ).click(function() {
  $( "#dashboard-admin" ).fadeToggle( "slow" );

  $( "#post-table-admin" ).fadeOut( "slow" );
  $( "#tag-table-admin" ).fadeOut( "slow" );
  $( "#user-table-admin" ).fadeOut( "slow" );
  $( "#komentar-table-admin" ).fadeOut( "slow" );
});

$( "#post-table" ).click(function() {
  $( "#post-table-admin" ).fadeToggle( "slow" );

  $( "#dashboard-admin" ).fadeOut( "slow" );
  $( "#tag-table-admin" ).fadeOut( "slow" );
  $( "#user-table-admin" ).fadeOut( "slow" );
  $( "#komentar-table-admin" ).fadeOut( "slow" );
});

$( "#tag-table" ).click(function() {
  $( "#tag-table-admin" ).fadeToggle( "slow" );

  $( "#dashboard-admin" ).fadeOut( "slow" );
  $( "#post-table-admin" ).fadeOut( "slow" );
  $( "#user-table-admin" ).fadeOut( "slow" );
  $( "#komentar-table-admin" ).fadeOut( "slow" );
});

$( "#user-table" ).click(function() {
  $( "#user-table-admin" ).fadeToggle( "slow" );

  $( "#dashboard-admin" ).fadeOut( "slow" );
  $( "#post-table-admin" ).fadeOut( "slow" );
  $( "#tag-table-admin" ).fadeOut( "slow" );
  $( "#komentar-table-admin" ).fadeOut( "slow" );
});

$( "#komentar-table" ).click(function() {
  $( "#komentar-table-admin" ).fadeToggle( "slow" );

  $( "#dashboard-admin" ).fadeOut( "slow" );
  $( "#post-table-admin" ).fadeOut( "slow" );
  $( "#tag-table-admin" ).fadeOut( "slow" );
  $( "#user-table-admin" ).fadeOut( "slow" );
});

$('#login-modal').modal('show');


//AJAX DATA Insert, Update, Delete
//Tambah Tag
$('#tambah_tag').on('click',function(){
  var nama_tag = $('#tambah_nama_tag').val();
  $.ajax({
  method: "POST",
  url: "functions/function.ajax.php",
  data: { nama_tag: nama_tag, aksi: "tambah_tag" },
  success: function(data){
    console.log('berhasil menambah');
    $('#tambah_nama_tag').val("");
    $('#table_tag').append(data);
    }
  })
});
//Hapus Tag
$(document).on('click','.hapus_tag',function(){
  //console.log($(this).attr('data-id-tag'));
  var id_hapus_tag = $(this).attr('data-id-tag');
  $.ajax({
  method: "POST",
  url: "functions/function.ajax.php",
  data: { id_tag : id_hapus_tag, aksi: "hapus_tag" },
  success: function(data){
    $("#tag_"+id_hapus_tag).remove();
    console.log(data);
    }
  })
});
//Edit Tag
