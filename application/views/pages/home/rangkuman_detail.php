<style>
	#stat {
		position: fixed;
		bottom: 10px;
		right: 10px;
	}
</style>

<div class="card card-body mb-4">
	<a href="<?= base_url() ?>" class="d-flex align-items-center">
		<i class="fa fa-angle-left fa-2x mr-3"></i> Kembali
	</a>
</div>

<div class="card card-body">
	<div class="d-flex flex-wrap justify-content-between align-items-center">
		<h2 class="m-0"><?= $nama ?></h2>
	</div>
	<hr>

	<?php
	$countAlpa = 0;
	$countSakit = 0;
	$countIzin = 0;
	$countTerlambat = 0;
	?>
	<?php foreach ($detail as $datum): ?>
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
	<table>
		<tr>
			<td style="width: 50px;">
				<?= $countAlpa ?>
			</td>
			<td>Hari Alpa</td>
		</tr>
		<tr>
			<td style="width: 50px;">
				<?= $countTerlambat ?>
			</td>
			<td>Hari Terlambat</td>
		</tr>
		<tr>
			<td style="width: 50px;"><?= $countSakit ?></td>
			<td>Hari Sakit</td>
		</tr>
		<tr>
			<td style="width: 50px;"><?= $countIzin ?></td>
			<td>Hari Izin</td>
		</tr>
	</table>
	<hr>
	<table class="table table-hover">
		<thead>
		<tr>
			<th width="1" class="font-weight-bold text-uppercase">
				No
			</th>
			<th class="font-weight-bold text-uppercase">
				Tanggal
			</th>
			<th class="font-weight-bold text-uppercase">
				Status
			</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($detail as $index => $row) : ?>
			<tr>
				<td>
					<?= $index + 1 ?>
				</td>
				<td>
					<?= date("d M Y", strtotime($row->date)) ?>
				</td>
				<td>
					<?= $row->keterangan ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>

<div id="stat">
	Laporan disusun tanggal <?= date("d M Y") ?>
</div>
