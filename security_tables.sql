-- 보안 강화를 위한 추가 테이블 생성
-- 실행 방법: mysql -u [username] -p [database_name] < security_tables.sql

-- 로그인 시도 제한 테이블
CREATE TABLE IF NOT EXISTS `tbl_login_attempts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ip_address` varchar(45) NOT NULL,
    `attempt_time` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idx_ip_time` (`ip_address`, `attempt_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='로그인 시도 기록';

-- 보안 로그 테이블
CREATE TABLE IF NOT EXISTS `tbl_security_logs` (
    `log_id` int(11) NOT NULL AUTO_INCREMENT,
    `log_type` varchar(50) NOT NULL COMMENT '로그 타입',
    `log_message` text NOT NULL COMMENT '로그 메시지',
    `user_id` varchar(50) DEFAULT NULL COMMENT '사용자 ID',
    `ip_address` varchar(45) NOT NULL COMMENT 'IP 주소',
    `user_agent` text COMMENT '브라우저 정보',
    `request_uri` text COMMENT '요청 URI',
    `log_date` datetime NOT NULL COMMENT '로그 일시',
    `additional_data` text COMMENT '추가 데이터 (JSON)',
    PRIMARY KEY (`log_id`),
    KEY `idx_log_type` (`log_type`),
    KEY `idx_log_date` (`log_date`),
    KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='보안 로그';

-- 세션 관리 테이블 (선택사항)
CREATE TABLE IF NOT EXISTS `tbl_user_sessions` (
    `session_id` varchar(128) NOT NULL,
    `user_no` int(11) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `user_agent` text,
    `last_activity` datetime NOT NULL,
    `created_at` datetime NOT NULL,
    PRIMARY KEY (`session_id`),
    KEY `idx_user_no` (`user_no`),
    KEY `idx_last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='사용자 세션 관리';

-- 비밀번호 변경 이력 (선택사항)
CREATE TABLE IF NOT EXISTS `tbl_password_history` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_no` int(11) NOT NULL,
    `old_password` varchar(255) NOT NULL,
    `changed_date` datetime NOT NULL,
    `changed_ip` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `idx_user_no` (`user_no`),
    KEY `idx_changed_date` (`changed_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='비밀번호 변경 이력';

-- 기존 테이블에 보안 컬럼 추가 (필요시)
-- ALTER TABLE `tbl_user` ADD COLUMN `failed_login_count` int(11) DEFAULT 0 COMMENT '로그인 실패 횟수';
-- ALTER TABLE `tbl_user` ADD COLUMN `last_failed_login` datetime DEFAULT NULL COMMENT '마지막 로그인 실패 시간';
-- ALTER TABLE `tbl_user` ADD COLUMN `account_locked` tinyint(1) DEFAULT 0 COMMENT '계정 잠금 여부';
-- ALTER TABLE `tbl_user` ADD COLUMN `lock_until` datetime DEFAULT NULL COMMENT '계정 잠금 해제 시간';

-- 초기 데이터 삽입 (테스트용)
INSERT INTO `tbl_security_logs` (`log_type`, `log_message`, `user_id`, `ip_address`, `user_agent`, `request_uri`, `log_date`, `additional_data`)
VALUES ('SYSTEM_INIT', '보안 시스템 초기화', 'system', '127.0.0.1', 'System', '/', NOW(), '{"status":"initialized"}');

-- 권한 부여 (필요시)
-- GRANT SELECT, INSERT, UPDATE, DELETE ON `tbl_login_attempts` TO 'your_app_user'@'localhost';
-- GRANT SELECT, INSERT, UPDATE, DELETE ON `tbl_security_logs` TO 'your_app_user'@'localhost';
-- GRANT SELECT, INSERT, UPDATE, DELETE ON `tbl_user_sessions` TO 'your_app_user'@'localhost';
-- GRANT SELECT, INSERT, UPDATE, DELETE ON `tbl_password_history` TO 'your_app_user'@'localhost';

-- 테이블 생성 확인
SELECT 'Tables created successfully!' as Result;
