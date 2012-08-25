<?
	require '../facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '437643236286765',
		'secret' => '75a0b289f95af9def1b9bd0ebc15fba5',
		));
	$uid = $facebook->getUser();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<title>泰山</title>
		<style type="text/css">
			#canvas
				{
					z-index: 1;
					position: absolute;
					top: 0px;
					left: 0px;
				}
			#fb-like-box
				{
					z-index: 2;
					position: absolute;
					top: 532px;
					left: 420px;
				}
			#taisun-message
				{
					z-index: 3;
					position: absolute;
					top: 630px;
					left: 324px;				
				}
			#j-button
				{
					z-index: 4;
					position: absolute;
					top: 800px;
					left: 365px;				
				}
			#t-message
				{
					border-width: 0px;
					resize: none; 
				}
		</style>
		<script language="JavaScript">
		<!--
			function check() 
					{
  						var tmessage = document.getElementById('t-message').value;
	   					if (tmessage=='')
   							{
         						alert ('您未輸入中元節要買八寶粥的原因！');
       							return false;
    						} else {
    							document.getElementById('t-join').submit();
    						}
					}
		//-->
		</script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
  						js = d.createElement(s); js.id = id;
  						js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=437643236286765";
  						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
		</script>
		<div id="canvas"><img src="FB_1.jpg" border="0"><div>
		<div id="fb-like-box" class="fb-like-box" 
				data-href="https://www.facebook.com/TaisunGP/" 
				data-width="300"
				data-show-faces="false" 
				data-stream="false" 
				data-header="false"
				data-border-color="FFFFFF">
		</div>
		<form id="t-join" name="t-join" method="post" action="http://www.hr.com.tw/app/taisun/result.php">
		<div id="taisun-message">
			<textarea id="t-message" name="t-message" cols="53" rows="7"></textarea>
			<input type="hidden" name="userid" value="<?echo $uid; ?>">
		</div>
		<div id="j-button">
			<a href="#" onclick="check();"><img src="join_button.png" border="0"></a>
		</div>
		</form>
	</body>
</html>
