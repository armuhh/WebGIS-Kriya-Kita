<div id="map" style="width: 100%; height: 600px;"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	});



	var peta2 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
		attribution: '© Google Maps',
		maxZoom: 10,
	});


	var peta3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
		maxZoom: 10,
		subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
	});

	const map = L.map('map', {
		center: [-6.91813612819761, 107.6292738420136],
		zoom: 13,
		layers: [peta1],
	});

	const baseLayers = {
		'OpenStreetMap': peta1,
		'Google Maps': peta2,
		'Imagery': peta3,
	};


	const layerControl = L.control.layers(baseLayers).addTo(map);
	$.getJSON("<?= base_url('gis/getGeoJson') ?>", function(data) {
		console.log(data)
		var icon3 = L.icon({
			iconUrl: '<?= base_url('assets/marker/shop.png') ?>',
			iconSize: [50, 50], // Ukuran ikon
		});
		geolayer = L.geoJson(data, {
			pointToLayer: function(feature, latlng) {
				console.log(feature, latlng)
				return L.marker(latlng, {
					icon: icon3
				});
			}
		}).addTo(map);
		let index = 0;
		geolayer.eachLayer(function(layer) {
			layer.bindPopup(
				`<div style="text-align: center; font-size: 14px; margin-bottom: 10px;">${data.features[index].properties.nama}</div>` +
				`<div style="text-align: center; margin-top: 15px;">
					<div style="font-size: 12px;">${data.features[index].properties.alamat}</div>
					<div style="font-size: 12px;">${data.features[index].properties.deskripsi}</div>
					<div style="font-size: 12px;">${data.features[index].properties.kontak}</div>
					<div style="text-align: center; margin-top: 10px; font-size: 12px;">${data.features[index].properties.harga_produk}</div>
	    		</div>` +
				`<div style="display: flex; justify-content: center; align-items: center;"> 
					<div style="text-align: center; margin-right: 10px;">  <img src='<?= base_url('assets/img/') ?>${data.features[index].properties.gambar}' width='100px' height='100px' /> </div>
					<div style="text-align: center;">   <img src='<?= base_url('assets/img/') ?>${data.features[index].properties.foto}' width='100px' height='100px' /></div>
				</div>`
			);
			index++;
		});
	});
</script>