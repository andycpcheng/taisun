<?
	$db_link = mysql_connect('localhost', 'root', '09170527');
	if (!$db_link) {
	    die('Could not connect: ' . mysql_error());
	}
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db("TAISUN", $db_link);
	
	function genSerial()
	{
    	$password_len = 10;
	    $password = '';

    	$word = '0123456789';
	    $len = strlen($word);

    	for ($i = 0; $i < $password_len; $i++) {
        	$password .= $word[rand() % $len];
	    }

    	return $password;
	}
	$story="中元節要買八寶粥，因為".$_POST['t-message'];
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
			#taisun-message
				{
					z-index: 2;
					position: absolute;
					top: 240px;
					left: 324px;
					width: 393px;
					height: 92px;
					overflow:auto;
				}
			#taisun-serial
				{
					z-index: 3;
					position: absolute;
					top: 458px;
					left: 320px;
					width: 400px;
					height: 50px;
					text-align: center;
					font-size: 20px;	
				}
		</style>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>
			window.fbAsyncInit = function() {
				FB.init({
      				appId      : '437643236286765', // App ID
					status     : true, // check login status
					cookie     : true, // enable cookies to allow the server to access the session
					xfbml      : true  // parse XFBML
				});
			    // Additional initialization code here
			};
			// Load the SDK Asynchronously
			(function(d){
				var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement('script'); js.id = id; js.async = true;
				js.src = "//connect.facebook.net/en_US/all.js";
				ref.parentNode.insertBefore(js, ref);
			}(document));
		</script>
		<script type="text/javascript">
//			$(document).ready(
//				function() {
					//$("#canvas").fadeOut();
//					ShowFeed();
//				}
//			);			
			
			function ShowFeed() {
				var obj = {
  			        method: 'feed',
  			        link: 'https://apps.facebook.com/taisun_mixed_congee/',
  			        picture: 'http://www.hr.com.tw/app/taisun/FB_USER.jpg',
          			name: '實在足澎湃，普渡八寶好料傳出來',
          			caption: '好料最有心，拜拜更順心！中元普渡傳八寶，非吃不可讚起來！',
          			description: '<? echo $story; ?>'
        		};

        		function callback(response) {
   					document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
       			}

				//FB.ui(obj, callback);
				FB.ui(obj);
			};
		</script>
<?
	if (isset($_POST['userid']) && !empty($_POST['userid'])) {
		$q_Check = mysql_query("
								SELECT
										uid
								FROM
										campaign
								WHERE
										uid='".$_POST['userid']."'
							");
//		if (mysql_numrows($q_Check)==0) {
			$q_Add = mysql_query("
									INSERT INTO
										campaign
										(
											uid,
											message
										)
									VALUES
										(
											'".$_POST['userid']."',
											'".$_POST['t-message']."'
										)
								");
//		}
	}
?>
		<div id="canvas"><img src="FB_RESULT.jpg" border="0" onClick="ShowFeed();return false;"><div>
		<div id="taisun-message"><? echo $_POST['t-message']; ?></div>
		<div id="taisun-serial"><? echo $_POST['userid']; ?></div>
		<p id='msg'></p>
	</body>
</html>