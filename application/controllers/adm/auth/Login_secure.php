<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login Controller (보안 강화 버전)
 * 
 * Security_lib와 Query Builder를 활용한 안전한 로그인 구현
 * 
 * @author Security Team
 * @version 2.0
 * @date 2024-11-06
 */
class Login_secure extends CI_Controller {

    protected $security;
    
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->database();
        $this->load->model("user_m_secure");
        $this->load->library('security_lib');
        $this->security = $this->security_lib;
    }

    /**
     * 로그인 화면
     */
    public function index()
    {
        $this->load->view('auth/login');
    }

    /**
     * 로그인 처리 (보안 강화)
     */
    public function check()
    {
        // CSRF 토큰 검증 (선택사항)
        // $this->security_check_csrf();
        
        // 입력값 받기
        $user_id = $this->input->post('user_id', TRUE);
        $user_pw = $this->input->post('user_pw', TRUE);
        
        // 입력값 검증
        if (empty($user_id) || empty($user_pw)) {
            $this->security->security_log('LOGIN_ATTEMPT', 'Empty credentials', array());
            alert("아이디와 비밀번호를 입력해주세요.");
            return;
        }
        
        // 브루트포스 공격 방지 (5회 실패 시 5분 차단)
        if ($this->check_login_attempts($_SERVER['REMOTE_ADDR']) >= 5) {
            $this->security->security_log('LOGIN_BLOCKED', 'Too many failed attempts', array('ip' => $_SERVER['REMOTE_ADDR']));
            alert("로그인 시도가 너무 많습니다. 5분 후 다시 시도해주세요.");
            return;
        }
        
        // 로그인 검증 (Query Builder 사용)
        $user = $this->user_m_secure->login_check($user_id, $user_pw, 9);
        
        if ($user) {
            // 로그인 성공
            $this->reset_login_attempts($_SERVER['REMOTE_ADDR']);
            
            // 세션 재생성 (세션 고정 공격 방지)
            session_regenerate_id(true);
            
            // 세션 데이터 설정
            $_SESSION['__SS_ADM_NO__'] = $user['user_no'];
            $_SESSION['__SS_USER_NO__'] = $user['user_no'];
            $_SESSION['__SS_USER_ID__'] = $user['user_id'];
            $_SESSION['__SS_USER_NAME__'] = $user['user_name'];
            $_SESSION['__SS_USER_TYPE__'] = $user['user_type'];
            $_SESSION['__SS_LOGIN_TIME__'] = time();
            $_SESSION['__SS_LOGIN_IP__'] = $_SERVER['REMOTE_ADDR'];
            
            // 마지막 로그인 정보 업데이트
            $this->update_last_login($user['user_no']);
            
            // 로그 기록
            $this->security->security_log('ADMIN_LOGIN_SUCCESS', 'Admin login successful', array(
                'user_id' => $user_id,
                'user_no' => $user['user_no']
            ));
            
            alert("로그인 되었습니다", "/adm/member/user");
            
        } else {
            // 로그인 실패
            $this->increment_login_attempts($_SERVER['REMOTE_ADDR']);
            
            // 로그 기록
            $this->security->security_log('ADMIN_LOGIN_FAILED', 'Admin login failed', array(
                'user_id' => $user_id,
                'ip' => $_SERVER['REMOTE_ADDR']
            ));
            
            alert("로그인 실패\\n관리자에게 문의 바랍니다.");
        }
    }
    
    /**
     * 로그아웃
     */
    public function logout()
    {
        // 로그 기록
        $this->security->security_log('ADMIN_LOGOUT', 'Admin logout', array(
            'user_id' => $_SESSION['__SS_USER_ID__']
        ));
        
        // 세션 파괴
        session_destroy();
        
        redirect('/adm/auth/login');
    }
    
    /**
     * 로그인 시도 횟수 확인
     */
    private function check_login_attempts($ip)
    {
        $this->db->select('COUNT(*) as cnt');
        $this->db->from('tbl_login_attempts');
        $this->db->where('ip_address', $ip);
        $this->db->where('attempt_time >', date('Y-m-d H:i:s', strtotime('-5 minutes')));
        
        $query = $this->db->get();
        $result = $query->row_array();
        
        return isset($result['cnt']) ? $result['cnt'] : 0;
    }
    
    /**
     * 로그인 시도 횟수 증가
     */
    private function increment_login_attempts($ip)
    {
        $data = array(
            'ip_address' => $ip,
            'attempt_time' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_login_attempts', $data);
    }
    
    /**
     * 로그인 시도 횟수 초기화
     */
    private function reset_login_attempts($ip)
    {
        $this->db->where('ip_address', $ip);
        $this->db->delete('tbl_login_attempts');
    }
    
    /**
     * 마지막 로그인 정보 업데이트
     */
    private function update_last_login($user_no)
    {
        $data = array(
            'last_login_date' => date('Y-m-d H:i:s'),
            'last_login_ip' => $_SERVER['REMOTE_ADDR']
        );
        
        $this->db->where('user_no', $user_no);
        $this->db->update('tbl_user', $data);
    }
    
    /**
     * 세션 타임아웃 체크
     */
    public function check_session_timeout()
    {
        if (isset($_SESSION['__SS_LOGIN_TIME__'])) {
            $timeout = 30 * 60; // 30분
            
            if (time() - $_SESSION['__SS_LOGIN_TIME__'] > $timeout) {
                $this->logout();
                return false;
            }
            
            // 활동 시간 갱신
            $_SESSION['__SS_LOGIN_TIME__'] = time();
        }
        
        return true;
    }
}
