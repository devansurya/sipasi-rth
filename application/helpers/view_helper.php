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
 ?>