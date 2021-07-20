<style>
	th {
		font-weight: bold !important;
		text-transform: uppercase;
	}
</style>

<form method="get" action="<?= base_url("home/rangkuman") ?>" id="datefilter"
	  class="card card-body mb-2 d-flex flex-column">
	<label for="bulan" class="form-label">Pilih Bulan</label>
	<select name="bulan" id="bulan" class="form-control" onchange="$('#datefilter').submit()">
		<option value="00" <?= isset($_GET) && $_GET['bulan'] == '00' ? "selected" : "" ?>>Seluruh Bulan</option>
		<optgroup label="Filter Bulan">
			<option value="07" <?= isset($_GET) && $_GET['bulan'] == '07' ? "selected" : "" ?>>Juli</option>
			<option value="08" <?= isset($_GET) && $_GET['bulan'] == '08' ? "selected" : "" ?>>Agustus</option>
			<option value="09" <?= isset($_GET) && $_GET['bulan'] == '09' ? "selected" : "" ?>>September</option>
			<option value="10" <?= isset($_GET) && $_GET['bulan'] == '10' ? "selected" : "" ?>>Oktober</option>
			<option value="11" <?= isset($_GET) && $_GET['bulan'] == '11' ? "selected" : "" ?>>November</option>
			<option value="12" <?= isset($_GET) && $_GET['bulan'] == '12' ? "selected" : "" ?>>Desember</option>
			<option value="01" <?= isset($_GET) && $_GET['bulan'] == '01' ? "selected" : "" ?>>Januari</option>
			<option value="02" <?= isset($_GET) && $_GET['bulan'] == '02' ? "selected" : "" ?>>Februari</option>
			<option value="03" <?= isset($_GET) && $_GET['bulan'] == '03' ? "selected" : "" ?>>Maret</option>
			<option value="04" <?= isset($_GET) && $_GET['bulan'] == '04' ? "selected" : "" ?>>April</option>
			<option value="05" <?= isset($_GET) && $_GET['bulan'] == '05' ? "selected" : "" ?>>Mei</option>
			<option value="06" <?= isset($_GET) && $_GET['bulan'] == '06' ? "selected" : "" ?>>Juni</option>
		</optgroup>
	</select>
</form>

<div class="card">
	<div class="card-header bg-transparent">
		<h3 class="m-0">
			Rangkuman Daftar Hadir (<?= date('d M Y', strtotime($tglpertama)) ?>
			- <?= date('d M Y', strtotime($tglterakhir)) ?>)
		</h3>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-sm align-middle">
				<thead>
				<tr>
					<th>
						No
					</th>
					<th>
						Siswa
					</th>
					<th style="width: 20%">
						Total Alpa
					</th>
					<th style="width: 20%">
						Total Izin
					</th>
					<th style="width: 20%">
						Total Sakit
					</th>
					<th style="width: 20%">
						Total Terlambat
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($rangkuman as $key => $value) : ?>

					<?php
					$countAlpa = 0;
					$countSakit = 0;
					$countIzin = 0;
					$countTerlambat = 0;
					$id = $value['id'];
					?>
					<?php foreach ($value['detail'] as $datum): ?>
						<?php
						if ($datum->keterangan == "A"):
							$countAlpa++;
						elseif ($datum->keterangan == "S"):
							$countSakit++;
						elseif ($datum->keterangan == "I"):
							$countIzin++;
						elseif ($datum->keterangan == "T"):
							$countTerlambat++;
						endif;
						?>

					<?php endforeach; ?>

					<tr>
						<td style="vertical-align: middle;">
							<?= $key + 1 ?>.
						</td>
						<td nowrap style="vertical-align: middle;">
							<a href="<?= base_url("home/rangkuman_detail/$id") ?>" class="text-primary">
								<?= $value['nama'] ?>
							</a>
						</td>
						<td nowrap style="vertical-align: middle;">
							<?= $countAlpa ?> Hari
						</td>
						<td nowrap style="vertical-align: middle;">
							<?= $countIzin ?> Hari
						</td>
						<td nowrap style="vertical-align: middle;">
							<?= $countSakit ?> Hari
						</td>
						<td nowrap style="vertical-align: middle;">
							<?= $countTerlambat ?> Hari
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
