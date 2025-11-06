<?php

class File_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('golfmon', true);
    }

    ## 파일 리스트
    public function getFile($where="")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by("is_gubun", "ASC");
        $rs = $this->db->get("tbl_files");
        $rows = $rs->result_array();

        return $rows;
    }

    ## 파일 저장
    public function saveFile($finalFilesData=[], $owner_no, $owner_name="", $oldFileArray=[])
    {
        $error_check=0;
        ## 파일이 있는만큼만 반복
        foreach ($finalFilesData as $index => $value) {
            ## 기존 파일 있으면 지운다
            @unlink($_SERVER['DOCUMENT_ROOT'] . $oldFileArray[$index]);
            $this->db->delete('tbl_files', array('owner_no' => $owner_no, 'owner_name'=>$owner_name,'file_sno' => $index));

            $insertData = array(
                'file_real_name' => $value['client_name']
                ,'file_name' => $value['file_name']
                ,'owner_name' => $owner_name
                ,'owner_no' => $owner_no
                ,'img_url' => str_replace($_SERVER['DOCUMENT_ROOT'], "",$value['full_path'])
                ,'is_gubun' => $index <= 2 ? $index : 3
                ,'file_sno' => $index
            );
            $this->db->insert('tbl_files', $insertData);
            $error_array = $this->db->error();
            if(!empty($error_array['code']) ){
                $error_check++;
            }
        }

        return $error_check;
    }

    ## 파일 삭제
    public function deleteFile($owner_no, $owner_name)
    {
        $where = "owner_no='" . $owner_no . "' and owner_name='".$owner_name."'";
        $rows = $this->getFile($where);
        foreach ($rows as $index => $value) {
            @unlink($_SERVER['DOCUMENT_ROOT'] . $value['img_url']);
        }
        $this->db->delete('tbl_files', array('owner_no' => $owner_no, 'owner_name'=>$owner_name));
        return $this->db->error();
    }
}