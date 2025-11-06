# 보안 구현 가이드

## 개요
이 문서는 성수클럽 웹사이트의 보안 강화를 위해 구현된 Security Library와 Query Builder 사용법을 설명합니다.

## 1. Security Library 사용법

### 1.1 라이브러리 로드
```php
$this->load->library('security_lib');
$this->security = $this->security_lib;
```

### 1.2 입력값 검증 예제

#### 정수 검증
```php
// 단일 정수 검증
$board_no = $this->security->validate_int($_POST['board_no'], 1, 999999);
if ($board_no === false) {
    alert('유효한 게시글 번호가 아닙니다');
}

// 정수 배열 검증
$user_nos = $this->security->validate_int_array($_POST['user_nos'], 1, 999999);
```

#### 문자열 검증
```php
// SQL Injection 방지된 문자열
$title = $this->security->validate_string($_POST['title'], 255);
$content = $this->security->validate_string($_POST['content'], 5000);
```

#### 이메일 검증
```php
$email = $this->security->validate_email($_POST['email']);
if ($email === false) {
    alert('유효한 이메일 주소가 아닙니다');
}
```

#### 전화번호 검증
```php
$phone = $this->security->validate_phone($_POST['phone']);
if ($phone === false) {
    alert('유효한 전화번호가 아닙니다');
}
```

#### 게시판 코드 검증 (화이트리스트)
```php
$code = $this->security->validate_board_code($_GET['code']);
if ($code === false) {
    alert('존재하지 않는 게시판입니다');
}
```

### 1.3 XSS 방지
```php
// HTML 태그 모두 제거
$safe_text = $this->security->xss_clean($user_input);

// 일부 HTML 태그 허용
$safe_html = $this->security->xss_clean($user_input, true);
```

### 1.4 보안 로깅
```php
// 로그인 실패 로깅
$this->security->security_log('LOGIN_FAILED', 'Invalid credentials', array(
    'user_id' => $user_id,
    'ip' => $_SERVER['REMOTE_ADDR']
));

// 의심스러운 활동 로깅
$this->security->security_log('SUSPICIOUS_ACTIVITY', 'SQL Injection attempt detected', array(
    'input' => $suspicious_input
));
```

## 2. Query Builder 사용법 (Prepared Statements)

### 2.1 SELECT 쿼리
```php
// 기존 방식 (취약함)
$where = "user_id = '" . $user_id . "'";
$this->db->query("SELECT * FROM tbl_user WHERE $where");

// Query Builder 방식 (안전함)
$this->db->select('*');
$this->db->from('tbl_user');
$this->db->where('user_id', $user_id);  // 자동으로 이스케이핑됨
$query = $this->db->get();
$result = $query->result_array();
```

### 2.2 INSERT 쿼리
```php
// 기존 방식 (취약함)
$sql = "INSERT INTO tbl_user (user_id, user_name) VALUES ('$user_id', '$user_name')";
$this->db->query($sql);

// Query Builder 방식 (안전함)
$data = array(
    'user_id' => $user_id,
    'user_name' => $user_name
);
$this->db->insert('tbl_user', $data);  // 자동으로 이스케이핑됨
```

### 2.3 UPDATE 쿼리
```php
// 기존 방식 (취약함)
$sql = "UPDATE tbl_user SET user_name='$user_name' WHERE user_no=$user_no";
$this->db->query($sql);

// Query Builder 방식 (안전함)
$data = array('user_name' => $user_name);
$this->db->where('user_no', $user_no);
$this->db->update('tbl_user', $data);  // 자동으로 이스케이핑됨
```

### 2.4 DELETE 쿼리
```php
// 기존 방식 (취약함)
$sql = "DELETE FROM tbl_user WHERE user_no=$user_no";
$this->db->query($sql);

// Query Builder 방식 (안전함)
$this->db->where('user_no', $user_no);
$this->db->delete('tbl_user');  // 자동으로 이스케이핑됨
```

### 2.5 복잡한 조건
```php
// WHERE IN
$this->db->where_in('user_no', array(1, 2, 3));

// WHERE NOT IN
$this->db->where_not_in('user_type', array(1, 2));

// LIKE
$this->db->like('user_name', $search_term);

// OR WHERE
$this->db->or_where('user_email', $email);

// 복합 조건
$this->db->where('user_type', 9);
$this->db->where('reg_date >', '2024-01-01');
$this->db->where_in('status', array('active', 'pending'));
```

## 3. 실제 적용 예제

### 3.1 로그인 구현
```php
public function login()
{
    // 1. Security Library 로드
    $this->load->library('security_lib');
    
    // 2. 입력값 검증
    $user_id = $this->security->validate_string($_POST['user_id'], 50);
    $password = $this->security->validate_string($_POST['password'], 100);
    
    if (empty($user_id) || empty($password)) {
        alert('아이디와 비밀번호를 입력해주세요');
        return;
    }
    
    // 3. Query Builder로 사용자 조회
    $this->db->select('*');
    $this->db->from('tbl_user');
    $this->db->where('user_id', $user_id);
    $this->db->where('user_pwd', $password);
    $query = $this->db->get();
    $user = $query->row_array();
    
    if ($user) {
        // 4. 로그인 성공 처리
        $_SESSION['user_no'] = $user['user_no'];
        
        // 5. 보안 로깅
        $this->security->security_log('LOGIN_SUCCESS', 'User logged in', array(
            'user_id' => $user_id
        ));
        
        redirect('/dashboard');
    } else {
        // 6. 로그인 실패 처리
        $this->security->security_log('LOGIN_FAILED', 'Invalid credentials', array(
            'user_id' => $user_id
        ));
        
        alert('로그인 실패');
    }
}
```

### 3.2 게시글 작성
```php
public function write_post()
{
    // 1. 입력값 검증
    $title = $this->security->validate_string($_POST['title'], 255);
    $content = $this->security->xss_clean($_POST['content'], true);
    $code = $this->security->validate_board_code($_POST['code']);
    
    if (!$title || !$content || !$code) {
        alert('필수 항목을 입력해주세요');
        return;
    }
    
    // 2. Query Builder로 삽입
    $data = array(
        'title' => $title,
        'content' => $content,
        'code' => $code,
        'user_no' => $_SESSION['user_no'],
        'reg_date' => date('Y-m-d H:i:s')
    );
    
    $this->db->insert('tbl_board', $data);
    $insert_id = $this->db->insert_id();
    
    // 3. 로깅
    $this->security->security_log('POST_CREATE', 'New post created', array(
        'post_id' => $insert_id
    ));
    
    redirect('/board/view/' . $insert_id);
}
```

### 3.3 회원 타입 일괄 변경
```php
public function update_user_types()
{
    // 1. 입력값 검증
    $user_nos = $this->security->validate_int_array($_POST['user_nos']);
    $new_type = $this->security->validate_user_type($_POST['user_type']);
    
    if (empty($user_nos) || $new_type === false) {
        alert('유효하지 않은 요청입니다');
        return;
    }
    
    // 2. Query Builder로 업데이트
    $this->db->where_in('user_no', $user_nos);
    $this->db->update('tbl_user', array('user_type' => $new_type));
    
    $affected = $this->db->affected_rows();
    
    // 3. 로깅
    $this->security->security_log('USER_TYPE_UPDATE', 'Bulk update user types', array(
        'user_nos' => $user_nos,
        'new_type' => $new_type,
        'affected' => $affected
    ));
    
    alert($affected . '명의 회원 타입이 변경되었습니다');
}
```

## 4. 마이그레이션 가이드

### 4.1 기존 코드 변경 방법

#### Step 1: 컨트롤러 수정
```php
// 생성자에 추가
public function __construct()
{
    parent::__construct();
    $this->load->database();
    $this->load->library('security_lib');
    $this->security = $this->security_lib;
}
```

#### Step 2: 입력값 검증 추가
```php
// 기존 코드
$user_no = $_POST['user_no'];

// 변경 후
$user_no = $this->security->validate_int($_POST['user_no']);
if ($user_no === false) {
    alert('유효하지 않은 요청입니다');
    return;
}
```

#### Step 3: 쿼리 변경
```php
// 기존 코드
$where = "user_no = $user_no";
$this->db->query("SELECT * FROM tbl_user WHERE $where");

// 변경 후
$this->db->where('user_no', $user_no);
$query = $this->db->get('tbl_user');
```

### 4.2 테스트 체크리스트

- [ ] 정상적인 입력값으로 기능 테스트
- [ ] SQL Injection 공격 시도 (`' OR '1'='1`)
- [ ] XSS 공격 시도 (`<script>alert('XSS')</script>`)
- [ ] 정수 필드에 문자열 입력
- [ ] 최대 길이 초과 입력
- [ ] 특수문자 입력 테스트
- [ ] 로그 파일 생성 확인

## 5. 추가 보안 테이블 생성

로그인 시도 제한을 위한 테이블:

```sql
CREATE TABLE IF NOT EXISTS `tbl_login_attempts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ip_address` varchar(45) NOT NULL,
    `attempt_time` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idx_ip_time` (`ip_address`, `attempt_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 보안 로그 테이블 (선택사항)
CREATE TABLE IF NOT EXISTS `tbl_security_logs` (
    `log_id` int(11) NOT NULL AUTO_INCREMENT,
    `log_type` varchar(50) NOT NULL,
    `log_message` text NOT NULL,
    `user_id` varchar(50) DEFAULT NULL,
    `ip_address` varchar(45) NOT NULL,
    `user_agent` text,
    `request_uri` text,
    `log_date` datetime NOT NULL,
    `additional_data` text,
    PRIMARY KEY (`log_id`),
    KEY `idx_log_type` (`log_type`),
    KEY `idx_log_date` (`log_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

## 6. 성능 고려사항

1. **인덱스 확인**: WHERE 조건에 자주 사용되는 컬럼에 인덱스 추가
2. **쿼리 최적화**: Query Builder의 `select()` 메서드로 필요한 컬럼만 조회
3. **캐싱 활용**: 자주 조회되는 데이터는 캐싱 고려
4. **로그 관리**: 보안 로그는 주기적으로 아카이빙

## 7. 문제 해결

### 일반적인 오류와 해결방법

#### "Call to a member function escape_str() on null"
```php
// 해결: 생성자에서 데이터베이스 로드
$this->load->database();
```

#### "Undefined property: $security"
```php
// 해결: Security Library 로드
$this->load->library('security_lib');
$this->security = $this->security_lib;
```

#### Query Builder 결과가 비어있음
```php
// 디버깅: 생성된 쿼리 확인
echo $this->db->last_query();
```

## 8. 연락처

보안 관련 문의사항이 있으시면 아래로 연락주세요:
- 이메일: security@sungsuclub.com
- 내선: 1234

---

작성일: 2024년 11월 6일
작성자: Security Team
버전: 1.0
