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
				<div class="row" id="table-striped">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col-md-10">
										<h4 class="card-title">Event <?= $event[0]["nama"] ?></h4>
									</div>
									<div class="col-md-2" style="text-align: end;">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
											Tambah Disposisi
										</button>
									</div>
									<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-scrollable" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalScrollableTitle">
														Form Tambah Disposisi</h5>
													<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
														<i data-feather="x"></i>
													</button>
												</div>
												<div class="modal-body">
													<form action="<?= base_url() ?>disposisi/create/<?= $event[0]["slug"] ?>" method="post" enctype="multipart/form-data">
														<input type="hidden" name="eventid" value="<?= $event[0]["id"] ?>">
														<input type="hidden" name="jenistransaksi" value="dropping">
														<div class="modal-body">
															<fieldset class="form-group">
																<label for=""><span style="color: maroon;">*</span>Kota</label>
																<select class="form-select" id="basicSelect" name="kantor_id" required>
																	<option selected disabled>Pilih Kota</option>
																	<?php foreach ($kota as $ko) : ?>
																		<option value="<?= $ko["id"]; ?>"><?= $ko["name"]; ?></option>
																	<?php endforeach; ?>
																</select>
															</fieldset>
															<label><span style="color: maroon;">*</span>Tanggal Transaksi</label>
															<div class="form-group">
																<input type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" name="tgltransaksi" required>
															</div>
															<label><span style="color: maroon;">*</span>Periode</label>
															<div class="form-group" required>
																<input type="month" name="periode" min="<?php echo date('Y') ?>-01" max="<?php echo date('Y-m'); ?>" class="form-control">
															</div>
															<fieldset class="form-group">
																<label for=""><span style="color: maroon;">*</span>Jenis Penyaluran</label>
																<select class="form-select" id="basicSelect" name="jenispenyaluran">
																	<option selected disabled>Pilih Jenis Penyaluran</option>
																	<option value="Penyaluran Buka Puasa">Penyaluran Buka Puasa</option>
																	<option value="Penyaluran Zakat Fitrah">Penyaluran Zakat Fitrah</option>
																	<option value="Penyaluran Fidyah">Penyaluran Fidyah</option>
																	<option value="Penyaluran Wakaf Pendidikan">Penyaluran Wakaf Pendidikan</option>
																	<option value="Penyaluran Pendidikan Alquran">Penyaluran Pendidikan Alquran</option>
																	<option value="Penyaluran Tebar Alquran">Penyaluran Tebar Alquran</option>
																	<option value="Penyaluran Wakaf Produktif">Penyaluran Wakaf Produktif</option>
																	<option value="Penyaluran Bekal Puasa">Penyaluran Bekal Puasa</option>
																	<option value="Penyaluran Kado Lebaran">Penyaluran Kado Lebaran</option>
																	<option value="Penyaluran Ezis/Event Ramadhan">Penyaluran Ezis/Event Ramadhan</option>
																	<option value="Penyaluran Operasional Ramadhan">Penyaluran Operasional Ramadhan</option>Daya</option>
																</select>
															</fieldset>
															<label><span style="color: maroon;">*</span>No. Disposisi KP</label>
															<div class="form-group" required>
																<input type="text" name="nodispkp" placeholder="No. Disposisi KP" class="form-control">
															</div>
															<label>No. Disposisi Perwakilan</label>
															<div class="form-group">
																<input type="text" name="nodisppwk" placeholder="No. Disposisi Perwakilan" class="form-control">
															</div>
															<label><span style="color: maroon;">*</span>Uraian</label>
															<div class="form-group">
																<textarea id="" cols="30" rows="4" name="uraian" placeholder="Uraian Event" class="form-control" required></textarea>
															</div>
															<label><span style="color: maroon;">*</span>PIC (Person in Charge)</label>
															<div class="form-group">
																<input type="text" placeholder="Person in Charge" name="pic" class="form-control" required>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<label><span style="color: maroon;">*</span>Nominal</label>
																	<div class="form-group">
																		<input type="text" name="debet" onkeypress="return number(event )" onBlur="formatCurrency(this, 'Rp ', 'blur');" onkeyup="formatCurrency(this, 'Rp ');" placeholder="Nominal" class="form-control" required>
																	</div>
																</div>
															</div>
															<label><span style="color: maroon;">*</span>Bukti Transaksi</label>
															<div class="form-group">
																<input type="file" name="bukti" class="form-control" required>
															</div>
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
							<div class="card-content">
								<!-- table striped -->
								<div class="table-responsive">
									<table class="table table-striped mb-0">
										<thead>
											<tr>
												<th>Kota</th>
												<th>Tanggal Transaksi</th>
												<th>Periode</th>
												<th>Jenis Transaksi</th>
												<th>Jenis Penyaluran</th>
												<th>No. Disposisi KP</th>
												<th>No. Disposisi Perwakilan</th>
												<th>Uraian</th>
												<th>PIC (Person in Charge)</th>
												<th>Debet</th>
												<th>Kredit</th>
												<th>Saldo</th>
												<th>Bukti Transaksi</th>
												<th>Checklist (oleh keuangan)</th>
												<th>LPJ</th>
												<th>Pengembalian Saldo</th>

											</tr>
										</thead>
										<tbody>
											<tr style="background-color: black; color: white;">
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>Disposisi melalui <?= $event[0]["disposisi"] ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td>Rp <?= number_format($event[0]["debet"], 0, ',', '.') ?></td>
												<td>Rp <?= number_format($event[0]["kredit"], 0, ',', '.') ?></td>
												<td>Rp <?= number_format($event[0]["saldo"], 0, ',', '.') ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<?php foreach ($disposisi as $dis) : ?>
												<tr>
													<td class="text-bold-500"><?= $dis["name"] ?></td>
													<td>
														<?php
														$tgltransaksi = new DateTime($dis["tgltransaksi"]);
														echo $tgltransaksi->format('d F Y');
														?>
													</td>
													<td class="text-bold-500">
														<?php
														$tgltransaksi = new DateTime($dis["periode"]);
														echo $tgltransaksi->format('F Y');
														?>
													</td>
													<td><?= $dis["jenistransaksi"] ?></td>
													<td>Penyaluran Fidyah</td>
													<td><?= $dis["nodispkp"] ?></td>
													<td><?= $dis["nodisppwk"] ?></td>
													<td><?= $dis["uraian"] ?></td>
													<td><?= $dis["pic"] ?></td>
													<td>Rp <?= number_format($dis["disposisi_debet"], 0, ',', '.') ?></td>
													<td>Rp <?= number_format($dis["disposisi_kredit"], 0, ',', '.') ?></td>
													<td></td>
													<td>
														<a href="<?= base_url('/public/bukti-transaksi/' . $dis["bukti"]) ?>" target="_blank">
															<img style="height: 150px;" src="<?= base_url('/public/bukti-transaksi/' . $dis["bukti"]) ?>" class="img-fluid" alt="erga">
														</a>
													</td>
													<td>
														<div class="form-check form-check-lg" style="display: flex; justify-content: center;">
															<div class="checkbox">
																<input data-id="<?= $dis['disposisi_id'] ?>" <?php if ($dis["checkkeu"] == true) {
																													echo "checked disabled";
																												} ?> type="checkbox" class="form-check-input form-check-success toggle-checkbox" id="checkbox<?= $dis['disposisi_id'] ?>">
															</div>

														</div>
													</td>
													<td>
														<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalLPJ">
															<i class="bi bi-file-earmark-richtext fs-2"></i>
														</button>
													</td>
													<td>
														<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalPS">
															<i class="bi bi-cash fs-2"></i>
														</button>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<script>
	function formatNumber(n) {
		return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	function formatCurrency(input, currency, blur) {
		// appends $ to value, validates decimal side
		// and puts cursor back in right position.
		// get input value
		var input_val = input.value;
		// don't validate empty input
		if (input_val === "") {
			return;
		}

		// original length
		var original_len = input_val.length;

		// initial caret position
		var caret_pos = input.selectionStart;

		// check for decimal
		if (input_val.indexOf(",") >= 0) {
			// get position of first decimal
			// this prevents multiple decimals from
			// being entered
			var decimal_pos = input_val.indexOf(",");

			// split number by decimal point
			var left_side = input_val.substring(0, decimal_pos);
			var right_side = input_val.substring(decimal_pos);

			// add commas to left side of number
			left_side = formatNumber(left_side);

			// validate right side
			right_side = formatNumber(right_side);

			// On blur make sure 2 numbers after decimal
			if (blur === "blur") {
				right_side += "00";
			}

			// Limit decimal to only 2 digits
			right_side = right_side.substring(0, 2);

			// join number by .
			input_val = currency + left_side + "," + right_side;
		} else {
			// no decimal entered
			// add commas to number
			// remove all non-digits
			input_val = formatNumber(input_val);
			input_val = currency + input_val;

			// final formatting
			if (blur === "blur") {
				input_val += ",00";
			}
		}

		// send updated string to input
		input.value = input_val;

		// put caret back in the right position
		var updated_len = input_val.length;
		caret_pos = updated_len - original_len + caret_pos;
		input.setSelectionRange(caret_pos, caret_pos);

		function number(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
	}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('.toggle-checkbox').on('change', function() {
			var id = $(this).data('id');
			var isChecked = $(this).prop('checked');

			// Perbarui status checkbox
			$(this).prop('disabled', true); // Membuat checkbox menjadi disabled setelah diklik
			$(this).prop('checked', true); // Mengecek checkbox setelah diklik

			// Kirim AJAX request untuk memperbarui atribut checkkeu di server
			$.ajax({
				url: '<?= base_url('disposisi/update_checkkeu') ?>', // Ganti dengan URL yang sesuai di server Anda
				method: 'POST',
				data: {
					id: id,
					isChecked: isChecked
				},
				success: function(response) {
					console.log(response);
					// Handle response jika diperlukan
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					// Handle error jika diperlukan
				}
			});
		});
	});
</script>
