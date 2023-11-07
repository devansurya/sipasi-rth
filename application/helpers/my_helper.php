<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* fungsi non database */
function tjs ($tgl, $tipe) {
	if ($tgl != "0000-00-00 00:00:00") {
		$pc_satu	= explode(" ", $tgl);
		if (count($pc_satu) < 2) {	
			$tgl1		= $pc_satu[0];
			$jam1		= "";
		} else {
			$jam1		= $pc_satu[1];
			$tgl1		= $pc_satu[0];
		}

		$pc_dua		= explode("-", $tgl1);
		$tgl		= $pc_dua[2];
		$bln		= $pc_dua[1];
		$thn		= $pc_dua[0];

		$bln_pendek		= array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");
		$bln_panjang	= array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$bln_angka		= intval($bln) - 1;

		if ($tipe == "l") {
			$bln_txt = $bln_panjang[$bln_angka];
		} else if ($tipe == "s") {
			$bln_txt = $bln_pendek[$bln_angka];
		}

		return $tgl." ".$bln_txt." ".$thn."  ".$jam1;
	} else {
		return "Tgl Salah";
	}
}

function hari($wekday) {
	$hari	= array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu","Minggu");
	return $hari[$wekday];
}

function hari_indo($tgl){
	$day = date('D', strtotime($tgl));
	$dayList = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	return $dayList[$day];
}
function emtpy_check($data, $teks) {
	if (empty($data)) {
		return $teks;
	} else {
		return $data;
	}
}

function terbilang($bilangan){
	$bilangan = abs($bilangan);

	$angka 	= array("Nol","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
	$temp 	= "";

	if($bilangan < 12){
		$temp = " ".$angka[$bilangan];
	}else if($bilangan < 20){
		$temp = terbilang($bilangan - 10)." belas";
	}else if($bilangan < 100){
		$temp = terbilang($bilangan/10)." puluh".terbilang($bilangan%10);
	}else if ($bilangan < 200) {
		$temp = " seratus".terbilang($bilangan - 100);
	}else if ($bilangan < 1000) {
		$temp = terbilang($bilangan/100). " ratus". terbilang($bilangan % 100);
	}else if ($bilangan < 2000) {
		$temp = " seribu". terbilang($bilangan - 1000);
	}else if ($bilangan < 1000000) {
		$temp = terbilang($bilangan/1000)." ribu". terbilang($bilangan % 1000);
	}else if ($bilangan < 1000000000) {
		$temp = terbilang($bilangan/1000000)." juta". terbilang($bilangan % 1000000);
	}

	return $temp;
}

function tambah_jam_sql($menit) {
	$str = "";
	if ($menit < 60) {
		$str = "00:".str_pad($menit, 2, "0", STR_PAD_LEFT).":00";
	} else if ($menit >= 60) {
		$mod = $menit % 60;
		$bg = floor($menit / 60);
		$str = str_pad($bg, 2, "0", STR_PAD_LEFT).":".str_pad($mod, 2, "0", STR_PAD_LEFT).":00";
	} 
	return $str;
}

function bersih($data, $pil) {
	//return mysql_real_escape_string 
	return $data->$pil;
}


function obj_to_array($obj, $pilih) {
	$pilihpc	= explode(",", $pilih);
	$array 		= array(""=>"-");

	foreach ($obj as $o) {
		$xx = $pilihpc[0];
		$x = $o->$xx;
		$y = $pilihpc[1];

		$array[$x] = $o->$y; 
	}

	return $array;
}


function tampil_media($file,$width="320px",$height="240px", $class=null) {
	$ret = '';

	$pc_file = explode(".", $file);
	$eks = end($pc_file);

	$eks_video = array("mp4","flv","mpeg");
	$eks_audio = array("mp3","acc");
	$eks_image = array("jpeg", "JPEG","jpg","JPG","gif","GIF","bmp","png","PNG");


	if (!in_array($eks, $eks_video) && !in_array($eks, $eks_audio) && !in_array($eks, $eks_image)) {
		$ret .= '';
	} else {
		if (in_array($eks, $eks_video)) {
			if (is_file("./".$file)) {
				$ret .= '<p><video width="'.$width.'" height="'.$height.'" controls>
				  <source src="'.base_url().$file.'" type="video/mp4">
				  <source src="'.base_url().$file.'" type="application/octet-stream">Browser tidak support</video></p>';
			} else {
				$ret .= '';
			}
		} 

		if (in_array($eks, $eks_audio)) {
			if (is_file("./".$file)) {
				$ret .= '<p><audio width="'.$width.'" height="'.$height.'" controls>
				<source src="'.base_url().$file.'" type="audio/mpeg">
				<source src="'.base_url().$file.'" type="audio/wav">Browser tidak support</audio></p>';
			} else {
				$ret .= '';
			}
		}

		if (in_array($eks, $eks_image)) {
			if (is_file("./".$file)) {
				$ret .= '<div class="gambar '.$class.'"><img src="'.base_url().$file.'" style="width: '.$width.'; height: '.$height.'; max-width:250px; display: inline; float: left"></div>';
			} else {
				$ret .= '';
			}
		}
	}
	

	return $ret;
}

function j($data) {
	header('Content-Type: application/json');
	echo json_encode($data);
}


function gen_menu() {
	$CI 	=& get_instance();
	$sess_level = $CI->session->userdata('admin_level');
	$url = $CI->uri->segment(1);
	$sub_url = $CI->uri->segment(2);

	$menu = array();

	if ($sess_level == "guru") {
		$menu = array(
			// array("tipe"=>"dropdown","icon"=>"airplay", "text"=>"Dashboard", "color-text" => "text-blue", "list" => array(
			// 	array("url" => "Dashboard", "text" => "Utama")
			// )),
			array("tipe"=>"", "icon"=>"calendar", "url"=>"Jadwal_pelajaran/guru", "text"=> "Jadwal Pelajaran", "color-text" => "text-success"),
			array("tipe"=>"", "icon"=>"calendar", "url"=>"Absensi", "text"=> "Absensi", "color-text" => "text-blue"),
			array("tipe"=>"", "icon"=>"book-open", "url"=>"Materi", "text"=> "Mata Pelajaran", "color-text" => "text-yellow"),
			array("tipe"=>"dropdown", "icon"=>"file-text", "text"=> "Soal", "color-text" => "text-green", "list" => array(
				array("url" => "Paket_soal", "text" => "Paket Soal"),
				array("url" => "Soal", "text" => "Bank Soal")
			)),
			array("tipe"=>"dropdown", "icon"=>"book", "text"=> "Ujian", "color-text" => "text-purple", "list" => array(
				array("url" => "Ujian/list", "text" => "Ujian"),
				array("url" => "Ujian/kontrol", "text" => "Kontrol Ujian"),
				array("url" => "Ujian/hasil", "text" => "Hasil Ujian")
			)),
			array("tipe"=>"", "icon"=>"speaker", "url"=>"Pengumuman", "text"=> "Pengumuman", "color-text" => "text-yellow"),
			// array("tipe"=>"", "icon"=>"book", "url"=>"Ujian/list", "text"=> "Ujian", "color-text" => "text-purple"),
			// array("tipe"=>"", "icon"=>"clipboard", "url"=>"Tugas", "text"=> "Tugas", "color-text" => "text-red"),
			
		);
	} else if ($sess_level == "siswa") {
		$menu = array(
			array("tipe"=>"", "icon"=>"airplay", "url"=>"Dashboard/siswa", "text"=> "Dashboard", "color-text" => "text-purple"),
			array("tipe"=>"", "icon"=>"speaker", "url"=>"Pengumuman/pengumuman", "text"=> "Pengumuman", "color-text" => "text-blue"),
			array("tipe"=>"", "icon"=>"book-open", "url"=>"Ujian", "text"=> "Ujian", "color-text" => "text-yellow"),
			array("tipe"=>"", "icon"=>"clipboard", "url"=>"Materi/mapel_siswa", "text"=> "Mata Pelajaran", "color-text" => "text-green"),
			// array("tipe"=>"", "icon"=>"clipboard", "url"=>"Tugas", "text"=> "Tugas", "color-text" => "text-red"),
			

		);
	} else if ($sess_level == "operator") {
		$menu = array(
			
			array("tipe"=>"", "icon"=>"calendar", "url"=>"Absensi_siswa", "text"=> "Absensi Siswa", "color-text" => "text-success"),
			// array("tipe"=>"dropdown", "icon"=>"book", "text"=> "Ujian", "color-text" => "text-purple", "list" => array(
			// 	array("url" => "Ujian/list", "text" => "Ujian"),
			// 	array("url" => "Ujian/kontrol", "text" => "Kontrol Ujian"),
			// 	array("url" => "Ujian/hasil", "text" => "Hasil Ujian")
			// )),
			// array("tipe"=>"dropdown", "icon"=>"file-text", "text"=> "Soal", "color-text" => "text-green", "list" => array(
			// 	array("url" => "Paket_soal", "text" => "Paket Soal"),
			// 	array("url" => "Soal", "text" => "Bank Soal")
			// )),
			// array("tipe"=>"", "icon"=>"speaker", "url"=>"Pengumuman", "text"=> "Pengumuman", "color-text" => "text-purple"),
			// array("tipe"=>"", "icon"=>"calendar", "url"=>"Jadwal_pelajaran", "text"=> "Jadwal Pelajaran", "color-text" => "text-success"),
			// array("tipe"=>"dropdown", "icon"=>"command", "text"=> "Data Master", "color-text" => "text-yellow", "list" => array(
			// 	array("tipe"=>"", "icon"=>"zap", "url"=>"Kelas", "text"=> "Kelas", "color-text" => "text-yellow"),
			// 	array("tipe"=>"", "icon"=>"clipboard", "url"=>"Mapel", "text"=> "Mata Pelajaran", "color-text" => "text-red"),
			// 	array("tipe"=>"", "icon"=>"command", "url"=>"Jurusan", "text"=> "Jurusan", "color-text" => "text-success"),
			// )),
			// array("tipe"=>"dropdown", "icon"=>"users", "text"=> "Manajemen User", "color-text" => "text-blue", "list" => array(
			// 	array("tipe"=>"", "icon"=>"user", "url"=>"Guru", "text"=> "Guru", "color-text" => "text-blue"),
			// 	array("tipe"=>"", "icon"=>"user", "url"=>"Wali_kelas", "text"=> "Wali Kelas", "color-text" => "text-blue"),
			// 	array("tipe"=>"", "icon"=>"users", "url"=>"Siswa", "text"=> "Siswa", "color-text" => "text-blue"),
			// 	array("tipe"=>"", "icon"=>"users", "url"=>"Orangtua", "text"=> "Orang Tua", "color-text" => "text-yellow"),
			// )),
			
			array("tipe"=>"dropdown","icon"=>"book", "text"=>"Rekapitulasi", "color-text" => "text-blue", "list" => array(
				array("url" => "Rekapitulasi/Guru", "text" => "Absensi Guru"),
				array("url" => "Rekapitulasi/Siswa", "text" => "Absensi Siswa"),
				// array("url" => "Dashboard/absensi", "text" => "Absensi ")
			)),
		);
	} else if ($sess_level == "admin") {
		$menu = array(
			// array("tipe"=>"dropdown","icon"=>"airplay", "text"=>"Dashboard", "color-text" => "text-blue", "list" => array(
			// 	array("url" => "Dashboard", "text" => "Utama"),
			// )),
			// array("tipe"=>"", "icon"=>"home", "url"=>"Ruang_ujian", "text"=> "Ruang Ujian", "color-text" => "text-purple"),
			array("tipe"=>"", "icon"=>"calendar", "url"=>"Absensi_siswa", "text"=> "Absensi Siswa", "color-text" => "text-success"),
			array("tipe"=>"dropdown", "icon"=>"book", "text"=> "Ujian", "color-text" => "text-purple", "list" => array(
				array("url" => "Ujian/list", "text" => "Ujian"),
				array("url" => "Ujian/kontrol", "text" => "Kontrol Ujian"),
				array("url" => "Ujian/hasil", "text" => "Hasil Ujian")
			)),
			array("tipe"=>"dropdown", "icon"=>"file-text", "text"=> "Soal", "color-text" => "text-green", "list" => array(
				array("url" => "Paket_soal", "text" => "Paket Soal"),
				array("url" => "Soal", "text" => "Bank Soal")
			)),
			array("tipe"=>"", "icon"=>"speaker", "url"=>"Pengumuman", "text"=> "Pengumuman", "color-text" => "text-purple"),
			array("tipe"=>"", "icon"=>"calendar", "url"=>"Jadwal_pelajaran", "text"=> "Jadwal Pelajaran", "color-text" => "text-success"),
			array("tipe"=>"dropdown", "icon"=>"command", "text"=> "Data Master", "color-text" => "text-yellow", "list" => array(
				array("tipe"=>"", "icon"=>"zap", "url"=>"Kelas", "text"=> "Kelas", "color-text" => "text-yellow"),
				array("tipe"=>"", "icon"=>"clipboard", "url"=>"Mapel", "text"=> "Mata Pelajaran", "color-text" => "text-red"),
				array("tipe"=>"", "icon"=>"command", "url"=>"Jurusan", "text"=> "Jurusan", "color-text" => "text-success"),
			)),
			array("tipe"=>"dropdown", "icon"=>"users", "text"=> "Manajemen User", "color-text" => "text-blue", "list" => array(
				array("tipe"=>"", "icon"=>"user", "url"=>"Guru", "text"=> "Guru", "color-text" => "text-blue"),
				array("tipe"=>"", "icon"=>"user", "url"=>"Wali_kelas", "text"=> "Wali Kelas", "color-text" => "text-blue"),
				array("tipe"=>"", "icon"=>"users", "url"=>"Siswa", "text"=> "Siswa", "color-text" => "text-blue"),
				array("tipe"=>"", "icon"=>"users", "url"=>"Orangtua", "text"=> "Orang Tua", "color-text" => "text-yellow"),
			)),
			array("tipe"=>"dropdown","icon"=>"book", "text"=>"Rekapitulasi", "color-text" => "text-blue", "list" => array(
				array("url" => "Rekapitulasi/Guru", "text" => "Absensi Guru"),
				array("url" => "Rekapitulasi/Siswa", "text" => "Absensi Siswa"),
				// array("url" => "Dashboard/absensi", "text" => "Absensi ")
			)),
		);
	} else if ($sess_level == "orangtua") {
		$menu = array(
			array("tipe"=>"", "icon"=>"airplay", "url"=>"Dashboard/orangtua", "text"=> "Dashboard", "color-text" => "text-purple"),
			array("tipe"=>"", "icon"=>"speaker", "url"=>"Pengumuman/pengumuman", "text"=> "Pengumuman", "color-text" => "text-blue"),
		);
	} else if ($sess_level == "wali kelas") {
		$menu = array(
			array("tipe"=>"", "icon"=>"airplay", "url"=>"Dashboard", "text"=> "Dashboard", "color-text" => "text-purple"),
			array("tipe"=>"", "icon"=>"speaker", "url"=>"Pengumuman", "text"=> "Pengumuman", "color-text" => "text-green"),
		);
	} else if ($sess_level == "kepsek") {
		$menu = array(
			array("tipe"=>"dropdown","icon"=>"airplay", "text"=>"Dashboard", "color-text" => "text-blue", "list" => array(
				array("url" => "Dashboard", "text" => "Utama"),
			)),
			array("tipe"=>"", "icon"=>"speaker", "url"=>"Pengumuman", "text"=> "Pengumuman", "color-text" => "text-purple"),
			array("tipe"=>"", "icon"=>"clipboard", "url"=>"Materi", "text"=> "RPP", "color-text" => "text-red"),
			array("tipe"=>"dropdown","icon"=>"book", "text"=>"Rekapitulasi", "color-text" => "text-blue", "list" => array(
				array("url" => "Rekapitulasi/Guru", "text" => "Absensi Guru"),
				array("url" => "Rekapitulasi/Siswa", "text" => "Absensi Siswa"),
				// array("url" => "Dashboard/absensi", "text" => "Absensi ")
			)),
		);
	} else {
		$menu = array(
			array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard")
		);
		if ($url == "ikut_ujian") {
			$menu = null;
		}
	}

	if ($menu != null) {
		
		$list_menu = "";
		foreach ($menu as $m) {
			if ($m["tipe"] == "dropdown") {
				$list_sub_menu = "";
				$active_menu = "";
				$display = "";
				foreach ($m["list"] as $dd_menu) {	
					$active_sub_menu = "";
					if ($url == $dd_menu['url']) {
						$active_menu = "active";
						$active_sub_menu = "active";
						$display ="d-block";
					} elseif ($url.'/'.$sub_url == $dd_menu['url']){
						$active_menu = "active";
						$active_sub_menu = "active";
						$display ="d-block";
					}
					$list_sub_menu .= '<li><a href="'.base_url().$dd_menu["url"].'" class="'.$active_sub_menu.'">'.$dd_menu["text"].'</a></li>';
				}
				$list_menu .= '<li class="dropdown"><a class="nav-link menu-title '.$active_menu.'" href="javascript:void(0)"><i class="'.$m["color-text"].'" data-feather="'.$m["icon"].'"></i><span>'.$m["text"].'</span></a><ul class="nav-submenu menu-content '.$display.'">';
				$list_menu .= $list_sub_menu;
            	$list_menu .= '</ul></li>';
			} else {
				$active_menu = "";
				if ($url == $m['url']) {
					$active_menu = "active";
				} elseif ($url.'/'.$sub_url == $m['url']){
					$active_menu = "active";
					$active_sub_menu = "active";
					$display ="d-block";
				}
				$list_menu .= '<li><a class="nav-link menu-title link-nav '.$active_menu.'" href="'.base_url().$m['url'].'"><i class="'.$m["color-text"].'" data-feather="'.$m["icon"].'"></i><span>'.$m["text"].'</span></a></li>';
			}
		}

		echo $list_menu;

	}
}
		
function cek_aktif($level_boleh=["admin"]) {
	$CI 	=& get_instance();
	$valid = $CI->session->userdata('admin_valid');
	$admin_id = $CI->session->userdata('admin_id');
	$level = $CI->session->userdata('admin_level');

	if ($valid == false && $admin_id == "") {
		if ($CI->input->is_ajax_request()) {
			j(['success'=>false,'message'=>'Sesi habis. Harap login lagi']);
			exit;
		}
		redirect('Auth');
	} else {
		if (!in_array($level, $level_boleh)) {
			exit("No Akses");
		}
	}
}


function kirim_email($kepada, $teks, $subyek = "Akun Ujian Online", $provider = "smtptogo") {

    $ci = &get_instance();
    $ci->load->library('email');

    if ($provider == "smtptogo") {
        $config = array(
            'protocol'  => 'smtp', // smtp / mail
            'smtp_host' => 'mail.smtp2go.com',
            'smtp_port' => 2525,
            'smtp_user' => 'support@drjasamarga.id',
            'smtp_pass' => 'nusantaraprima',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
        );
    } 

    $ci->email->initialize($config);
    $ci->email->from($ci->config->item('email_pengirim'), 'Ujian Online');
    $ci->email->to($kepada);
    $ci->email->set_newline("\r\n");

    $ci->email->subject($subyek);
    $ci->email->message($teks);

    $ci->email->send();

    return $ci->email->print_debugger();
}

function download($url){
	$ci = &get_instance();
	$ci->load->library('user_agent');
	if ($ci->agent->is_referral())
	{
		echo $ci->agent->referrer();
	}

	force_download($url, null);
	redirect($_SERVER['HTTP_REFERER']);
}

function btn_warna($index)
{
	switch ($index) {
		case '1':
			$btn = 'primary';
			break;
		case '2':
			$btn = 'secondary';
			break;
		case '3':
			$btn = 'success';
			break;
		case '4':
			$btn = 'info';
			break;
		case '5':
			$btn = 'warning';
			break;
		case '6':
			$btn = 'danger';
			break;
		case '7':
			$btn = 'primary';
			break;
		case '8':
			$btn = 'light';
			break;
		case '9':
			$btn = 'success';
			break;
		case '10':
			$btn = 'secondary';
			break;
		case '11':
			$btn = 'warning';
			break;
		case '12':
			$btn = 'light';
			break;
		default:
			$btn = 'primary';
		  break;
	  }

	  return $btn;
}

function encrypt_decrypt($string, $action)
{
	$encrypt_method = "AES-256-CBC";
	$secret_key = 'ujian-5323565981'; // user define private key 
	$secret_iv = '3620347140'; // user define secret key
	$key = hash('sha256', $secret_key);
	$iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
	if ($action == 'encrypt') {
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	} else if ($action == 'decrypt') {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}
	return $output;
}

