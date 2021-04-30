<style>
	th {
		font-weight: bold !important;
		text-transform: uppercase;
	}
</style>

<div class="card">
	<div class="card-header bg-transparent">
		<h3 class="m-0">
			Rangkuman Daftar Hadir (1 Jan 2021 - <?= date("d M Y") ?>)
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
								<?= $datum->nama ?>
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
