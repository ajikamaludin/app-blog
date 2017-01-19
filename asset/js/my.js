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
    /*console.log(data);*/
      if(data != 0){
        console.log("Nilai 1 data masuk");
        $('#tambah_nama_tag').val("");
        $('#table_tag').append(data);
        $('#tag-ditambahkan').fadeIn("slow");
        $('#tag-ditambahkan').fadeOut( "slow");
        $('#tambah_nama_tag').val("");
      }else{
        console.log("Nilai 0 data gagal masuk");
        $('#tag-gagal-ditambahkan').fadeIn("slow");
        $('#tag-gagal-ditambahkan').fadeOut( "slow");
        $('#tambah_nama_tag').val("");
      }
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
//Show Edit Tag
$(document).on('click','.edit_tag',function(){
  //console.log($(this).attr('data-id-tag'));
  var id_edit_tag = $(this).attr('data-id-tag');
  $.ajax({
  method: "POST",
  url: "functions/function.ajax.php",
  data: { id_tag : id_edit_tag, aksi: "show_edit_tag" },
  success: function(data){
    console.log(data);
    //$('#tag_'+id_edit_tag).append(data);
    }
  })
});
