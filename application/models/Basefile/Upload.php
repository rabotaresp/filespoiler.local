<?php
class Upload extends CI_Model {

	public $name;
	public $ext;
	public $path;
	public $linkkey;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	public function uploadfile($uname, $unametmp){
		$this->$name = md5(time().rand(1,99).$this->$uname);
		$this->$ext = explode('.', $this->$uname);
		$this->$ext = $this->$ext[count($this->$ext)-1];
		$this->$path = './uploads/'.$name[0].'/'.$name[1];
		$this->$linkkey = md5(time().rand(1,9));
		if(!file_exists($path)){
					mkdir($path, 0777,true);
				}
		move_uploaded_file($this->$unametmp, $this->$path.'/'.$this->$name.'.'.$this->$ext);
		$datafiles = [
					'Id_User' => $_SESSION['id'],
					'Link' => $this->$path.'/'.$this->$name.'.'.$this->$ext,
					'Link_Key' => $this->$linkkey
				];
				$this->db->insert('files', $datafiles);
	}
}
