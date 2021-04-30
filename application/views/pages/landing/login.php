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
<div class="d-flex align-items-center justify-content-center h-50 flex-wrap w-100">
	<form style="max-width: 300px; max-height: 400px; height:50vh"
		  class="card card-body d-flex justify-content-between align-items-center flex-column"
		  action="<?= base_url("service/auth/login") ?>" method="POST">
		<div>
			<h2 class="text-center mb-0">Masuk</h2>
			<p class="m-0 text-center small" style="line-height: 1">Untuk Charissa dan Guru, masukan password untuk
				masuk ke sistem aku hadir</p>
		</div>

		<!-- Password -->
		<input type="password" name="password" class="form-control text-center" placeholder="Password">

		<div>
			<button class="btn btn-primary btn-sm btn-block" type="submit">Masuk</button>

			<hr class="w-75"/>

			<p class="m-0">Anda teman charissa?
				<a href="<?= base_url() ?>">klik disini</a>
			</p>
		</div>
	</form>
</div>
