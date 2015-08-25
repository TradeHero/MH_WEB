<?php 
include('auth.php');
include('headers.php');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
  <title>TradeHero Database Desk - Status</title>
  
  <style type="text/css">
		.modal {
			display:    none;
			position:   fixed;
			z-index:    1000;
			top:        0;
			left:       0;
			height:     100%;
			width:      100%;
			background: rgba( 255, 255, 255, .8 ) 
						url('th_load.gif') 
						50% 50% 
						no-repeat;
		}     
		
		body.loading {
			overflow: hidden;   
		}

		body.loading .modal {
			display: block;
		}
		</style>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">


		$(document).ready(function()
		{
			function load_content()
			{
				$.get(
					"get_status_content.php",
					function(data)
					{
						parse_content(data);
					},
					"json");
			}
			
			function parse_content(data)
			{
				$( "#users" ).text( "blabla" );
			}
			
			
									
			$("body").on({
				ajaxStart: function() { 
					$(this).addClass("loading"); 
				},
				ajaxStop: function() { 
					$(this).removeClass("loading"); 
				}    
			});
			
			
			load_content();
		});
		</script>
 </head>
 <body>

	<table>
		<tr>
			<td>New Users: </td><td id="users"></td>
			
			
		</tr>
	</table>

<br><br><br>
	Trades: <div class="trades">-</div>
	Last Trade: <div class="last_trade:">-</div>
	Money Traded: <div class="money_traded">-</div>
	Exchanges: <div class="exchanges">-</div>
	Securities:  <div class="securities">-</div>
	
	
	<div class="modal"><!-- Place at bottom of page --></div>

 </body>
</html>