<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileview extends CI_Controller
{
	public function index()
	{
		$this->load->database();
		$this->load->library('session');
		if(isset($_FILES['userfile']))
		{
			if(!($_FILES['userfile']['error'])){
				$name = md5(time().rand(1,99).$_FILES['userfile']['name']);
				$ext = explode('.', $_FILES['userfile']['name']);
				$ext = $ext[count($ext)-1];
				$path = './uploads/'.$name[0].'/'.$name[1];
				$linkkey = md5(time().rand(1,9));
				if(!file_exists($path)){
					mkdir($path, 0777,true);
				}
				move_uploaded_file($_FILES['userfile']['tmp_name'], $path.'/'.$name.'.'.$ext);
				$datafiles = [
					'Id_User' => $_SESSION['id'],
					'Link' => $path.'/'.$name.'.'.$ext,
					'Link_Key' => $linkkey
				];
				$this->db->insert('files', $datafiles);
			}
		}
		unset($_POST);
		$this->db->select('Link');
		$this->db->where('Id_User',$_SESSION['id']);
		$query = $this->db->get('files');
		$data['userFiles'] = $query->result_array();
		$this->load->view('Fileview/index', $data);
	}
}


