<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{

    var $table = 'users';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_all_users()
    {
        $this->db->from('users');
        $query=$this->db->get();
        return $query->result();
    }


    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('UserId',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function user_add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert('UserId',$id);
    }

    public function user_update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected('rows');
    }

    public function delete_by_id($id)
    {
        $this->db->where('UserId', $id);
        $this->db->delete($this->table);
    }


    //burayı da yazacagız...
    public function user_login_control_data($email,$password)
    {

        $query=$this->db->get_where('users',array('Email' =>$email ,'Password' =>$password));
        $row=$query->row();
        if(isset($row))
        {
          $user_data['isLogin']=true;
          $user_data['username']= $row->UserName.' '.$row->UserSurname;
          $user_data['taskid']= $row->TaskId;
          $user_data['userid']=$row->UserId;
          return $user_data;
        }
        else
        {
          return 0;
        }
    }
}
