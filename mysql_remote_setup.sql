-- MySQL 원격 접속 설정 SQL
-- 주의: YOUR_IP를 실제 로컬 IP 주소로 변경하세요

-- 1. 특정 IP에서 접속 허용
-- GRANT ALL PRIVILEGES ON songdoasset.* TO 'songdoasset'@'YOUR_IP' IDENTIFIED BY 'songdo12#$';

-- 2. 모든 IP에서 접속 허용 (보안상 권장하지 않음)
-- GRANT ALL PRIVILEGES ON songdoasset.* TO 'songdoasset'@'%' IDENTIFIED BY 'songdo12#$';

-- 3. 특정 IP 대역에서 접속 허용 (예: 192.168.1.%)
-- GRANT ALL PRIVILEGES ON songdoasset.* TO 'songdoasset'@'192.168.1.%' IDENTIFIED BY 'songdo12#$';

-- 권한 적용
-- FLUSH PRIVILEGES;

-- 현재 권한 확인
SELECT user, host FROM mysql.user WHERE user='songdoasset';

-- 권한 상세 확인
SHOW GRANTS FOR 'songdoasset'@'localhost';
SHOW GRANTS FOR 'songdoasset'@'106.10.83.190';
