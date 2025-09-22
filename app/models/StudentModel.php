<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: StudentModel
 * 
 * Automatically generated via CLI.
 */
class StudentModel extends Model {

    /**
     * Table associated with the model.
     * @var string
     */
    protected $table = 'students';

    /**
     * Primary key of the table.
     * @var string
     */
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function page($q = '', $records_per_page = null, $page = null)
    {
        if(is_null($page)) {
            return $this->db->table('students')->getAll();
        } else {
            $query = $this->db->table('students');

            $query->like('id','%'.$q.'%')
                ->or_like('last_name','%'.$q.'%')
                ->or_like('first_name','%'.$q.'%')
                ->or_like('email','%'.$q.'%');
            
            $countQuery = clone $query;
            $data['total_rows'] = $countQuery
                ->select_count('*', 'count')
                ->get()['count'];

            $data['records'] = $query
                ->pagination($records_per_page,$page)
                ->get_all();
            
            return $data;
        }
    }
}
