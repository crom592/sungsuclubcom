<?php

/**
 * User Model (보안 강화 버전)
 * 
 * CodeIgniter Query Builder를 사용한 Prepared Statements 구현
 * 
 * @author Security Team
 * @version 2.0
 * @date 2024-11-06
 */
class User_m_secure extends CI_Model
{
    protected $table = 'tbl_user';
    protected $security;
    
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
        $this->load->library('security_lib');
        $this->security = $this->security_lib;
    }

    /**
     * 회원 통계 (Query Builder 사용)
     */
    public function statisticsCount($conditions = array())
    {
        $this->db->select("
            SUM(IF(user_type=1,1,0)) as cnt1,  
            SUM(IF(user_type=2,1,0)) as cnt2, 
            SUM(IF(user_type=3,1,0)) as cnt3, 
            SUM(IF(user_type=4,1,0)) as cnt4, 
            SUM(IF(user_type=5,1,0)) as cnt5, 
            SUM(IF(user_type=6,1,0)) as cnt6, 
            SUM(IF(user_type=7,1,0)) as cnt7, 
            SUM(IF(user_type=8,1,0)) as cnt8, 
            SUM(IF(user_type=9,1,0)) as cnt9
        ");
        
        $this->db->from($this->table);
        
        // 조건 적용 (안전한 방식)
        if (!empty($conditions)) {
            foreach ($conditions as $field => $value) {
                $this->db->where($field, $value);
            }
        }
        
        $query = $this->db->get();
        return $query->row_array();
    }

    /**
     * 회원 타입 목록
     */
    public function userType($conditions = array())
    {
        $this->db->select('type_no, type_name');
        $this->db->from('tbl_user_type');
        
        if (!empty($conditions)) {
            foreach ($conditions as $field => $value) {
                $this->db->where($field, $value);
            }
        }
        
        $this->db->order_by('reg_date', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * 전체 회원 수
     */
    public function totalCount($conditions = array())
    {
        $this->db->select('COUNT(*) as cnt');
        $this->db->from($this->table . ' tu');
        
        if (!empty($conditions)) {
            foreach ($conditions as $field => $value) {
                if (is_array($value)) {
                    $this->db->where_in($field, $value);
                } else {
                    $this->db->where($field, $value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = $query->row_array();
        
        return $result['cnt'];
    }

    /**
     * 회원 목록 (Prepared Statement 사용)
     */
    public function list($conditions = array(), $limit = null, $offset = null, $orderBy = 'user_name ASC')
    {
        $this->db->select('tu.*, tl.start_dt, tl.end_dt, tut.type_name');
        $this->db->from($this->table . ' tu');
        $this->db->join('tbl_user_type tut', 'tu.user_type=tut.type_no', 'LEFT');
        $this->db->join('tbl_user_live tl', 'tu.user_no=tl.user_no', 'LEFT');
        
        // 조건 적용
        if (!empty($conditions)) {
            foreach ($conditions as $field => $value) {
                if (is_array($value)) {
                    $this->db->where_in($field, $value);
                } else {
                    $this->db->where($field, $value);
                }
            }
        }
        
        // 정렬
        if ($orderBy) {
            $order_parts = explode(' ', $orderBy);
            if (count($order_parts) == 2) {
                $this->db->order_by($order_parts[0], $order_parts[1]);
            } else {
                $this->db->order_by($orderBy);
            }
        }
        
        // 페이징
        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * 로그인 검증 (안전한 방식)
     */
    public function login_check($user_id, $password, $user_type = null)
    {
        // 입력값 검증
        $user_id = $this->security->validate_string($user_id, 50);
        $password = $this->security->validate_string($password, 100);
        
        if (empty($user_id) || empty($password)) {
            return false;
        }
        
        // Query Builder 사용
        $this->db->select('tu.*, tl.start_dt, tl.end_dt, tut.type_name');
        $this->db->from($this->table . ' tu');
        $this->db->join('tbl_user_type tut', 'tu.user_type=tut.type_no', 'LEFT');
        $this->db->join('tbl_user_live tl', 'tu.user_no=tl.user_no', 'LEFT');
        
        // Prepared Statement 방식
        $this->db->where('tu.user_id', $user_id);
        $this->db->where('tu.user_pwd', $password);
        
        if ($user_type !== null) {
            $user_type = $this->security->validate_user_type($user_type);
            if ($user_type !== false) {
                $this->db->where('tu.user_type', $user_type);
            }
        }
        
        $query = $this->db->get();
        $result = $query->row_array();
        
        // 로그인 시도 로깅
        if ($result) {
            $this->security->security_log('LOGIN_SUCCESS', 'User login successful', array('user_id' => $user_id));
        } else {
            $this->security->security_log('LOGIN_FAILED', 'User login failed', array('user_id' => $user_id));
        }
        
        return $result;
    }

    /**
     * 회원가입 (안전한 방식)
     */
    public function store($data = array(), $table = 'tbl_user')
    {
        // 입력값 검증
        $safe_data = array();
        
        if (isset($data['user_id'])) {
            $safe_data['user_id'] = $this->security->validate_string($data['user_id'], 50);
        }
        
        if (isset($data['user_pwd'])) {
            $safe_data['user_pwd'] = $this->security->validate_string($data['user_pwd'], 100);
        }
        
        if (isset($data['user_name'])) {
            $safe_data['user_name'] = $this->security->validate_string($data['user_name'], 50);
        }
        
        if (isset($data['user_email'])) {
            $email = $this->security->validate_email($data['user_email']);
            if ($email !== false) {
                $safe_data['user_email'] = $email;
            }
        }
        
        if (isset($data['user_phone'])) {
            $phone = $this->security->validate_phone($data['user_phone']);
            if ($phone !== false) {
                $safe_data['user_phone'] = $phone;
            }
        }
        
        if (isset($data['user_type'])) {
            $type = $this->security->validate_user_type($data['user_type']);
            if ($type !== false) {
                $safe_data['user_type'] = $type;
            }
        }
        
        // 기본값 설정
        $safe_data['reg_date'] = date('Y-m-d H:i:s');
        
        // Query Builder로 삽입
        $this->db->insert($table, $safe_data);
        
        return $this->db->insert_id();
    }

    /**
     * 회원정보 수정 (안전한 방식)
     */
    public function update($data, $user_no, $table = 'tbl_user')
    {
        // user_no 검증
        $user_no = $this->security->validate_int($user_no);
        if ($user_no === false) {
            return false;
        }
        
        // 입력값 검증
        $safe_data = array();
        
        if (isset($data['user_pwd'])) {
            $safe_data['user_pwd'] = $this->security->validate_string($data['user_pwd'], 100);
        }
        
        if (isset($data['user_name'])) {
            $safe_data['user_name'] = $this->security->validate_string($data['user_name'], 50);
        }
        
        if (isset($data['user_email'])) {
            $email = $this->security->validate_email($data['user_email']);
            if ($email !== false) {
                $safe_data['user_email'] = $email;
            }
        }
        
        if (isset($data['user_phone'])) {
            $phone = $this->security->validate_phone($data['user_phone']);
            if ($phone !== false) {
                $safe_data['user_phone'] = $phone;
            }
        }
        
        if (isset($data['user_type'])) {
            $type = $this->security->validate_user_type($data['user_type']);
            if ($type !== false) {
                $safe_data['user_type'] = $type;
            }
        }
        
        if (empty($safe_data)) {
            return false;
        }
        
        // Query Builder로 업데이트
        $this->db->where('user_no', $user_no);
        $this->db->update($table, $safe_data);
        
        return $this->db->affected_rows() > 0;
    }

    /**
     * 회원 타입 일괄 변경 (안전한 방식)
     */
    public function updateUserType($user_nos, $user_type)
    {
        // 입력값 검증
        $safe_user_nos = $this->security->validate_int_array($user_nos);
        $safe_user_type = $this->security->validate_user_type($user_type);
        
        if (empty($safe_user_nos) || $safe_user_type === false) {
            return false;
        }
        
        // Query Builder 사용
        $this->db->where_in('user_no', $safe_user_nos);
        $this->db->update($this->table, array('user_type' => $safe_user_type));
        
        // 로깅
        $this->security->security_log('USER_TYPE_UPDATE', 'Bulk user type update', array(
            'user_nos' => $safe_user_nos,
            'new_type' => $safe_user_type
        ));
        
        return $this->db->affected_rows() > 0;
    }

    /**
     * 회원 삭제 (안전한 방식)
     */
    public function delete($user_no, $table = 'tbl_user')
    {
        // user_no 검증
        $user_no = $this->security->validate_int($user_no);
        if ($user_no === false) {
            return false;
        }
        
        // Query Builder로 삭제
        $this->db->where('user_no', $user_no);
        $this->db->delete($table);
        
        // 로깅
        $this->security->security_log('USER_DELETE', 'User deleted', array('user_no' => $user_no));
        
        return $this->db->affected_rows() > 0;
    }

    /**
     * 회원 일괄 삭제 (안전한 방식)
     */
    public function deleteArray($user_nos, $table = 'tbl_user')
    {
        // 입력값 검증
        $safe_user_nos = $this->security->validate_int_array($user_nos);
        
        if (empty($safe_user_nos)) {
            return false;
        }
        
        // Query Builder로 삭제
        $this->db->where_in('user_no', $safe_user_nos);
        $this->db->delete($table);
        
        // 로깅
        $this->security->security_log('USER_BULK_DELETE', 'Multiple users deleted', array('user_nos' => $safe_user_nos));
        
        return $this->db->affected_rows() > 0;
    }

    /**
     * 무료방송청취기간
     */
    public function free_day()
    {
        $this->db->select('day_set');
        $this->db->from('tbl_free_day_set');
        $this->db->limit(1);
        
        $query = $this->db->get();
        $result = $query->row_array();
        
        return isset($result['day_set']) ? $result['day_set'] : 0;
    }
}
