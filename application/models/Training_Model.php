<?php 

/**
 * 
 */
class Training_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('tbl_training')->result();
	}

	public function getAllDataLimit($skip, $take)
	{
		if ($skip == null) {
			$this->db->limit(50, 0);
		} else {
			$this->db->limit($take, $skip);
		}
		return $this->db->get('tbl_training')->result();
	}

	public function tambah_data()
	{
		// $jumlah_penghasilan = $this->input->post('jml_penghasilan', true);

		// if ($jumlah_penghasilan > 2500000) {
		// 	$kat = "tinggi";
		// }else if($jumlah_penghasilan >= 1500000 && $jumlah_penghasilan <= 2500000){
		// 	$kat = "sedang";
		// }else if($jumlah_penghasilan < 1500000){
		// 	$kat = "rendah";
		// }
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
			// 'id_training' => $this->input->post('id_training', true),
			'nama' => $this->input->post('nama', true),
			'pkh' => $pkh,
			'jml_tanggungan' => $jml_tanggungan,
			'kepala_rt' => $this->input->post('kepala_rt', true),
			'pendidikan' => $this->input->post('pendidikan', true),
			'pekerjaan' => $this->input->post('pekerjaan', true),
			'rw' => $this->input->post('rw', true),
			'jml_penghasilan' => $jumlah_penghasilan,
			'pendidikan' => $this->input->post('pendidikan', true),
			'pekerjaan' => $this->input->post('pekerjaan', true),
			'status_kelayakan' => $statusKelayakan
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
			'pekerjaan' => $this->input->post('pekerjaan', true),
			'pendidikan' => $this->input->post('pendidikan', true),
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

	public function count_allData()
	{
		$this->db->from('tbl_training');
		return $this->db->count_all_results();
	}

	public function count_layak()
	{
		$this->db->where('status_kelayakan', 'Layak');
		$this->db->from('tbl_training');
		return $this->db->count_all_results();
	}

	public function count_tidaklayak()
	{
		$this->db->where('status_kelayakan', 'Tidak Layak');
		$this->db->from('tbl_training');
		return $this->db->count_all_results();
	}

	// ambil probabilitas PKH
	public function status_PKH($status)
	{
		// $status = "layak";
		$this->db->where('pkh', $status);
		$this->db->where('status_kelayakan', "Layak");
		$this->db->from('tbl_training');
		$layak = $this->db->count_all_results()/$this->count_layak();	
		$this->db->where('pkh', $status);
		$this->db->where('status_kelayakan', "Tidak Layak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_tidaklayak();
		return array('layak' => $layak, 'tidaklayak' => $tidak);	
	}

	public function jumlah_tanggungan($status)
	{

		if ($status > 5) {
			$status = 6;
		}else {
			$status = $status;
		}

		$q_layak = $this->db->query('SELECT count(IF( jml_tanggungan > 5, 6, jml_tanggungan)) as jml_tanggungan from tbl_training where jml_tanggungan = '.$status.' and status_kelayakan = "layak"')->row();
		$layak = $q_layak->jml_tanggungan/$this->count_layak();	
		
		$q_tidak = $this->db->query('SELECT count(IF( jml_tanggungan > 5, 6, jml_tanggungan)) as jml_tanggungan from tbl_training where jml_tanggungan = '.$status.' and status_kelayakan = "tidak layak"')->row();
		$tidak = $q_tidak->jml_tanggungan/$this->count_tidaklayak();
		return array('layak' => $layak , 'tidaklayak' => $tidak);	
	}

	public function rw($status)
	{
		// $status = "Laki-laki";
		$this->db->where('rw', $status);
		$this->db->where('status_kelayakan', "Layak");
		$this->db->from('tbl_training');
		$layak = $this->db->count_all_results()/$this->count_layak();	
		$this->db->where('rw', $status);
		$this->db->where('status_kelayakan', "Tidak Layak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_tidaklayak();
		return array('layak' => $layak, 'tidaklayak' => $tidak);	
	}

	public function kepala_rt($status)
	{
		// $status = "Laki-laki";
		$this->db->where('kepala_rt', $status);
		$this->db->where('status_kelayakan', "Layak");
		$this->db->from('tbl_training');
		$layak = $this->db->count_all_results()/$this->count_layak();	
		$this->db->where('kepala_rt', $status);
		$this->db->where('status_kelayakan', "Tidak Layak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_tidaklayak();
		return array('layak' => $layak, 'tidaklayak' => $tidak);	
	}

	public function jml_penghasilan($status)
	{	
		$kat ="";
		if ($status > 2500000) {
			$kat = "tinggi";
		}else if($status >= 1500000 && $status <= 2500000){
			$kat = "sedang";
		}else if($status < 1500000){
			$kat = "rendah";
		}
		$q_layak = $this->db->query("
			SELECT count(*) as jml FROM (
			SELECT jml_penghasilan,  status_kelayakan,
			CASE
			WHEN jml_penghasilan > 2500000 THEN 'tinggi'
			WHEN jml_penghasilan >= 1500000 AND jml_penghasilan <= 2500000 THEN 'sedang'
			WHEN jml_penghasilan < 1500000 THEN 'rendah'
			ELSE ''
			END AS c_jml_penghasilan
			FROM tbl_training 
			) as conversi_jml_penghasilan  WHERE c_jml_penghasilan ='$kat' AND status_kelayakan = 'layak'
			")->row();
		$layak = $q_layak->jml/$this->count_layak();
		$q_tidak = $this->db->query("
			SELECT count(*) as jml FROM (
			SELECT jml_penghasilan,  status_kelayakan,
			CASE
			WHEN jml_penghasilan > 2500000 THEN 'tinggi'
			WHEN jml_penghasilan >= 1500000 AND jml_penghasilan <= 2500000 THEN 'sedang'
			WHEN jml_penghasilan < 1500000 THEN 'rendah'
			ELSE ''
			END AS c_jml_penghasilan
			FROM tbl_training 
			) as conversi_jml_penghasilan  WHERE c_jml_penghasilan ='$kat' AND status_kelayakan = 'tidak layak'
			")->row();
		$tidak = $q_tidak->jml/$this->count_tidaklayak();

		return array('layak' => $layak, 'tidaklayak' => $tidak);	
	}




}
?>