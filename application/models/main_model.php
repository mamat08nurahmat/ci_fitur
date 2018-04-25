<?php

class Main_model extends CI_Model
{

		var $table = 'tbl_images';
	
		public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	
	function is_email_available($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get("register");
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	 function insert_image($data)  
      {  
           $this->db->insert("tbl_images", $data);  
      }  
      function fetch_image()  
      {  
           $output = '';  
           $this->db->select("id,name,jenis_file,keterangan");  
           $this->db->from("tbl_images");  
           $this->db->order_by("id", "DESC");  
           $query = $this->db->get();  
           foreach($query->result() as $row)  
           {  
//cek type file		   
/*
                $output .= '  
                     <div class="col-md-2">  
					<a href="'.base_url().'upload/'.$row->name.'" download>
                          <img src="'.base_url().'upload/'.$row->name.'" class="img-responsive img-thumbnail" />  
                     </div>  
					 </a>
                ';  
*/		   
/*
*/
                $output .= '  
                     <div class="col-md-2"> 

					 
<a onclick="delete_('."'".$row->id."'".')"><span class="glyphicon glyphicon-trash"></span></a>					 
					<a href="'.base_url().'upload/'.$row->name.'" download>										
<span class="glyphicon glyphicon-download-alt"></span>					 
					 </a>
                          <img src="'.base_url().'images/download.png" class="img-responsive img-thumbnail" />  
					 <h5>Jenis File :'.$row->jenis_file.'</h5><br>
                 
                     </div>  
                ';  



				

           }  
           return $output;  
      }  
	

		public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	
	
		public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	
	
	
}

?>







