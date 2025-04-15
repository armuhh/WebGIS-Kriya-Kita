<div class="row mt-2">
	<div class="col-8">
		<canvas id="bar"></canvas>
	</div>
	<div class="col-4">
		<canvas id="pie"></canvas>
	</div>
</div>
<!-- <div class="row mt-5">
	<div class="col-12">
		<canvas id="pie"></canvas>
	</div>
</div> -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	// Base URL untuk API (sesuaikan dengan URL server Anda)  
	const baseUrl = "http://localhost/WEBGIS/";

	// Fungsi untuk membuat chart  
	const createChart = (chartType, chartId, data) => {
		const chartX = data.map(item => item.kecamatan);
		const chartY = data.map(item => item.total); // Pastikan data numerik  

		const chartData = {
			labels: chartX,
			datasets: [{
				label: 'Kriya',
				data: chartY,
				backgroundColor: chartType === 'pie' ? ['lightcoral', 'lightblue', 'lightgreen', 'lightyellow', 'lightpink'] : 'rgba(75, 192, 192, 0.2)',
				borderColor: chartType === 'pie' ? ['darkred', 'darkblue', 'darkgreen', 'darkorange', 'darkpink'] : 'darkblue',
				borderWidth: 2
			}]
		};

		const ctx = document.getElementById(chartId).getContext('2d');
		new Chart(ctx, {
			type: chartType,
			data: chartData,
			options: {
				responsive: true,
				maintainAspectRatio: false,
				layout: {
					padding: {
						top: 20,
						bottom: 50 // Memberikan ruang tambahan di bawah
					}
				},
				plugins: {
					legend: {
						position: 'top', // Menggeser legenda ke atas
						labels: {
							boxWidth: 10, // Memperkecil kotak warna di legend
							font: {
								size: 12
							}
						}
					}
				}
			}
		});
	};

	// Fungsi untuk mengambil data dari server dan membuat chart  
	const fetchDataAndCreateCharts = () => {
		$.ajax({
			url: baseUrl + 'Gis/get_chart', // Endpoint API Anda  
			dataType: 'json',
			method: 'GET',
			success: (data) => {
				console.log(data); // Debugging data yang diterima  
				if (Array.isArray(data) && data.length > 0) {
					createChart('bar', 'bar', data);
					createChart('pie', 'pie', data);
				} else {
					console.error("Data kosong atau tidak valid:", data);
					alert("Data kosong atau tidak valid. Periksa API Anda.");
				}
			},
			error: (xhr, status, error) => {
				console.error("Error fetching data:", error, xhr.responseText);
				alert("Gagal mengambil data dari server. Periksa koneksi atau konfigurasi API.");
			}
		});
	};

	// Panggil fungsi untuk mengambil data dan membuat chart  
	fetchDataAndCreateCharts();
</script>