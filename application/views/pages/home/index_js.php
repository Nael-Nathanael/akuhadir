<script>
	function hideDaftarHadir() {
		$("#daftarhadirharian").fadeOut()
	}

	function showDaftarHadir() {
		$("#daftarhadirharian").fadeIn()
	}

	function setHariMencatat() {
		$.ajax({
			url: "<?= base_url("api/set_day_dicatat") ?>",
			method: "POST",
			data: {
				tanggal: '<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : date("Y-m-d") ?>'
			},
			success: (response) => {
				const responsetanggal = response[0];
				if (responsetanggal.isDicatat === "1") {
					$("#mencatat").removeClass("btn-outline-primary").addClass("btn-primary")
					$("#tidak_mencatat").removeClass("btn-primary").addClass("btn-outline-primary")
					showDaftarHadir();
				} else {
					hideDaftarHadir();
					$("#mencatat").removeClass("btn-primary").addClass("btn-outline-primary")
					$("#tidak_mencatat").removeClass("btn-outline-primary").addClass("btn-primary")
				}
			},
			error: (error) => {
				alert("error :(");
				console.error(error);
			}
		})
	}


	function setHariTidakMencatat() {
		$.ajax({
			url: "<?= base_url("api/set_day_tidak_dicatat") ?>",
			method: "POST",
			data: {
				tanggal: '<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : date("Y-m-d") ?>'
			},
			success: (response) => {
				const responsetanggal = response[0];
				if (responsetanggal.isDicatat === "1") {
					$("#mencatat").removeClass("btn-outline-primary").addClass("btn-primary")
					$("#tidak_mencatat").removeClass("btn-primary").addClass("btn-outline-primary")
					showDaftarHadir();
				} else {
					hideDaftarHadir();
					$("#mencatat").removeClass("btn-primary").addClass("btn-outline-primary")
					$("#tidak_mencatat").removeClass("btn-outline-primary").addClass("btn-primary")
				}
			},
			error: (error) => {
				alert("error :(");
				console.error(error);
			}
		})
	}

	$(document).ready(() => {
		$.ajax({
			url: "<?= base_url("api/get_today_dicatat") ?>",
			method: "POST",
			data: {
				tanggal: '<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : date("Y-m-d") ?>'
			},
			success: (response) => {
				const responsetanggal = response[0];
				if (responsetanggal.isDicatat === "1") {
					$("#mencatat").removeClass("btn-outline-primary").addClass("btn-primary")
					$("#tidak_mencatat").removeClass("btn-primary").addClass("btn-outline-primary")
					showDaftarHadir();
				} else {
					hideDaftarHadir();
					$("#mencatat").removeClass("btn-primary").addClass("btn-outline-primary")
					$("#tidak_mencatat").removeClass("btn-outline-primary").addClass("btn-primary")
				}
			},
			error: (error) => {
				alert("error :(");
				console.error(error);
			}
		})


		$.ajax({
			url: "<?= base_url("api/get_kehadiran") ?>",
			method: "POST",
			data: {
				tanggal: '<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : date("Y-m-d") ?>'
			},
			success: (response) => {
				response.forEach(element => {
					$(`#${element.siswa_id}-${element.keterangan}`).prop("checked", "checked");
				});
				refreshBg();
			},
			error: (error) => {
				alert("error :(");
				console.error(error);
			}
		})

		<?php if (getUserData("personalData")->username != "Guru") : ?>
		$(".radiocontainer").click((e) => {
			if ($(e.target).is("div.radiocontainer")) {
				$(e.target).children().children("input").first().click();
			} else if ($(e.target).is("div")) {
				$(e.target).children("input").first().click();
			} else if ($(e.target).is("label")) {
				$(e.target).parent().parent(".radiocontainer").click();
			}
		})
		<?php else : ?>
		$("input[type=radio]").fadeOut();
		<?php endif ?>
	})

	function refreshBg() {
		$("input[type=radio]").each((index, elem) => {
			if ($(elem).prop("checked")) {
				$(elem).parent().parent(".radiocontainer").addClass("bg-primary text-white")
			} else {
				$(elem).parent().parent(".radiocontainer").removeClass("bg-primary text-white")
			}
		})
	}
	<?php if (getUserData("personalData")->username != "Guru") : ?>

	function changeIt(element) {
		const m_siswa_id = $(element).attr("data-id");
		const keterangan = $(element).val();

		$.ajax({
			url: "<?= base_url("api/hadir") ?>",
			method: "POST",
			data: {
				id: m_siswa_id,
				keterangan: keterangan,
				tanggal: '<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : date("Y-m-d") ?>'
			},
			success: (response) => {
				if (response.message === "success") {
					console.log("success");
				}
				refreshBg();
			},
			error: (error) => {
				alert("error :(");
				console.error(error);
			}
		})
	}
	<?php endif ?>
</script>
