<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        if (!isset($_SESSION['login'])) {
            header('location: /Users/login');
            exit();
        }
        $sesuserid = $_SESSION['id'];
        $sesuserlog = $_SESSION['login'];
        $this->db->select('Link');
        $this->db->where('Id_User', $sesuserid);
        $query = $this->db->get('files');
        $data['userFiles'] = $query->result_array();
        $data['sesuserlog'] = $sesuserlog;
        $this->load->view('Fileview/index', $data);
//				$name = md5(time().rand(1,99).$_FILES['userfile']['name']);
//				$ext = explode('.', $_FILES['userfile']['name']);
//				$ext = $ext[count($ext)-1];
//				$path = './uploads/'.$name[0].'/'.$name[1];
//				$linkkey = md5(time().rand(1,9));
//				if(!file_exists($path)){
//					mkdir($path, 0777,true);
//				}
//				move_uploaded_file($_FILES['userfile']['tmp_name'], $path.'/'.$name.'.'.$ext);
//				$datafiles = [
//					'Id_User' => $_SESSION['id'],
//					'Link' => $path.'/'.$name.'.'.$ext,
//					'Link_Key' => $linkkey
//				];
//				$this->db->insert('files', $datafiles);
//			}
    }
    public function load()
    {
        $sesuserid = $_SESSION['id'];
        $sesuserlog = $_SESSION['login'];
        $this->load->model('Basefile/Upload', 'upload');
        if (isset($_FILES['userfile'])) {
            if (!($_FILES['userfile']['error'])) {
                $username = $_FILES['userfile']['name'];
                $usernametmp = $_FILES['userfile']['tmp_name'];
                $this->upload->uploadfile($username, $usernametmp, $sesuserid);
            }
            $this->db->select('Link');
            $this->db->where('Id_User', $sesuserid);
            $query = $this->db->get('files');
            $data['userFiles'] = $query->result_array();
            $data['sesuserlog'] = $sesuserlog;
            header('location:/Fileview/index');
            exit();
        }
    }
}


