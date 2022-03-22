<?php
function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		$ci->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda Belum Login! Silahkan Login Terlebih Dahulu</div>');
		redirect('auth');
	}
}
