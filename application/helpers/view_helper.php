<?php 
	function getStatusbadge($statusName=null)
	{
		switch (strtolower($statusName)) {
			case 'baru':
				$html = "<span class=\"badge rounded-pill badge-light-info\">{$statusName}</span>";
				break;
			case 'penanganan':
				$html = "<span class=\"badge rounded-pill badge-light-warning\">{$statusName}</span>";
				break;
			case 'selesai':
				$html = "<span class=\"badge rounded-pill badge-light-success\">{$statusName}</span>";
				break;
			case 'proses':
				$html = "<span class=\"badge rounded-pill badge-warning text-light\">{$statusName}</span>";
				break;
			case 'disetujui':
				$html = "<span class=\"badge rounded-pill badge-success text-light\">{$statusName}</span>";
				break;
			case 'ditolak':
				$html = "<span class=\"badge rounded-pill badge-danger text-light\">{$statusName}</span>";
				break;
			case 'dibatalkan':
				$html = "<span class=\"badge rounded-pill badge-danger text-light\">{$statusName}</span>";
				break;
			default:
				$html = "<span class=\"badge rounded-pill badge-light-info\">-</span>";
				break;
		}
		return $html;
	}

	function formatDate($date, $format='d/m/y')
	{
		return date('d/m/y H:i:s',strtotime('20130409163705'));
	}

	function cek_login()
	{
		$ci = get_instance();
		if (!$ci->session->userdata('id')) {
			$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!!
				</div>');
			return redirect('Auth');
		}
	}

 ?>