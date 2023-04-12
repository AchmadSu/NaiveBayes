<?php 

/**
 * 
 */
class Uji_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('tbl_training')->result();
	}

	public function tambah_data($kesimpulan)
	{
		$data = array(
			// 'id_training' => $this->input->post('id_training', true),
			'nama' => $this->input->post('nama', true),
			'pkh' => $this->input->post('pkh', true),
			'jml_tanggungan' => $this->input->post('jml_tanggungan', true),
			'kepala_rt' => $this->input->post('kepala_rt', true),
			'pendidikan' => $this->input->post('pendidikan', true),
			'pekerjaan' => $this->input->post('pekerjaan', true),
			'rw' => $this->input->post('rw', true),
			'jml_penghasilan' => $this->input->post('jml_penghasilan', true),
			// 'status_rumah' => $this->input->post('status_rumah', true),
			'status_kelayakan' => $kesimpulan
		);

		$this->db->insert('tbl_training', $data);
	}

	public function ubah_data()
	{
		$jml_tanggungan = $this->input->post('jml_tanggungan', true);
		$jumlah_penghasilan = $this->input->post('jml_penghasilan', true);

		$total = $jumlah_penghasilan/$jml_tanggungan;
		$statusKelayakan = '';
		$pkh = $this->input->post('pkh', true);
		if($total <= 1000000 && $pkh == '0') {
			$statusKelayakan = 'Layak';
		} else {
			$statusKelayakan = 'Tidak Layak';
		}

		$data = array(
			'nama' => $this->input->post('nama', true),
			'pkh' => $pkh,
			'jml_tanggungan' => $jml_tanggungan,
			'kepala_rt' => $this->input->post('kepala_rt', true),
			'pendidikan' => $this->input->post('pendidikan', true),
			'pekerjaan' => $this->input->post('pekerjaan', true),
			'rw' => $this->input->post('rw', true),
			'jml_penghasilan' => $jumlah_penghasilan,
			// 'status_rumah' => $this->input->post('status_rumah', true),
			'status_kelayakan' => $statusKelayakan
		);
		$this->db->where('id_training', $this->input->post('id_training', true));
		$this->db->update('tbl_training', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('tbl_training', ['id_training' => $id]);
	}

	public function detail_data($id)
	{
		return $this->db->get_where('tbl_training', ['id_training' => $id]) ->row_array(); 
	}
}
?>