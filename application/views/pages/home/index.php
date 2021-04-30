<style>
	th {
		font-weight: bold !important;
		text-transform: uppercase;
	}
</style>

<form method="get" action="<?= base_url("home") ?>" id="datefilter" class="card card-body mb-2 d-flex flex-column">
	<input type="date" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : date("Y-m-d") ?>"
		   class="form-control w-100 mb-2" name="tanggal" onchange="$('#datefilter').submit()" min="2021-01-01"
		   max="<?= date("Y-m-d") ?>">
	<div class="d-flex justify-content-around align-items-center">
		<button type="button" class="btn btn-primary" id="mencatat" onclick="setHariMencatat()">
			Set hari mencatat kehadiran
		</button>
		<span>atau</span>
		<button type="button" class="btn btn-outline-primary" id="tidak_mencatat"
				onclick="setHariTidakMencatat()">
			Set hari TIDAK mencatat kehadiran
		</button>
	</div>
</form>

<div class="card" id="daftarhadirharian">
	<div class="card-header bg-transparent">
		<div class="d-flex justify-content-between">
			<h3 class="m-0">
				Daftar Hadir Harian
			</h3>
			<h3 class="m-0">
				Tanggal <?= isset($_GET['tanggal']) ? date("d M Y", strtotime($_GET['tanggal'])) : date("d M Y") ?></h3>
		</div>
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
						Hadir
					</th>
					<th style="width: 20%">
						Alpa
					</th>
					<th style="width: 20%">
						Izin
					</th>
					<th style="width: 20%">
						Sakit
					</th>
					<th style="width: 20%">
						Terlambat
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($siswa as $key => $value) : ?>
					<tr>
						<td style="vertical-align: middle;">
							<?= $key + 1 ?>.
						</td>
						<td nowrap style="vertical-align: middle;">
							<?= $value->nama ?>
						</td>
						<td>
							<div class="h-100 w-100 px-2 py-1 border radiocontainer" style="cursor: pointer;">
								<div class="form-check">
									<input class="form-check-input" type="radio" data-id="<?= $value->id ?>"
										   name="siswa-<?= $value->id ?>" id="<?= $value->id ?>-H" value="H"
										   onchange="changeIt(this)"/>
									<label class="form-check-label"> Hadir </label>
								</div>
							</div>
						</td>
						<td>
							<div class="h-100 w-100 px-2 py-1 border radiocontainer" style="cursor: pointer;">
								<div class="form-check">
									<input class="form-check-input" type="radio" data-id="<?= $value->id ?>"
										   name="siswa-<?= $value->id ?>" id="<?= $value->id ?>-A" value="A"
										   onchange="changeIt(this)" checked/>
									<label class="form-check-label"> Alpa </label>
								</div>
							</div>
						</td>
						<td>
							<div class="h-100 w-100 px-2 py-1 border radiocontainer" style="cursor: pointer;">
								<div class="form-check">
									<input class="form-check-input" type="radio" data-id="<?= $value->id ?>"
										   name="siswa-<?= $value->id ?>" id="<?= $value->id ?>-I" value="I"
										   onchange="changeIt(this)"/>
									<label class="form-check-label"> Izin </label>
								</div>
							</div>
						</td>
						<td>
							<div class="h-100 w-100 px-2 py-1 border radiocontainer" style="cursor: pointer;">
								<div class="form-check">
									<input class="form-check-input" type="radio" data-id="<?= $value->id ?>"
										   name="siswa-<?= $value->id ?>" id="<?= $value->id ?>-S" value="S"
										   onchange="changeIt(this)"/>
									<label class="form-check-label"> Sakit </label>
								</div>
							</div>
						</td>
						<td>
							<div class="h-100 w-100 px-2 py-1 border radiocontainer" style="cursor: pointer;">
								<div class="form-check">
									<input class="form-check-input" type="radio" data-id="<?= $value->id ?>"
										   name="siswa-<?= $value->id ?>" id="<?= $value->id ?>-T" value="T"
										   onchange="changeIt(this)"/>
									<label class="form-check-label"> Terlambat </label>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
