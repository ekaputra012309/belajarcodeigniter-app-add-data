<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('');
		}
		$this->load->model('m_dash');
	}

	/*halaman home*/
	function index()
	{
		$data = array(
			'home' => 'back/home',
		);
		$this->load->view('back/tmp/page',$data);
	}

	/*halaman member*/
	function member()
	{
		$data = array(
			'member' => $this->m_dash->get_table_order('member','id_m'),
			'home' => 'back/member',
		);
		$this->load->view('back/tmp/page',$data);
	}

	/*halaman user*/
	function user()
	{
		$this->db->order_by('id', 'desc');
		$u = $this->db->get_where('user', array('level !=' => 'administrator'))->result_array();
		$data = array(
			'user' => $u,
			'home' => 'back/user',
		);
		$this->load->view('back/tmp/page',$data);
	}

	function user2()
	{
		$this->db->order_by('id', 'desc');
		$u = $this->db->get_where('user', array('level !=' => 'administrator'))->result_array();
		$data = array(
			'user' => $u,
			'home' => 'back/user2',
		);
		$this->load->view('back/tmp/page',$data);
	}

	/*halaman laporan member*/
	function excel()
	{
		$data = array(
			'member' => $this->m_dash->get_table_order('member','id_m'),
			'home' => 'back/lapexcel',
		);
		$this->load->view('back/tmp/page',$data);
	}

	function pdf()
	{
		$data = array(
			'member' => $this->m_dash->get_table_order('member','id_m'),
			'home' => 'back/lappdf',
		);
		$this->load->view('back/tmp/page',$data);
	}

	/*laporan */
	function lapexcel(){
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan_Member_".time().".xls");
		$data = array(
			'member' => $this->m_dash->get_table_order('member','id_m'),
		);
		$this->load->view('back/lap/lapmemberexcel',$data);
	}

	function lappdf($id=null){
		if ($id=='') {
			$tglin = $this->input->post('tglin');
			$tglout = $this->input->post('tglout');
			$data = array(
				'tglin' => $tglin,
				'tglout' => $tglout,
				'member' => $this->m_dash->get_lap_pdf('member','id_m',$tglin,$tglout),
			);
			// Get output html
			$this->load->view('back/lap/lapmemberpdf',$data);
		} else {
			$data = array(
				'id' => $id,
				'member' => $this->m_dash->get_table_w('member','id_m',$id),
			);
			// Get output html
			$this->load->view('back/lap/lapmemberpdfid',$data);
		}

		$html = $this->output->get_output();
		// Load library
		$this->load->library('dompdf_gen');
		// Convert to PDF
		$this->dompdf->load_html($html);
		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('A4', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("Laporan".date('-Y-m-d').".pdf", array("Attachment"=>false));
		exit(0);
	}

	/*function simpan data berdasarkan tabel*/
	function simpan($table)
	{
		$id = $this->input->post('id_m');
		if ($table=='member') {
			$data = array(
				'nama' => $this->input->post('nama'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'jk' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'bio' => $this->input->post('bio'),
			);
			$this->m_dash->simpan($table,'id_m',$id,$data);
			redirect('member');
		} elseif ($table=='user') {
			$p = $this->input->post('password');

			$config['upload_path'] = './ass/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = true;
			$config['max_size']  = '1024';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('fileimg')){
				$file = $this->upload->data();
			}

			if ($p=='') {
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'level' => $this->input->post('level'),
					'img' => $file['file_name'],
				);
			} else {
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => md5($p),
					'level' => $this->input->post('level'),
					'img' => $file['file_name'],
				);
			}
			$this->m_dash->simpanN($table,'id',$id,$data);
			redirect('user');
		} elseif ($table=='user2') {
			$p = $this->input->post('password');			

			if ($p=='') {
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'level' => $this->input->post('level'),
					'img' => $this->input->post('fileimg'),
				);
			} else {
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => md5($p),
					'level' => $this->input->post('level'),
					'img' => $this->input->post('fileimg'),
				);
			}
			$this->m_dash->simpanN('user','id',$id,$data);
			redirect('user2');
		} else {
			echo "query error";
		}
	}

	/*function hapus data berdasarkan tabel*/
	function hapus($table)
	{
		$id = $this->input->post('id');
		if ($table=='member') {
			$data=$this->m_dash->hapus($table,'id_m',$id);
			echo json_encode($data);
		}
		elseif ($table=='user') {
			$data=$this->m_dash->hapus($table,'id',$id);
			echo json_encode($data);
		}
		else {
			echo "query error";
		}
	}

	/*funciton get data untuk edit ke form*/
	function edit($table)
	{
		$id = $this->input->post('id');
		if ($table=='member') {
			$data=$this->m_dash->get_table_w($table,'id_m',$id);
			echo json_encode($data);
		} elseif ($table=='user') {
			$data=$this->m_dash->get_table_w($table,'id',$id);
			echo json_encode($data);
		} else {
			echo "query error";
		}
	}
}
/* End of file User.php */
/* Location: ./application/controllers/User.php */