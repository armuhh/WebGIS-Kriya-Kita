<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gis extends CI_Controller
{
	public function index()
	{
		$data = array(
			'judul' => 'BERANDA',
			'page' => 'v_home',

		);

		$this->load->view('v_template', $data, false);
	}


	public function chart_data()
	{
		$data = array(
			'judul' => 'Chart',
			'page' => 'v_chart',
		);
		$this->load->view('v_template', $data, false);
	}

	public function get_chart()
	{
		$data = $this->Chart_model->charts_database();
		echo json_encode($data);
	}


	public function geojson()
	{
		$data = array(
			'judul' => '',
			'page' => 'v_geojson',
		);
		$this->load->view('v_template', $data);
	}

	public function getGeoJson()
	{
		header('Content-Type: application/json');

		$kriya = $this->db->query('SELECT * FROM data_kriya');
		$result = $kriya->result();

		$geojson = [
			'type' => 'FeatureCollection',
			'name' => 'KRIYAA',
			'crs' => [
				'type' => 'name',
				'properties' => [
					"name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
				]
			],
			'features' => []
		];

		foreach ($result as $row) {
			$geojson['features'][] = [
				'type' => 'Feature',
				'geometry' => [
					'type' => 'Point',
					'coordinates' => [(float) $row->longitude, (float) $row->latitude]
				],
				'properties' => [
					'nama' => $row->nama,
					'jenis' => $row->jenis,
					'alamat' => $row->alamat,
					'harga_produk' => $row->harga_produk,
					'deskripsi' => $row->deskripsi,
					'kontak' => $row->Kontak,
					'gambar' => $row->Gambar,
					'foto' => $row->Foto
				]
			];
		}
		// var_dump($geojson);
		echo json_encode($geojson ?? []);
	}
}
