
<?php
include('../connection/session.php');
include('../include/number_generator.php');
include('../connection/connection.php');
require('../encode.php');
$enc= new Encryption;
$encdata=$enc->safe_b64encode($login_session );
if(!isset($login_session))
{
    location:index.php;
    exit;
}



?>
<html>
<title>
	DEPARTMENT MANAGEMENT SYSTEM
</title>
<head>
<link rel="stylesheet" href="../css/table.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="../css/menu.css" type="text/css"/>
<link rel="stylesheet" href="../css/form.css" type="text/css"/>
<script src="javascript/printdiv.js" type="text/javascript"></script>
<script src="jquery-3.2.1.min.js"></script> 

<script>
$(function(){
        // Check the initial Poistion of the Sticky Header
        var stickyHeaderTop = $('.menu').offset().top;
 
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('.menu').css({"position":"fixed", "top": "0px","z-index":"1000", "opacity":"0.7"});
                } else {
                        $('.menu').css({position: 'static', top: '0px', "opacity":"1"});
                }
        });
  });
  $(function(){
		var stickyHeaderTop = $('.menu').offset().top;
 
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('.menu').css({"position":"fixed", "top": "0px","z-index":"1000", "opacity":"0.7"});
                } else {
                        $('.menu').css({position: 'static', top: '0px', "opacity":"1"});
                }
        });
  });
$(document).ready(function()
{
$("#viewtime").click(function()
	{
		$("#addclass").css({"display":"block"});
	});
	
});

	</script>
<script>
   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>	
	

	<style>
		
		
	
	</style>
</head>




