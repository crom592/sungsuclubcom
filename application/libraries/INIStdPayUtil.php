<?php
class INIStdPayUtil	{
	function getTimestamp()	{
		// timezone 을 설정하지 않으면 getTimestapme() 실행시 오류가 발생한다.
		// php.ini 에 timezone 설정이 되어 잇으면 아래 코드가 필요없다. 
		// php 5.3 이후로는 반드시 timezone 설정을 해야하기 때문에 아래 코드가 필요없을 수 있음. 나중에 확인 후 수정필요.
		// 이니시스 플로우에서 timestamp 값이 중요하게 사용되는 것으로 보이기 때문에 정확한 timezone 설정후 timestamp 값이 필요하지 않을까 함.
		echo 1;exit;
	}

	
	
}

