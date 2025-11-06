<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("account_m");
        $this->load->model("fee_m");
    }

    public function bank()
    {


        $where = "1=1 and is_del=0";

        $rows = $this->account_m->list($where);

        $data['list'] = $rows;
 
        $data['totalRows'] = $totalRows;
        $data['number_per_page'] = $number_per_page;

        $data['param'] = $parse_str;

        $this->load->view('/admin/account/bank', $data);
    }
    
    public function setAccount()
    {
        
        $no = $_POST['no'] ? $_POST['no']:'';
  /*      if(!$_POST['no']) {
            echo 3;
            exit;
        }*/

 
        if($_POST['no']) {

            if($_POST['gubun']=='del') {
                $insertData = array("is_del"=>1);
            } else {
                $insertData = array("bank_name"=>$_POST['bank_name'], "account_num"=>$_POST['account_num'], "depositor"=>$_POST['depositor']);
            }

            $where = "no=$no";



            $rs = $this->account_m->update($insertData, $where);

            if($rs) {           
                echo 1;
            }else {
                echo 3;
            }  


        } else {
            $insertData = array("bank_name"=>$_POST['bank_name'], "account_num"=>$_POST['account_num'], "depositor"=>$_POST['depositor']);

            $rs = $this->account_m->store($insertData);

            if($rs) {           
                echo 1;
            }else {
                echo 3;
            }  

        }

    }

    public function setFee()
    {
        
        $no = $_POST['no'] ? $_POST['no']:'';
 
        if($_POST['no']) {

            if($_POST['gubun']=='del') {
                $insertData = array("is_del"=>1);
            } else {
                $insertData = array("fee_name"=>$_POST['fee_name'], "price"=>$_POST['price']);
            }

            $where = "no=$no";



            $rs = $this->fee_m->update($insertData, $where);

            if($rs) {           
                echo 1;
            }else {
                echo 3;
            }  


        } else {
            $uid = explode(':', $_POST['fee_division_uid']);
            $layer_id = explode('::', $_POST['fk_user_layer_id']);
    
            $insertData = array("fee_division"=>$_POST['fee_division'], "fee_name"=>$_POST['fee_name'] ,  "price"=>$_POST['price'], "fee_order"=>$_POST['fee_order'], "fee_division_uid"=>$uid[1], "fk_symposium_no"=>$uid[0], "fk_user_layer_id"=>$layer_id[1], "fk_user_type_no"=>$layer_id[0]);

            $rs = $this->fee_m->store($insertData);

            if($rs) {           
                echo 1;
            }else {
                echo 3;
            }  

        }

    }
}