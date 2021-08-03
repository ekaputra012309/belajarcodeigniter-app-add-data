<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dash extends CI_Model {

	// get data table dengan where
	function get_table_w($table,$id,$value)
	{
		$this->db->where($id, $value);
		return $this->db->get($table)->result();
	}

	/*get data table dengan order by*/
	function get_table_order($table,$title)
	{
		$this->db->order_by($title, 'desc');
		return $this->db->get($table)->result_array();
	}

	/*simpan dan update query*/
	function simpan($table,$id,$value,$data)
	{
		if ($value!=0) {
			$this->db->where($id, $value);
			$this->db->update($table,$data);
			echo "1";
		} else {
			$this->db->insert($table,$data+array('tgl'=>date('Y-m-d')));
			echo "0";
		}
	}

	function simpanN($table,$id,$value,$data)
	{
		if ($value!=0) {
			$this->db->where($id, $value);
			$this->db->update($table,$data);
			echo "1";
		} else {
			$this->db->insert($table,$data);
			echo "0";
		}
	}

	/*hapus query*/
	function hapus($table,$id,$value)
	{
		// if ($table=='user') {
		// 	$q = $this->db->get_where($table,array($id=>$value))->row();
		// 	$this->db->where($id, $value);
		// 	$result = $this->db->delete($table);
		// 	if ($result) {
		// 		unlink("./ass/img/".$q->img); /*untuk hapus file atau gambar dari folder*/
		// 	}
		// 	return $result;
		// } else {
			$this->db->where($id, $value);
			$result = $this->db->delete($table);
			return $result;
		// }
	}

	/*lap pdf where between*/
	function get_lap_pdf($table,$title,$tglin,$tglout)
	{
		$this->db->where(array('tgl >=' => $tglin, 'tgl <=' => $tglout));
		$this->db->order_by($title, 'desc');
		return $this->db->get($table)->result_array();
	}

}
/* End of file M_dash.php */
/* Location: ./application/models/M_dash.php */