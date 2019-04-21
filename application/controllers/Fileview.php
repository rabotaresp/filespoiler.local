<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileview extends CI_Controller
{
	public function index()
	{
//		$this->load->database();
//		$this->load->library('session');
//		echo'<pre>';
//
//		if(!$_SESSION['id']){
//			$this->load->view('/Users/login');
//		}
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
				$upload = move_uploaded_file($_FILES['userfile']['tmp_name'], $path.'/'.$name.'.'.$ext);
//				echo ($upload)?'file success uploaded': 'file not uploaded';
				$this->load->library('session');
				$this->load->database();
				$datafiles = [
					'Id_User' => $_SESSION['id'],
					'Link' => $path.'/'.$name.'.'.$ext,
					'Link_Key' => $linkkey
				];
				$this->db->insert('files', $datafiles);
			}
		}
//		$this->db->select('Link')
//				 ->where('Id_User' == $_SESSION['id'])
//				 ->from('files');
//		$query = $this->db->get();
		$this->load->view('/Fileview/index');
	}
}


