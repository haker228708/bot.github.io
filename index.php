<?php
$confirmation_token = 'af873f5c'
function vk_msg_send($peer_id,$text){
	$request_params = array(
		'message' => $text, 
		'peer_id' => $peer_id, 
		'access_token' => "TOKEN",
		'v' => '5.87' 
	);
	$get_params = http_build_query($request_params); 
	file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
}
$data = json_decode(file_get_contents('php://input'));
switch ($data->type) {  
	case 'confirmation': 
		echo $confirmation_token; 
	break;  
		
	case 'message_new': 
		$message_text = $data -> object -> text;
		$message_text = $data -> object -> peer_id;
		if ($message_text == "Привет" || $message_text == "привет"){
			vk_msg_send($chat_id, "Привет! Я новый помощник этой ролевой! Пока что количество моих умений примерно равно нулю, но я обязательно скоро узнаю больше!");
		}
		if ($message_text == "умения"){
			vk_msg_send($chat_id, "Равны нулю!");
		}
		echo 'ok';
	break;
}
?>