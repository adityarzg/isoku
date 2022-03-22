<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
							<img src="<?php echo base_url(); ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
						</div>

						<div class="card card-primary">
							<div class="card-header">
								<h4>Atur Ulang Kata Sandi</h4>
							</div>

							<div class="card-body">
								<p class="text-primary">Untuk alamat email <?= $this->session->userdata('reset_email'); ?></p>
								<?php
								$email = $this->input->get('email');
								$token = $this->input->get('token');
								$cek = $this->db->get_where('user_token', ['email' => $this->session->userdata('reset_email')])->row_array();
								if ($this->session->userdata('reset_email') != $cek['email']) {
									redirect('auth/ilegalReset/' . urlencode($token));
								}
								?>
								<form method="POST" action="<?= base_url('auth/changePassword'); ?>">
									<div class="form-group">
										<label for="password">New Password</label>
										<input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="new_password" tabindex="2" required>
										<div id="pwindicator" class="pwindicator">
											<div class="bar"></div>
											<div class="label"></div>
										</div>
									</div>

									<div class="form-group">
										<label for="password-confirm">Confirm Password</label>
										<input id="password-confirm" type="password" class="form-control" name="repeatnew_password" tabindex="2" required>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Atur Ulang Kata Sandi
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; Isoku <?= date('Y'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php $this->load->view('dist/_partials/js'); ?>