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
});

$( "#post-table" ).click(function() {
  $( "#post-table-admin" ).fadeToggle( "slow" );

  $( "#dashboard-admin" ).fadeOut( "slow" );
  $( "#tag-table-admin" ).fadeOut( "slow" );
  $( "#user-table-admin" ).fadeOut( "slow" );
});

$( "#tag-table" ).click(function() {
  $( "#tag-table-admin" ).fadeToggle( "slow" );

  $( "#dashboard-admin" ).fadeOut( "slow" );
  $( "#post-table-admin" ).fadeOut( "slow" );
  $( "#user-table-admin" ).fadeOut( "slow" );
});

$( "#user-table" ).click(function() {
  $( "#user-table-admin" ).fadeToggle( "slow" );

  $( "#dashboard-admin" ).fadeOut( "slow" );
  $( "#post-table-admin" ).fadeOut( "slow" );
  $( "#tag-table-admin" ).fadeOut( "slow" );
});
$('#login-modal').modal('show');
