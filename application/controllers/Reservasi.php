<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('view_helper');
		$this->load->model('M_Reservasi');
		$this->load->model('M_Status');
		$this->load->model('M_Ref');
	}

	public function index(){

		$data['data'] = $this->M_Reservasi->get();
		$data['content'] = $this->load->view('pages/reservasi/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function detail_reservasi($id){
		if (!is_numeric($id)) return $this->output->set_status_header(400);

		
		$data['data'] = $this->M_Reservasi->get_one($id);
		$data['list_status'] = $this->M_Ref->getAllResult('status_reservasi');

		$data['content'] = $this->load->view('pages/reservasi/detail', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function edit_reservasi($id){
		if (!is_numeric($id)) return $this->output->set_status_header(400);

		
		$data['data'] = $this->M_Reservasi->get_one($id);

		$data['fasilitas'] = $this->M_Ref->getWhere('fasilitas_reservasi','id_rth',$data['data']->id_rth);
		$data['jenis'] = $this->M_Ref->getAllResult('jenis_reservasi');
		$data['content'] = $this->load->view('pages/reservasi/edit', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function update_reservasi(){

		$data = array(
			'id_jenisreservasi' => $this->input->post('jenis'),
			'id_fasilitas_reservasi' => $this->input->post('fasilitas'),
			'tanggal_reservasi' => $this->input->post('tanggal'),
			'deskripsi_reservasi' => $this->input->post('deskripsi')

		);

		$this->db->where('id_reservasi', $this->input->post('id_reservasi'));
		$reservasi = $this->db->update('reservasi', $data);

		if($reservasi){
			
			$this->setflashdata('reservasi_message', 'Reservasi telah di ubah');
		}else{
			$this->setflashdata('reservasi_message', 'Gagal ubah reservasi','error');
		}
		redirect('Reservasi/detail_reservasi/'. $this->input->post('id_reservasi'));

	}

	public function tolak_reservasi(){
		$datareservasi = array(
			'catatan_petugas' => $this->input->post('catatan'),
			'id_status_reservasi' => 3,
		);
		$this->db->where('id_reservasi', $this->input->post('id_reservasi'));
		$reservasi = $this->db->update('reservasi', $datareservasi);

		if($reservasi){
			$data = $this->M_Ref->getWhereRow('reservasi','id_reservasi',$this->input->post('id_reservasi'));
			$dataNotif = array(
				'id_user' => $data['id_user'],
				'id_ref' => $data['id_reservasi'],
				'pesan' => 'Reservasi anda ditolak oleh petugas RTH',
				'color' => 'danger'

			);
			$insert = $this->M_Ref->insertTable('notifikasi', $dataNotif);

			
			$this->setflashdata('reservasi_message', 'Reservasi telah di tolak');
		}else{
			$this->setflashdata('reservasi_message', 'Gagal tolak reservasi','error');
		}
		redirect('Reservasi/detail_reservasi/'. $this->input->post('id_reservasi'));
	}

	public function setujui_reservasi($id){
		if (!is_numeric($id)) return $this->output->set_status_header(400);

		$datareservasi = array(
			'catatan_petugas' => null,
			'id_status_reservasi' => 2,
		);
		$this->db->where('id_reservasi', $id);
		$reservasi = $this->db->update('reservasi', $datareservasi);

		if($reservasi){
			$data = $this->M_Ref->getWhereRow('reservasi','id_reservasi',$id);
			$dataNotif = array(
				'id_user' => $data['id_user'],
				'id_ref' => $data['id_reservasi'],
				'pesan' => 'Reservasi anda disetujui oleh petugas RTH',
				'color' => 'success'

			);
			$insert = $this->M_Ref->insertTable('notifikasi', $dataNotif);

			$this->generateBarcode($id);

			$this->setflashdata('reservasi_message', 'Reservasi telah di setujui');
		}else{
			$this->setflashdata('reservasi_message', 'Gagal setujui reservasi','error');
		}
		redirect('Reservasi/detail_reservasi/'. $id);
	}

	public function batalkan_reservasi($id){
		$datareservasi = array(
			'catatan_petugas' => null,
			'id_status_reservasi' => 4,
		);
		$this->db->where('id_reservasi', $id);
		$reservasi = $this->db->update('reservasi', $datareservasi);

		if($reservasi){
			$this->setflashdata('reservasi_message', 'Reservasi telah di batalkan');
		}else{
			$this->setflashdata('reservasi_message', 'Gagal batalkan reservasi','error');
		}
		redirect('Reservasi/detail_reservasi/'. $id);
	}

	public function bukti_reservasi($id = null){
		if (!is_numeric($id)) return $this->output->set_status_header(400);
		
		$data['data'] = $this->M_Reservasi->get_one($id);

		$data['content'] = $this->load->view('pages/reservasi/bukti', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function cetak_bukti_reservasi($id = null){


		if (!is_numeric($id)) return $this->output->set_status_header(400);

		$data['data'] = $this->M_Reservasi->get_one($id);


		$this->load->library('pdfgenerator');
        $data['title'] = "Data Random";
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = $this->load->view('pdf/bukti_reservasi', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function setflashdata($flashId='message', $message='', $type='success')
    {
        $this->session->set_flashdata($flashId, "
            <div class=\"alert alert-{$type} dark alert-dismissible fade show\" role=\"alert\">
                {$message}
                <button class=\"btn-close\" type=\"button\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>");
    }
     public function generateBarcode($id)
    {	
    	$this->load->library('ciqrcode');

                $config['cacheable']    		= true; //boolean, the default is true
                $config['cachedir']             = './assets/'; //string, the default is application/cache/
                $config['errorlog']             = './assets/'; //string, the default is application/logs/
                $config['imagedir']             = './assets/img/qrcode/'; //direktori penyimpanan qr code
                $config['quality']              = true; //boolean, the default is true
                $config['size']                 = '1024'; //interger, the default is 1024
                $config['black']                = array(224,255,255); // array, default is array(255,255,255)
                $config['white']                = array(70,130,180); // array, default is array(0,0,0)
                $this->ciqrcode->initialize($config);

                $image_name='qrcode'.$id.'.png'; 

                $params['data'] = base_url('Reservasi/detail_reservasi/'. $id); 
                $params['level'] = 'H'; //H=High
                $params['size'] = 10;
                $params['savename'] = FCPATH.$config['imagedir'].$image_name;
                $qr = $this->ciqrcode->generate($params); 



    }

}