<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Admin_model extends CI_Model 
{
    protected $table = 'admin';
    protected $primaryKey = 'uuid';
    protected $fillable;

    public function __construct()
    {
        parent::__construct();
        $this->fillable = (object)[
            'username'=>'nama_pengguna',
            'email'=>'email',
            'password'=>'password'
        ];
    }

    public function validateuser($data)
    {
        $this->db->where($this->fillable->email, $data->email);
        $this->db->where($this->fillable->password, $data->password);
        
        return $this->db->get($this->table);
    }                        
                        
}


/* End of file Admin_model.php and path \application\models\Admin_model.php */
