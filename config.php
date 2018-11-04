<?php   		//Arquivo de conexão com a api//
	
	session_start();

	include('facebook-php-sdk/autoload.php');
	use Facebook\Facebook;
	use Facebook\Exceptions\FacebookResponseException;
	use Facebook\Exceptions\FacebookSDKException;

	$appId = '508798386252846'; //Your Code Api Facebook
	$appSecret = '485fbc6a59a324f3299187e5e83663f6'; //Your Secret Code Api Facebook
	$redirectUrl = 'http://localhost:8080/login-fix-facebook/';
	$fbPermission = array('email');

	$fb = new Facebook(array(
		'app_id'=> $appId,
		'app_secret'=> $appSecret,
		'default_graph_version' => 'v2.2'
	));

	$helper = $fb->getRedirectLoginHelper();

	try{
		if(isset($_SESSION['facebook_access_token'])){
			$accessToken = $_SESSION['facebook_access_token'];
		}else{
			$accessToken = $helper->getAccessToken();
		}
	}catch(FacebookResponseException $e){}
?>