<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Security Library
 * 
 * 중앙화된 보안 검증 라이브러리
 * - 입력값 검증
 * - SQL Injection 방지
 * - XSS 방지
 * 
 * @author Security Team
 * @version 1.0
 * @date 2024-11-06
 */
class Security_lib {
    
    protected $CI;
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }
    
    /**
     * 정수 검증 및 변환
     * 
     * @param mixed $value 검증할 값
     * @param int $min 최소값 (기본: 1)
     * @param int $max 최대값 (기본: PHP_INT_MAX)
     * @return int|false 검증된 정수 또는 false
     */
    public function validate_int($value, $min = 1, $max = PHP_INT_MAX)
    {
        if (!is_numeric($value)) {
            return false;
        }
        
        $int_value = intval($value);
        
        if ($int_value < $min || $int_value > $max) {
            return false;
        }
        
        return $int_value;
    }
    
    /**
     * 정수 배열 검증
     * 
     * @param array $array 검증할 배열
     * @param int $min 최소값
     * @param int $max 최대값
     * @return array 검증된 정수 배열
     */
    public function validate_int_array($array, $min = 1, $max = PHP_INT_MAX)
    {
        if (!is_array($array)) {
            return array();
        }
        
        $safe_array = array();
        foreach ($array as $value) {
            $safe_value = $this->validate_int($value, $min, $max);
            if ($safe_value !== false) {
                $safe_array[] = $safe_value;
            }
        }
        
        return $safe_array;
    }
    
    /**
     * 문자열 검증 (SQL Injection 방지)
     * 
     * @param string $string 검증할 문자열
     * @param int $max_length 최대 길이
     * @return string 이스케이핑된 문자열
     */
    public function validate_string($string, $max_length = 255)
    {
        if (!is_string($string)) {
            return '';
        }
        
        // 길이 제한
        if (strlen($string) > $max_length) {
            $string = substr($string, 0, $max_length);
        }
        
        // SQL Injection 방지
        return $this->CI->db->escape_str($string);
    }
    
    /**
     * 이메일 검증
     * 
     * @param string $email 검증할 이메일
     * @return string|false 검증된 이메일 또는 false
     */
    public function validate_email($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->CI->db->escape_str($email);
        }
        
        return false;
    }
    
    /**
     * 전화번호 검증
     * 
     * @param string $phone 검증할 전화번호
     * @return string|false 검증된 전화번호 또는 false
     */
    public function validate_phone($phone)
    {
        // 숫자와 하이픈만 허용
        $phone = preg_replace('/[^0-9\-]/', '', $phone);
        
        // 한국 전화번호 패턴 검증
        if (preg_match('/^(01[0-9]{1})-?([0-9]{3,4})-?([0-9]{4})$/', $phone, $matches)) {
            return $matches[1] . '-' . $matches[2] . '-' . $matches[3];
        }
        
        return false;
    }
    
    /**
     * 게시판 코드 검증 (화이트리스트)
     * 
     * @param string $code 게시판 코드
     * @return string|false 검증된 코드 또는 false
     */
    public function validate_board_code($code)
    {
        // 허용된 게시판 코드 목록 (화이트리스트)
        $allowed_codes = array(
            'notice', 'qna', 'review', 'trading', 'corner', 
            'diary', 'communication', 'future', 'huntaek', 
            'tomorrow', 'free', 'faq'
        );
        
        if (in_array($code, $allowed_codes)) {
            return $code;
        }
        
        return false;
    }
    
    /**
     * 사용자 타입 검증
     * 
     * @param int $type 사용자 타입
     * @return int|false 검증된 타입 또는 false
     */
    public function validate_user_type($type)
    {
        $type = intval($type);
        
        // 1-9 사이의 값만 허용
        if ($type >= 1 && $type <= 9) {
            return $type;
        }
        
        return false;
    }
    
    /**
     * 날짜 검증
     * 
     * @param string $date 검증할 날짜
     * @param string $format 날짜 형식
     * @return string|false 검증된 날짜 또는 false
     */
    public function validate_date($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        
        if ($d && $d->format($format) === $date) {
            return $date;
        }
        
        return false;
    }
    
    /**
     * XSS 방지 필터링
     * 
     * @param string $string 필터링할 문자열
     * @param bool $allow_html HTML 허용 여부
     * @return string 필터링된 문자열
     */
    public function xss_clean($string, $allow_html = false)
    {
        if ($allow_html) {
            // 특정 HTML 태그만 허용
            $allowed_tags = '<p><br><strong><em><u><h1><h2><h3><h4><h5><h6><ul><ol><li><a><img>';
            $string = strip_tags($string, $allowed_tags);
            
            // 위험한 속성 제거
            $string = preg_replace('/<(\w+)([^>]*?)on\w+\s*=\s*["\']?[^"\']*["\']?([^>]*)>/i', '<$1$2$3>', $string);
            $string = preg_replace('/<(\w+)([^>]*?)javascript\s*:([^>]*)>/i', '<$1$2$3>', $string);
        } else {
            // 모든 HTML 제거
            $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        }
        
        return $string;
    }
    
    /**
     * 파일명 검증
     * 
     * @param string $filename 검증할 파일명
     * @return string 안전한 파일명
     */
    public function validate_filename($filename)
    {
        // 위험한 문자 제거
        $filename = preg_replace('/[^a-zA-Z0-9\-\_\.]/', '', $filename);
        
        // 이중 확장자 방지
        $filename = preg_replace('/\.+/', '.', $filename);
        
        // 경로 탐색 방지
        $filename = str_replace(array('../', '..\\'), '', $filename);
        
        return $filename;
    }
    
    /**
     * SQL WHERE 조건 생성 (안전한)
     * 
     * @param array $conditions 조건 배열
     * @return string WHERE 절
     */
    public function build_where_clause($conditions)
    {
        $where_parts = array();
        
        foreach ($conditions as $field => $value) {
            // 필드명 검증 (영문, 숫자, 언더스코어만 허용)
            if (!preg_match('/^[a-zA-Z0-9_\.]+$/', $field)) {
                continue;
            }
            
            if (is_array($value)) {
                // IN 조건
                $safe_values = $this->validate_int_array($value);
                if (!empty($safe_values)) {
                    $where_parts[] = "$field IN (" . implode(',', $safe_values) . ")";
                }
            } elseif (is_numeric($value)) {
                // 숫자 조건
                $where_parts[] = "$field = " . intval($value);
            } else {
                // 문자열 조건
                $safe_value = $this->validate_string($value);
                $where_parts[] = "$field = '" . $safe_value . "'";
            }
        }
        
        return implode(' AND ', $where_parts);
    }
    
    /**
     * 보안 로그 기록
     * 
     * @param string $type 로그 타입
     * @param string $message 로그 메시지
     * @param array $data 추가 데이터
     */
    public function security_log($type, $message, $data = array())
    {
        $log_data = array(
            'log_type' => $type,
            'log_message' => $message,
            'user_id' => isset($_SESSION['__SS_USER_ID__']) ? $_SESSION['__SS_USER_ID__'] : 'anonymous',
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'request_uri' => $_SERVER['REQUEST_URI'],
            'log_date' => date('Y-m-d H:i:s'),
            'additional_data' => json_encode($data)
        );
        
        // 로그 파일에 기록
        $log_file = APPPATH . 'logs/security_' . date('Y-m-d') . '.log';
        $log_message = date('[Y-m-d H:i:s]') . ' [' . $type . '] ' . $message . ' | ' . json_encode($log_data) . PHP_EOL;
        file_put_contents($log_file, $log_message, FILE_APPEND | LOCK_EX);
    }
}
