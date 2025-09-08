<div id="app">
	<!-- Sidebar -->
	<?php $this->load->view('layout/sidebar'); ?>
	<div id="main">
		<header class="mb-3">
			<a href="#" class="burger-btn d-block d-xl-none">
				<i class="bi bi-justify fs-3"></i>
			</a>
		</header>

		<div class="page-heading">
			<div class="page-title">
				<div class="row">
					<div class="col-12 col-md-12 order-md-1 order-last mb-3" style="text-align: center;">
						<h3>Tambah Event Program Ramadhan 1445 H</h3>
						<!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
					</div>
				</div>
			</div>
			<section class="section">
				<div class="row d-flex justify-content-center">
					<div class="col-6">
						<div class="card">
							<div class="card-body">
								<form class="form form-vertical" method="POST" action="<?= base_url() ?>event/create">
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="email-id-vertical">Event</label>
													<input type="text" class="form-control" name="nama" placeholder="Nama Event" required>
												</div>
											</div>
											<div class="col-12">
												<fieldset class="form-group">
													<label for="">Disposisi Melalui</label>
													<select class="form-select" id="basicSelect" name="disposisi">
														<option selected disabled>Pilih Direktorat</option>
														<option value="Direktorat Pendayagunaan">Direktorat Pendayagunaan</option>
														<option value="Direktorat Pemasaran dan Kemitraan">Direktorat Pemasaran dan Kemitraan</option>
														<option value="Direktorat Sumber Daya">Direktorat Sumber Daya</option>
													</select>
												</fieldset>
											</div>
											<div class="col-12 d-flex justify-content-end">
												<button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
												<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
