<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyDirectory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');

	}
	public function index(){
		// echo "<pre>";print_r($map);die;
		$this->load->view('mydirectory');
	}
	public function getdata(){
		if($this->input->post('table_type')=="deleted_files"){
		  $data = directory_map('./assets/mydirectory/trash');
		}else{
		  $data = directory_map('./assets/mydirectory/files');
		}
		echo json_encode($data);
	}
	public function delete_file(){
		$file_name=$this->input->post('file_name');
		$destinationFilePath = './assets/mydirectory/trash/'.$file_name;
		$filePath='./assets/mydirectory/files/'.$file_name;
		if(rename($filePath, $destinationFilePath)){
            echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}

	public function Upload(){
		$config['upload_path']="./assets/mydirectory/files";
        $config['allowed_types']='txt|doc|docx|pdf|png|jpeg|jpg|gif';
        $config['max_size']     = 2048;
        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload('file'))
          {
            $data = array('error' => $this->upload->display_errors());
          }
        else
        {
            $data = array('upload_data' => $this->upload->data());
        }
        echo json_encode($data);
	}
}