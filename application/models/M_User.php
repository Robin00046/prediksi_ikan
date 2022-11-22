<?php

class M_User extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('user')->result();
    }
    // fungsi cek login
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

}
