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
    					<div class="col-12 col-md-12 order-md-1 order-last">
    						<h3>Laporan Pertanggung Jawaban Penggunaan Dana Program Ramadhan 1445 H</h3>
    					</div>
    				</div>
    			</div>
    			<section class="section">
    				<div class="card">
    					<div class="card-header">
    						<div class="row">
    							<div class="col-10">
    								<?php if ($this->session->flashdata('success')) : ?>
    									<div class="container">
    										<div class="row">
    											<div class="col-md-6">
    												<div class="alert alert-success color-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
    													<?= $this->session->flashdata('success') ?>
    													<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    												</div>
    											</div>
    										</div>
    									</div>
    								<?php endif ?>
    							</div>
    							<!-- <div class="col-2" style="text-align: right;">
    								<a href="<?php base_url() ?>dashboard/tambah" class="btn btn-primary">Tambah Event</a>
    							</div> -->
    							<div class="col-md-2" style="text-align: end;">
    								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
    									Tambah Event
    								</button>
    							</div>
    							<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    								<div class="modal-dialog modal-dialog-scrollable" role="document">
    									<div class="modal-content">
    										<div class="modal-header">
    											<h5 class="modal-title" id="exampleModalScrollableTitle">
    												Form Tambah Event</h5>
    											<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
    												<i data-feather="x"></i>
    											</button>
    										</div>
    										<div class="modal-body">
    											<form action="<?= base_url() ?>event/create" method="post">
    												<input type="hidden" name="eventid" value="<?= $event[0]["id"] ?>">
    												<div class="modal-body">
    													<div class="form-group">
    														<label for="email-id-vertical">Event</label>
    														<input type="text" class="form-control" name="nama" placeholder="Nama Event" required>
    													</div>
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
    												<div class="modal-footer">
    													<button type="submit" class="btn btn-primary">
    														<i class="bx bx-x d-block d-sm-none"></i>
    														<span class="d-none d-sm-block">Kirim</span>
    													</button>
    													<button type="reset" class="btn btn-secondary ml-1">
    														<i class="bx bx-check d-block d-sm-none"></i>
    														<span class="d-none d-sm-block">Reset</span>
    													</button>
    												</div>
    											</form>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="card-body">
    						<table class="table table-striped" id="table1">
    							<thead>
    								<tr>
    									<th>Event</th>
    									<th>Disposisi</th>
    									<th>Debet</th>
    									<th>Kredit</th>
    									<th>Saldo</th>
    								</tr>
    							</thead>
    							<tbody>
    								<?php foreach ($event as $gu) : ?>
    									<tr>
    										<td><a href="<?= base_url() ?>event/index/<?= $gu["slug"] ?>"><?= $gu["nama"] ?></a></td>
    										<td>Disposisi Melalui <?= $gu["disposisi"] ?></td>
    										<td>Rp <?= number_format($gu['debet'], 0, ',', '.') ?></td>
    										<td>Rp <?= number_format($gu['kredit'], 0, ',', '.') ?></td>
    										<td>Rp <?= number_format($gu['saldo'], 0, ',', '.') ?></td>
    									</tr>
    								<?php endforeach; ?>
    							</tbody>
    						</table>
    					</div>
    				</div>

    			</section>
    		</div>
    	</div>
    </div>
