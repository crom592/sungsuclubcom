<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("account_m");
        $this->load->model("fee_m");
        $this->load->model("user_m");
        $this->load->model("symposium_m");
    }

    public function index()
    {


        $where = "1=1 and is_del=0";

        $rows = $this->account_m->list($where);

        $data['list'] = $rows;


        $this->load->view('/admin/account/index', $data);
    }

    public function list()
    {


        $where = "1=1 and is_del=0";

        $rows = $this->account_m->list($where);

        $data['list'] = $rows;


        $this->load->view('/admin/account/list', $data);
    }

    public function list_detail()
    {


        $where = "1=1 and is_del=0";

        $rows = $this->account_m->list($where);

        $data['list'] = $rows;


        $this->load->view('/admin/account/list_detail', $data);
    }

    

    public function bank()
    {


        $where = "1=1 and is_del=0";

        $rows = $this->account_m->list($where);

        $data['list'] = $rows;


        $this->load->view('/admin/account/bank', $data);
    }

    public function bank_write()
    {



        $this->load->view('/admin/account/bank_write', $data);
    }
    
    public function payment_items()
    {

        $where = '';
        $rows = $this->fee_m->list($where, 'tbl_fee_category');
        $data['category_list'] = $rows;

        $userTypeRows = $this->user_m->userTypeLayer(' organization=1');

        if($userTypeRows) {
            foreach($userTypeRows as $value) {
                $user_type[$value['no']] = $value['user_no'].'::'.$value['user_type_name'];
            }
        }

        $where = " is_del=0";

        $rows = $this->fee_m->list($where, 'tbl_fee');
       
        
        foreach ($rows as $key => $value) {
            $data['list'][$value['fee_division']][] = array('no'=>$value['no'], 'fk_user_layer_id'=>$value['fk_user_layer_id'],'fee_name'=>$value['fee_name'], 'price'=>$value['price']);
        }

        $data['user_type'] = $user_type;


        $this->load->view('/admin/account/info_01', $data);
    }

    public function info_write()
    {


        $rows = $this->fee_m->list($where,'','','', 'tbl_fee_category');

        $data['category_list'] = $rows;

        $userTypeRows = $this->user_m->userTypeLayer(' organization=1');

        if($userTypeRows) {
            foreach($userTypeRows as $value) {
                $a = $value['user_no'].'::'.$value['no'];
                $user_type[$a] = $value['user_type_name'];
            }
        }

        $data['user_type'] = $user_type;

        $where = "1=1 and end_yn='N'";
        $rows = $this->symposium_m->list($where,'','','', 'tbl_symposium');

        $data['sym_list'] = $rows;


        $this->load->view('/admin/account/info_write', $data);
    }
    
}