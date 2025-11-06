# SQL Injection 취약점 보고서

## 요약
성수클럽 웹사이트에서 다수의 SQL Injection 취약점이 발견되었습니다. 주로 사용자 입력값을 직접 SQL 쿼리에 연결하는 방식으로 인해 발생하며, 이는 심각한 보안 위협입니다.

## 위험도: **매우 높음** 🔴

## 발견된 취약점

### 1. Admin.php - 관리자 로그인 (위험도: 극심함)
**파일**: `/application/controllers/Admin.php`
**라인**: 43-45

```php
// 취약한 코드
$where = "user_id = '" . $user_id . "'";
$where .= " AND user_pw = '" . $user_pw . "'";
```

**문제점**: 
- 사용자 입력값을 직접 SQL 쿼리에 연결
- SQL Injection으로 관리자 권한 탈취 가능
- 예시 공격: `admin' OR '1'='1' --`

### 2. adm/auth/Login.php - 관리자 로그인 (위험도: 높음)
**파일**: `/application/controllers/adm/auth/Login.php`
**라인**: 31, 52

```php
// 부분적으로 취약한 코드
$where .= " AND tu.user_pwd = '" . $user_pw . "'";  // 패스워드는 필터링 안됨
```

**문제점**:
- user_id는 필터링하지만 password는 필터링하지 않음
- 불완전한 보안 조치

### 3. ajax/admin/User.php - 회원 타입 변경 (위험도: 높음)
**파일**: `/application/controllers/ajax/admin/User.php`
**라인**: 29, 51

```php
// 취약한 코드
$where = "user_no in (".@implode(',',$_POST['no_list']).")";
$where = "user_no=".$_POST['user_no'];
```

**문제점**:
- 배열 값을 직접 SQL에 삽입
- 권한 상승 공격 가능

### 4. ajax/Board.php - 게시판 (위험도: 중간)
**파일**: `/application/controllers/ajax/Board.php`
**라인**: 50, 82

```php
// 취약한 코드
$rows = $this->board_m->codeLevel(" code='$code'");
$where = "bt.no=$board_no";
```

**문제점**:
- 게시판 코드와 번호를 직접 쿼리에 삽입
- 데이터 유출 가능

### 5. Board.php - 게시판 수정 (위험도: 중간)
**파일**: `/application/controllers/Board.php`
**라인**: 278

```php
// 취약한 코드
$where = "no=$board_no";
```

### 6. Symposium_m.php - 심포지엄 모델 (위험도: 중간)
**파일**: `/application/models/Symposium_m.php`
**라인**: 39, 53

```php
// 취약한 코드
$rs = $this->db->query("
    SELECT no, abs_code, abs_code_name FROM tbl_symposium_abs_code $where order by abs_code
");
```

**문제점**:
- WHERE 절을 직접 쿼리에 삽입

## 공격 시나리오

### 1. 관리자 권한 탈취
```
POST /admin/check
user_id=admin' OR '1'='1' --
user_pw=anything
```

### 2. 데이터베이스 정보 유출
```
GET /board/list?code=notice' UNION SELECT user_id,user_pwd,3,4,5 FROM tbl_admin--
```

### 3. 권한 상승
```
POST /ajax/admin/user/updateType
no_list[]=1) OR 1=1--
user_type=9
```

## 해결 방안

### 1. Prepared Statements 사용 (권장)
### 2. 입력값 검증 및 이스케이핑
### 3. CodeIgniter Query Builder 활용
### 4. 화이트리스트 기반 검증

## 수정 우선순위

1. **즉시 수정 필요** (24시간 이내)
   - Admin.php 로그인
   - adm/auth/Login.php 로그인
   - ajax/admin/User.php 권한 변경

2. **긴급 수정** (1주일 이내)
   - Board.php 게시판 관련
   - ajax/Board.php

3. **일반 수정** (1개월 이내)
   - Symposium_m.php
   - 기타 모델 파일들

## 추가 보안 권고사항

1. **Web Application Firewall (WAF) 도입**
2. **입력값 검증 라이브러리 도입**
3. **보안 감사 로깅 구현**
4. **정기적인 보안 점검**
5. **개발자 보안 교육**

---

작성일: 2024년 11월 6일
작성자: 김성은
