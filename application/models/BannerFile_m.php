<?php

class BannerFile_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    ## 파일 리스트
    public function getFile($where="")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by("no", "DESC");
        $rs = $this->db->get("tbl_banner_files");
        $rows = $rs->result_array();

        return $rows;
    }

    ## 파일 저장
    public function saveFile($finalFilesData=[], $owner_no, $oldFileArray=[])
    {
       
        $error_check=0;
        ## 파일이 있는만큼만 반복
        foreach ($finalFilesData as $index => $value) {
            ## 기존 파일 있으면 지운다
            @unlink($_SERVER['DOCUMENT_ROOT'] . $oldFileArray[$index]);
            $this->db->delete('tbl_banner_files', array('fk_banner_no'=>$owner_no, 'no' => $index));

            $insertData = array(
                'file_name' => $value['client_name']
                ,'sys_file_name' => $value['file_name']
                ,'fk_banner_no' => $owner_no
                ,'file_path' => str_replace($_SERVER['DOCUMENT_ROOT'], "",$value['full_path'])
                ,'filesize' => $value['file_size']
                ,'created_date'=>date('YmdHis')
                ,'file_sno' => $index
            );
       
            $this->db->insert('tbl_banner_files', $insertData);
            $error_array = $this->db->error();
            if(!empty($error_array['code']) ){
                $error_check++;
            }
        }

        return $error_check;
    }

    ## 파일 삭제
    public function deleteFile($no)
    {
        $where = " fk_banner_no='".$no."'";
        $rows = $this->getFile($where);
        foreach ($rows as $index => $value) {
            @unlink($_SERVER['DOCUMENT_ROOT'] . $value['file_path']);
        }
        $this->db->delete('tbl_banner_files', array('fk_banner_no'=>$no));
        return $this->db->error();
    }
}