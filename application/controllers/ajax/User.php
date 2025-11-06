<?php
//error_reporting(E_ALL);
date_default_timezone_set('Asia/Seoul');
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("user_m");
    }

    public function delSpecialText($str) {
        return preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $str);
    }

    ## 회원 리스트 화면

    ## 아이디 중복체크
    public function idCheck()
    {
        $requestData = $_GET;
        $user_id = isset($requestData['user_id']) ? $requestData['user_id'] : '';

        $user_id = $this->delSpecialText($user_id);

        $where = "user_id = '" . $this->delSpecialText($user_id) . "'";
        $rows = $this->user_m->list($where, '', '', '');
        $returnData = 'N';
        if (count($rows) > 0) {
            $returnData = 'Y';
        }

        echo $returnData;
    }

    ## 닉네임 중복체크
    public function nicknameCheck()
    {
        $requestData = $_GET;
        $user_nickname = isset($requestData['user_nickname']) ? $requestData['user_nickname'] : '';

        $where = "user_nickname = '" . $this-delSpecialText($user_nickname) . "'";
        $rows = $this->user_m->list($where, '', '', '');
        $returnData = 'N';
        if (count($rows) > 0) {
            $returnData = 'Y';
        }

        echo $returnData;
    }

    ## 연락처 중복체크
    public function phoneCheck()
    {
        $requestData = $_GET;
        $user_phone = isset($requestData['user_phone']) ? $requestData['user_phone'] : '';
        $oldPhone = isset($requestData['oldPhone']) ? $requestData['oldPhone'] : '';

        $where = "user_phone = '".$this->delSpecialText($user_phone)."'";
        if (!empty($oldPhone)){
            $where .= " AND user_phone != '" . $this->delSpecialText($oldPhone) . "'";
        }
        $rows = $this->user_m->list($where, '', '', '');
        $returnData = 'N';
        if (count($rows) > 0) {
            $returnData = 'Y';
        }

        echo $returnData;
    }

    ## 이메일 중복체크
    public function emailCheck()
    {
        $requestData = $_GET;
        $user_email = isset($requestData['user_email']) ? $requestData['user_email'] : '';

        $where = "user_email = '" . $this->delSpecialText($user_email) . "'";
        $rows = $this->user_m->list($where, '', '', '');
        $returnData = 'N';
        if (count($rows) > 0) {
            $returnData = 'Y';
        }

        echo $returnData;
    }
	public function save_user()
	{

        $value_chk = array('user_id', 'user_name','user_nickname', 'user_birth_year', 'user_birth_month', 'user_birth_day', 'user_email','pzip','paddress','paddress_part','user_phone11','user_phone12','user_phone13','user_phone21','user_phone22','user_phone23');

        foreach ($value_chk as $value) {
            if($value!='user_email') {
                $_POST[$value] = $this->delSpecialText($_POST[$value]);
            }
            
                
        }

        $_POST['user_pwd'] = str_replace("'",'',$_POST['user_pwd']);
        $_POST['user_pwd'] = str_replace('"','',$_POST['user_pwd']);
   
        $where = "user_id = '" . $_POST['user_id'] . "'";
        $rows = $this->user_m->list($where, '', '', '');
    
        if (count($rows) > 0) {
            alert('중복된 아이디입니다');
            exit;
        }

      
        $no = isset($_SESSION['__SS_USER_NO__']) ? $_SESSION['__SS_USER_NO__'] : '';

        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $user_pwd = isset($_POST['user_pwd']) ? $_POST['user_pwd'] : '';
        $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '1';
        $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
        $user_nickname = isset($_POST['user_nickname']) ? $_POST['user_nickname'] : '';

        $user_birth_year = isset($_POST['user_birth_year']) ? $_POST['user_birth_year'] : '';
        $user_birth_month = isset($_POST['user_birth_month']) ? $_POST['user_birth_month'] : '';
        $user_birth_day = isset($_POST['user_birth_day']) ? $_POST['user_birth_day'] : '';
        $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
        $user_gender = isset($_POST['user_gender']) ? $_POST['user_gender'] : '';
        
        $book_yn = isset($_POST['book_yn']) ? $_POST['book_yn'] : '';
        $email_yn = isset($_POST['email_yn']) ? $_POST['email_yn'] : '';
       

        $pzip = isset($_POST['pzip']) ? $_POST['pzip'] : '';
        $paddress = isset($_POST['paddress']) ? $_POST['paddress'] : '';
        $paddress_part = isset($_POST['paddress_part']) ? $_POST['paddress_part'] : '';

        $user_phone11 = isset($_POST['user_phone11']) ? $_POST['user_phone11'] : '';
        $user_phone12 = isset($_POST['user_phone12']) ? $_POST['user_phone12'] : '';
        $user_phone13 = isset($_POST['user_phone13']) ? $_POST['user_phone13'] : '';

        $user_phone21 = isset($_POST['user_phone21']) ? $_POST['user_phone21'] : '';
        $user_phone22 = isset($_POST['user_phone22']) ? $_POST['user_phone22'] : '';
        $user_phone23 = isset($_POST['user_phone23']) ? $_POST['user_phone23'] : '';
        

        $user_phone = ($user_phone11&&$user_phone12&&$user_phone13)?$user_phone11.'-'.$user_phone12.'-'.$user_phone13:'';
        $user_phone2 = ($user_phone21&&$user_phone22&&$user_phone23)?$user_phone21.'-'.$user_phone22.'-'.$user_phone23:'';
        $user_birth_day = ($user_birth_year&&$user_birth_month&&$user_birth_day) ? $user_birth_year.'-'.$user_birth_month.'-'.$user_birth_day:'';

        if($no) {
            if(!$user_pwd || !$user_name || !$user_nickname || !$user_phone || !$user_birth_day||!$user_email) {
          
                alert('필수항목값이 없습니다');
            }
        } else {
            if(!$user_id || !$user_pwd || !$user_name || !$user_nickname || !$user_phone || !$user_birth_day||!$user_email) {
             alert('필수항목값이 없습니다');
            }
        }

        
      
        if(!$no) {

            //$rand = coupon_generator(40);
            $insertData = array(
                "user_id" => $user_id,
                "user_pwd" => $user_pwd,
                "user_type" => $user_type,
                "user_name" => $user_name,
                "user_nickname" => $user_nickname,
                "user_phone" => $user_phone,
                "user_birth_day" => $user_birth_day,
                "user_email" => $user_email,
                "user_gender" => $user_gender,

        
                "email_yn" => $email_yn,
                "pzip" => $pzip,
                "paddress" => $paddress,
                "paddress_part" => $paddress_part,
                "user_phone" => $user_phone,
                "user_phone2" => $user_phone2,
              
                "update_date" => date("Y-m-d H:i:s"),
                'reg_date' => date("Y-m-d H:i:s"),
                'exit_yn' => 'N',
                'block_yn' =>'N'
                
            );

            $rs = $this->user_m->store($insertData);


            if($rs) {
                //무료방송청취시간 셋팅
                $free_day = $this->user_m->free_day();

                if($free_day) {
                    $timestamp = strtotime("+$free_day days");
                    $insertData = array(
                        "user_no" => $rs,
                        "start_dt" => date('YmdHis'),
                        "end_dt" => date('YmdHis', $timestamp),
                        "reg_date"=>date("YmdHis")
                    );

                    $rs = $this->user_m->store($insertData, 'tbl_user_live');

                }
                alert("회원가입이 완료 되었습니다", "/member/join/join_done?user_name=$user_name");
            } else {
                alert("회원가입중 에러가 발생하였습니다. 고객센터에 문의바랍니다.");
            }
        } else {
            $updateData= array(

                "user_pwd" => $user_pwd,
                "user_type" => $user_type,
                "user_name" => $user_name,
                "user_nickname" => $user_nickname,
                "user_phone" => $user_phone,
                "user_birth_day" => $user_birth_day,
                "user_email" => $user_email,
                "user_gender" => $user_gender,

        
                "email_yn" => $email_yn,
                "pzip" => $pzip,
                "paddress" => $paddress,
                "paddress_part" => $paddress_part,
                "user_phone" => $user_phone,
                "user_phone2" => $user_phone2,
              
                "update_date" => date("Y-m-d H:i:s")

            );

            $where = "user_no=" . $no;
            $rs = $this->user_m->update($updateData, $where);

            if($rs) {
                alert("회원정보가 수정 되었습니다");
            }else {
                alert("회원수정중 에러가 발생하였습니다.");
            }
        }
        
	}

    public function save_user_f()
    {
      
    }
    //튜링회원정보연동용
    public function userInfo()
    {
        
        if($_GET['user_id']) {
            $id = $_GET['user_id'];
        } else if($_GET['userId']) {
            $id = $_GET['userId'];
        }
        $where = "user_id = '" . $id . "'";
        $rows = $this->user_m->list($where, "");


        if($rows[0]['user_id']=="") {
            echo 'null';
        } else {
            
            if($rows[0]['is_leader'] == "1"){
                $leader = "Y";
            } else {
                $leader = "N";  
            }
            echo $rows[0]['user_id'].":".$rows[0]['user_nickname'].":".$leader.":".$rows[0]['imsi_pwd'];
            //print_r($_SESSION);
        }
    }

    public function withdrawal()
    {
        sessionChk();
        $user_id = $_SESSION['__SS_USER_ID__'];
        $user_pw = isset($_POST['mb_pass']) ? $_POST['mb_pass'] : '';

        $where = "user_id = '" . $user_id . "'";
        
        $where .= " AND user_pwd = '" . $user_pw . "'";

        $where .= " AND exit_yn='N'";
        
        $rows = $this->user_m->list($where, "");
     
        if (empty($rows[0]['user_no'])) {
            alert("패스워드가 다릅니다!\\n관리자에게 문의 바랍니다.");
        }  else {
            $where = "user_no=" . $rows[0]['user_no'];
            $updateData = array('exit_yn'=>'Y', 'break_contents'=>$_POST['break_contents']);
            $rs = $this->user_m->update($updateData, $where);

            session_destroy();
            alert("회원탈퇴 되었습니다", "/");
           

            
        }
    }

    public function deleteArray() 
    {
        $no_list = $_POST['no_list'];

        $this->user_m->deleteArray($no_list);
        echo 1;exit;
    }

   

}