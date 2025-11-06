<?php
/**
 * 보안 테스트 스크립트
 * 
 * 실행 방법: php security_test.php
 * 또는 브라우저에서: http://yourdomain.com/security_test.php
 * 
 * @author Security Team
 * @date 2024-11-06
 */

// CodeIgniter 환경 로드
define('BASEPATH', dirname(__FILE__) . '/system/');
define('APPPATH', dirname(__FILE__) . '/application/');
define('ENVIRONMENT', 'production');

// 테스트 결과 저장
$test_results = array();

// 색상 코드 (터미널용)
$colors = array(
    'red' => "\033[31m",
    'green' => "\033[32m",
    'yellow' => "\033[33m",
    'reset' => "\033[0m"
);

// 브라우저에서 실행 중인지 확인
$is_browser = php_sapi_name() !== 'cli';

function print_result($test_name, $passed, $message = '') {
    global $colors, $is_browser;
    
    if ($is_browser) {
        $color = $passed ? 'green' : 'red';
        echo "<div style='color: $color;'>";
        echo "[" . ($passed ? "PASS" : "FAIL") . "] $test_name";
        if ($message) echo " - $message";
        echo "</div>";
    } else {
        $color = $passed ? $colors['green'] : $colors['red'];
        echo $color . "[" . ($passed ? "PASS" : "FAIL") . "] " . $colors['reset'] . "$test_name";
        if ($message) echo " - $message";
        echo "\n";
    }
}

if ($is_browser) {
    echo "<html><head><title>Security Test</title></head><body>";
    echo "<h1>보안 테스트 스크립트</h1>";
    echo "<pre>";
}

echo "=================================\n";
echo "보안 강화 테스트 시작\n";
echo "=================================\n\n";

// 1. 파일 존재 확인
echo "1. 보안 파일 존재 확인\n";
echo "---------------------------------\n";

$files_to_check = array(
    'Security Library' => APPPATH . 'libraries/Security_lib.php',
    'User Model (Secure)' => APPPATH . 'models/User_m.php',
    'Login Controller' => APPPATH . 'controllers/adm/auth/Login.php',
    'SQL File' => dirname(__FILE__) . '/security_tables.sql'
);

foreach ($files_to_check as $name => $file) {
    $exists = file_exists($file);
    print_result($name, $exists, $exists ? "파일 존재" : "파일 없음");
}

echo "\n";

// 2. 데이터베이스 연결 테스트
echo "2. 데이터베이스 연결 테스트\n";
echo "---------------------------------\n";

try {
    // 데이터베이스 설정 직접 정의
    $db = array(
        'hostname' => 'localhost',
        'username' => 'songdoasset',
        'password' => 'songdo12#$',
        'database' => 'songdoasset'
    );
    
    $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
    
    if ($mysqli->connect_error) {
        print_result("DB 연결", false, $mysqli->connect_error);
    } else {
        print_result("DB 연결", true, "연결 성공");
        
        // 3. 테이블 존재 확인
        echo "\n3. 보안 테이블 확인\n";
        echo "---------------------------------\n";
        
        $tables = array(
            'tbl_login_attempts',
            'tbl_security_logs',
            'tbl_user_sessions',
            'tbl_password_history'
        );
        
        foreach ($tables as $table) {
            $result = $mysqli->query("SHOW TABLES LIKE '$table'");
            $exists = $result && $result->num_rows > 0;
            print_result($table, $exists, $exists ? "테이블 존재" : "테이블 없음");
        }
        
        // 4. SQL Injection 테스트
        echo "\n4. SQL Injection 방어 테스트\n";
        echo "---------------------------------\n";
        
        $test_inputs = array(
            "admin' OR '1'='1" => "SQL Injection 기본",
            "1 OR 1=1" => "숫자 필드 Injection",
            "'; DROP TABLE users; --" => "DROP TABLE 시도",
            "<script>alert('XSS')</script>" => "XSS 공격"
        );
        
        // Security_lib 로드 시뮬레이션
        require_once APPPATH . 'libraries/Security_lib.php';
        
        class CI_Instance {
            public $db;
            public function __construct($mysqli) {
                $this->db = new DB_Instance($mysqli);
            }
        }
        
        class DB_Instance {
            private $mysqli;
            public function __construct($mysqli) {
                $this->mysqli = $mysqli;
            }
            public function escape_str($str) {
                return $this->mysqli->real_escape_string($str);
            }
        }
        
        $CI = new CI_Instance($mysqli);
        $security = new Security_lib();
        $security->CI = $CI;
        
        foreach ($test_inputs as $input => $test_name) {
            // 문자열 검증
            $safe_string = $security->validate_string($input, 255);
            $is_safe = !preg_match('/[\'";]|OR|DROP|SCRIPT/i', $safe_string);
            print_result($test_name, $is_safe, "입력: '$input' → 출력: '$safe_string'");
        }
        
        // 5. 정수 검증 테스트
        echo "\n5. 정수 검증 테스트\n";
        echo "---------------------------------\n";
        
        $int_tests = array(
            "123" => array('expected' => 123, 'name' => '정상 정수'),
            "abc" => array('expected' => false, 'name' => '문자열'),
            "-1" => array('expected' => false, 'name' => '음수'),
            "1 OR 1=1" => array('expected' => false, 'name' => 'SQL Injection')
        );
        
        foreach ($int_tests as $input => $test) {
            $result = $security->validate_int($input);
            $passed = $result === $test['expected'];
            print_result($test['name'], $passed, "입력: '$input' → 결과: " . var_export($result, true));
        }
        
        // 6. 이메일 검증 테스트
        echo "\n6. 이메일 검증 테스트\n";
        echo "---------------------------------\n";
        
        $email_tests = array(
            "test@example.com" => true,
            "invalid.email" => false,
            "test@" => false,
            "@example.com" => false
        );
        
        foreach ($email_tests as $input => $expected) {
            $result = $security->validate_email($input);
            $passed = ($result !== false) === $expected;
            print_result("이메일: $input", $passed);
        }
        
        // 7. 로그 파일 쓰기 권한 테스트
        echo "\n7. 로그 디렉토리 권한 테스트\n";
        echo "---------------------------------\n";
        
        $log_dir = APPPATH . 'logs/';
        $is_writable = is_writable($log_dir);
        print_result("로그 디렉토리", $is_writable, $is_writable ? "쓰기 가능" : "쓰기 불가");
        
        if ($is_writable) {
            // 테스트 로그 작성
            $security->security_log('TEST', 'Security test executed', array('test' => true));
            $log_file = $log_dir . 'security_' . date('Y-m-d') . '.log';
            $log_exists = file_exists($log_file);
            print_result("로그 파일 생성", $log_exists);
        }
        
        $mysqli->close();
    }
} catch (Exception $e) {
    print_result("테스트 실행", false, $e->getMessage());
}

// 8. 성능 테스트
echo "\n8. 성능 테스트\n";
echo "---------------------------------\n";

$start_time = microtime(true);

// 1000번 검증 수행
for ($i = 0; $i < 1000; $i++) {
    $security->validate_int(rand(1, 1000));
    $security->validate_string("test string " . $i, 255);
}

$end_time = microtime(true);
$execution_time = round(($end_time - $start_time) * 1000, 2);

print_result("1000회 검증 수행", $execution_time < 100, "실행 시간: {$execution_time}ms");

// 결과 요약
echo "\n=================================\n";
echo "테스트 완료\n";
echo "=================================\n";

if ($is_browser) {
    echo "</pre>";
    echo "<h2>권장 사항</h2>";
    echo "<ul>";
    echo "<li>모든 테스트가 PASS 상태여야 합니다</li>";
    echo "<li>실패한 테스트가 있다면 해당 부분을 확인하세요</li>";
    echo "<li>운영 환경에서는 이 파일을 삭제하세요</li>";
    echo "</ul>";
    echo "</body></html>";
}

// 테스트 완료 후 이 파일 삭제 권장
echo "\n⚠️  주의: 운영 환경에서는 이 테스트 파일을 삭제하세요!\n";
