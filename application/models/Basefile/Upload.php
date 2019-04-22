<?php
class Upload extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	public function uploadfile($uname, $unametmp){
		$name = md5(time().rand(1,99).$uname);
		$ext = explode('.', $uname);
		$ext = $ext[count($ext)-1];
		$path = './uploads/'.$name[0].'/'.$name[1];
		$linkkey = md5(time().rand(1,9));
		if(!file_exists($path)){
					mkdir($path, 0777,true);
		}
		if(move_uploaded_file($unametmp, $path.'/'.$name.'.'.$ext)){
            $datafiles = [
                'Id_User' => $_SESSION['id'],
                'Link' => $path.'/'.$name.'.'.$ext,
                'Link_Key' => $linkkey
            ];
            $this->db->insert('files', $datafiles);
        }

	}
}
