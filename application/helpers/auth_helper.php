<?php

//mencegah user yang belum login
function auth()
{
	$ci = get_instance();

	$level_id = $ci->session->userdata('id_user');

	if (!$level_id) {
		redirect('login');
	}
}

//mencegah akses halaman login bagi user yang sudah terautentikasi/sudah login 
function guest()
{
	$ci = get_instance();

	if ($ci->session->userdata('id_user')) {
		redirect('dashboard');
	}
}

//izin akses halaman berdasarkan level_id dari user / contoh : guard([1,2]);
function guard($level_id = [])
{
	$ci = get_instance();
	
	$level = $ci->session->userdata('level_id');

	if (!in_array($level, $level_id)) {
		redirect('error404');
	}
}
