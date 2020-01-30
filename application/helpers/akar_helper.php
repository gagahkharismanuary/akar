<?php 
function check_login($login){
	if(!$login)
	redirect('login');
}

function assets_url($path){
	return 'http://localhost/akar/assets/'.$path;
}

function admin_url($path){
	return 'http://localhost/akar/admin/'.$path;
}

function akar_url($path){
	return 'http://localhost/akar/'.$path;
}

function projects_url($path){
	return 'http://localhost/akar/projects/'.$path;
}
function products_url($path){
	return 'http://localhost/akar/products/'.$path;
}
function clients_url($path){
	return 'http://localhost/akar/clients/'.$path;
}
function web_url($path){
	return 'http://localhost/akar/web/'.$path;
}

?>