<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">

<style>
	html,
	body {
		background-color: #f7f7f7;
		min-height: 100vh;
	}

	h2 {
		font-family: 'Akaya Telivigala', cursive;
		font-size: 3em
	}

	h1 {
		font-family: 'Akaya Telivigala', cursive;
	}
</style>
<div class="h-25 d-flex justify-content-center align-items-center flex-column">
	<h1 class="display-3 text-center mb-0 mt-2">
		Aku Hadir!
	</h1>
	<small>Sistem Pencatat Kehadiran dari Charissa dan <a href="https://nael.nathanael.my.id"
														  target="_blank">Nathanael</a></small>
</div>
<div class="d-flex align-items-center justify-content-center container-fluid h-50 flex-wrap">
	<form style="max-width: 400px; max-height: 400px; height:50vh"
		  class="card card-body d-flex justify-content-between align-items-center flex-column"
		  action="<?= base_url("landing/cek_hadir") ?>" method="GET">
		<div>
			<h2 class="text-center mb-0">Cek Kehadiran</h2>
			<p class="m-0 text-center small" style="line-height: 1">
				Untuk siswa kelas 7C, pilih nama di sini
			</p>
		</div>

		<!-- Password -->
		<select name="id" class="form-control select2" onchange="testDataIn()">
			<option value="" disabled selected>Pilih nama-mu di sini</option>
			<?php foreach ($siswa as $sub) : ?>
				<option value="<?= $sub->id ?>"><?= $sub->nama ?></option>
			<?php endforeach ?>
		</select>

		<div>
			<button class="btn btn-primary btn-sm btn-block disabled" type="submit" id="submitButton">Cek</button>

			<hr class="w-75"/>

			<p class="m-0">Anda Charissa atau Guru?
				<a href="<?= base_url("/login") ?>">klik disini</a>
			</p>
		</div>
	</form>
</div>

<script>
	function testDataIn() {
		$("#submitButton").removeClass("disabled")
	}
</script>
