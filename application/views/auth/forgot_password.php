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
								<h4>Lupa Kata Sandi</h4>
							</div>

							<div class="card-body">
								<p class="text-muted">Kami akan mengirim link pengaturan ulang kata sandi ke alamat email anda</p>
								<form method="POST">
									<div class="form-group">
										<label for="email">Email</label>
										<input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Kirim
										</button>
										<a href="<?= base_url('auth') ?>" class="btn btn-warning btn-lg btn-block" tabindex="4">
											Kembali ke Halaman Login
										</a>
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