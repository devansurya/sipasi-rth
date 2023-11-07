<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."core/ControllerBase.php");
class Notification extends ControllerBase {
	function __construct() {
    parent::__construct();
    // $this->load->model('M_materi', 'materi');
    // $this->load->model('M_kelas', 'kelas');
    // $this->load->model('M_mapel', 'mapel');
    
	}

    public function notifUjian($id_ujian) {
        $this->db->select('mm.nama as nama_mapel,mju.nama as jenis_ujian, IFNULL(mj.nama, "") as jurusan, IFNULL(mk.nama, "") as rombel, mt.romawi, mk.id as id_kelas');
		$this->db->from('tr_guru_tes tgt');
		$this->db->join('m_paket_soal mps', 'tgt.id_paket = mps.id', 'left');
        $this->db->join('m_mapel mm','mm.id=mps.id_mapel', 'left');	
		$this->db->join('m_kelas mk', 'tgt.id_kelas = mk.id', 'left');
		$this->db->join('m_jenis_ujian mju', 'tgt.id_jenis_ujian = mju.id', 'left');
		$this->db->join('m_tingkat mt', 'mt.id = mk.id_tingkat', 'left');
		$this->db->join('m_jurusan mj', 'mj.id = mk.id_jurusan', 'left');
        $this->db->where('tgt.id',$id_ujian);
        $dataujian = $this->db->get()->result_array();
        $body = $dataujian[0]['jenis_ujian'].' mata pelajaran '.$dataujian[0]['nama_mapel'].' kelas '.$dataujian[0]['romawi'].' '.$dataujian[0]['jurusan'].' '.$dataujian[0]['rombel'];
        


        $this->db->select('ms.nama, mtu.token');
        $this->db->from('m_siswa ms');
        $this->db->join('m_user mu','ms.id=mu.kon_id');
        $this->db->join('m_token_user mtu', 'mtu.id_user = mu.id', 'left');
        $this->db->where('mu.level', 'siswa');
        $this->db->where('ms.id_kelas', $dataujian[0]['id_kelas']);
        $dataNotif = $this->db->get()->result_array();
      
    
       
            define('FCM_AUTH_KEY', 'AAAACO7Kx34:APA91bGk2761mMwydnLFq8StCtf-4LQq7uas-9AxGlDql1i_dF_P61nh2lmHXv986rlRi7rJIqnHp0SxhP87fXMnglwHeyCusI9CL4h2y-x8gw0elvYY299XvFotcWxKVB9diogfNFGi');
            $icon = "https://staging.e-learning-cendekiaschool.com/staging/terang-bangsa/assets/images/logo/logo_smp.png";
            $url = "https://staging.e-learning-cendekiaschool.com/staging/terang-bangsa";
            foreach ($dataNotif as $key => $row) {
                $postdata = json_encode( 
                    [
                        'notification' => 
                            [
                                'title' => 'Semangat, Ada Ujian Baru!',
                                'body' => $body,
                                'icon' => $icon,
                                'click_action' => $url
                            ]
                        ,
                        'to' => $row['token']
                    ]
                );
            
                $opts = array('http' =>
                    array(
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/json'."\r\n"
                                    .'Authorization: key='.FCM_AUTH_KEY."\r\n",
                        'content' => $postdata
                    )
                );
            
                $context  = stream_context_create($opts);
            
                $result = file_get_contents('https://fcm.googleapis.com/fcm/send', false, $context);
              
            }

            if($result) {
                return json_decode($result);
            } else return false;
            echo 'DUAR';
    }

}