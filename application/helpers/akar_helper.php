<?php 
function check_login($login){
	if(!$login)
	redirect('login');
}

function assets_url($path){
	return 'http://localhost/akar/assets/'.$path;
}
?>