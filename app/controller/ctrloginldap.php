<?php
include '../../config/business.php';
$business = new Business();
$login = new Loginldap();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'login':
			$result = $login->login($post);
			$business->return = $result;
		break;
		case 'session':
			$result = $login->session($post->id_user, $post->token);
			$business->return = $result;
		break;
		default:
			$business->return->bool = false;
			$business->return->msg = 'Action not found';
		break;
	}
} else {
	$business->return->bolean = false;
	$business->return->msg = 'Action not found';		
}
echo json_encode((array) $business->return);
?>