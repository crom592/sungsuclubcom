<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * ------------- DO NOT UPLOAD THIS FILE TO LIVE SERVER ---------------------
 *
 * Implements code completion for CodeIgniter in PHPStorm.
 * PHPStorm indexes all class constructs, so if this file is in the project it will be loaded.
 *
 * These property values were borrowed from another project.
 * Visit : https://github.com/topdown/phpStorm-CC-Helpers
 *
 * This version is just an upgraded one working with CodeIgniter 3.
 *
 * PHP version 5
 *
 * LICENSE: GPL http://www.gnu.org/copyleft/gpl.html
 *
 * Created 11/12/15, 01:48 PM
 *
 * @category
 * @package    CodeIgniter CI_PHPStorm.php
 * @author     Nicolas Goudry
 * @copyright  2015 Nicolas Goudry
 * @license    GPL http://www.gnu.org/copyleft/gpl.html
 * @version    2015.11.12
 */

/**
 * @description Completion in controllers
 ***************** CORE COMPONENTS *****************
 * @property CI_Benchmark        $benchmark            This class enables you to mark points and calculate the time difference between them. Memory consumption can also be displayed.
 * @property CI_Config           $config               This class contains functions that enable config files to be managed
 * @property CI_Controller       $controller           This class object is the super class that every library in CodeIgniter will be assigned to.
 * @property CI_Exceptions       $exceptions           Exceptions Class
 * @property CI_Hooks            $hooks                Provides a mechanism to extend the base system without hacking.
 * @property CI_Input            $input                Pre-processes global input data for security
 * @property CI_Lang             $lang                 Language Class
 * @property CI_Loader           $load                 Loads framework components.
 * @property CI_Log              $log                  Logging Class
 * @property CI_Model            $model                Model Class
 * @property CI_Output           $output               Responsible for sending final output to the browser.
 * @property CI_Router           $router               Parses URIs and determines routing
 * @property CI_Security         $security             Security Class
 * @property CI_URI              $uri                  Parses URIs and determines routing
 * @property CI_Utf8             $utf8                 Provides support for UTF-8 environments
 ***************** DATABASE COMPONENTS *****************
 * @property CI_DB_forge         $dbforge              Database Forge Class
 * @property CI_DB_query_builder $db                   This is the platform-independent base Query Builder implementation class.
 * @property CI_DB_utility       $dbutil               Database Utility Class
 ***************** CORE LIBRARIES *****************
 * @property CI_Cache            $cache                CodeIgniter Caching Class
 * @property CI_Session          $session              CodeIgniter Session Class
 * @property CI_Calendar         $calendar             This class enables the creation of calendars
 * @property CI_Cart             $cart                 Shopping Cart Class
 * @property CI_Driver_Library   $driver               This class enables you to create "Driver" libraries that add runtime ability to extend the capabilities of a class via additional driver objects
 * @property CI_Email            $email                Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encryption       $encryption           Provides two-way keyed encryption via PHP's MCrypt and/or OpenSSL extensions.
 * @property CI_Form_validation  $form_validation      Form Validation Class
 * @property CI_FTP              $ftp                  FTP Class
 * @property CI_Image_lib        $image_lib            Image Manipulation class
 * @property CI_Migration        $migration            All migrations should implement this, forces up() and down() and gives access to the CI super-global.
 * @property CI_Pagination       $pagination           Pagination Class
 * @property CI_Parser           $parser               Parser Class
 * @property CI_Profiler         $profiler             This class enables you to display benchmark, query, and other data in order to help with debugging and optimization.
 * @property CI_Table            $table                Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback        $trackback            Trackback Sending/Receiving Class
 * @property CI_Typography       $typography           Typography Class
 * @property CI_Unit_test        $unit                 Simple testing class
 * @property CI_Upload           $upload               File Uploading Class
 * @property CI_User_agent       $agent                Identifies the platform, browser, robot, or mobile device of the browsing agent
 * @property CI_Xmlrpc           $xmlrpc               XML-RPC request handler class
 * @property CI_Xmlrpcs          $xmlrpcs              XML-RPC server class
 * @property CI_Zip              $zip                  Zip Compression Class
 ***************** DEPRECATED LIBRARIES *****************
 * @property CI_Jquery           $jquery               Jquery Class
 * @property CI_Encrypt          $encrypt              Provides two-way keyed encoding using Mcrypt
 * @property CI_Javascript       $javascript           Javascript Class
 ***************** YOUR LIBRARIES *****************
 * @property Layout              $layout               Layout Class
 ***************** YOUR MODELS *****************
 * @property Search_model          $search_model
 * @property Contract_model        $contract_model
 * @property membership_model $membership_model
 * @property site_model       $site_model
 * @property data_model       $data_model
 * @property products_model   $products_model
 * @property film_model       $film_model
 * @property film_model1      $film_model1
 *
 * @property table_setting_m      $table_setting_m //테이블 설정 및 싱크
 * @property api_header_m      $api_header_m // api 인증 및 해드 체크
 * @property sales_screen_m      $sales_screen_m // 판매화면 구성
 * @property button_setting_m      $button_setting_m// 버튼 구성
 * @property setting_m      $setting_m// 버튼 구성
 * @property sync_m      $sync_m // 설정 싱크
 * @property kind_m      $kind_m // asp 분류
 * @property st_m      $st_m // asp 분류
 * @property pr_m      $pr_m // asp 분류*
 * @property mac_address_m      $mac_address_m // 맥 주소 저장
 * @property rct_bas_m      $rct_bas_m // 가맹점별 기초정보
 * @property member_join_m      $member_join_m // 회원 싱크
 * @property ct_m      $ct_m
 * @property partner_notice_m      $partner_notice_m
 * @property login_check_m      $login_check_m
 * @property coupon_m      $coupon_m
 * @property search_m $search_m // 검색
 * @property sms_m $sms_m // 문자발송
 * @property toast_event_m $toast_event_m // 이벤트
 * @property test_m $test_m // 테스트
 * @property pos_m $pos_m // POS 테이블
 * @property Bas_m $bas_m // 기초설정 테이블
 * @property rct_m $rct_m // 가맹점 테이블
 * @property software_type_m $software_type_m
 * @property calculate_m $calculate_m
 * @property pe_ps_m $pe_ps_m
 * @property ps_dc_m $ps_dc_m
 * @property member_m $member_m
 * @property adbox_m $adbox_m
 * @property global_info_m $global_info_m
 * @property ao_member_m $ao_member_m
 * @property ao_stamp_m $ao_stamp_m
 *
 */
class CI_Controller {
    public function __construct() {
    } // This default returns construct as set
}

/**
 ***************** CORE COMPONENTS *****************
 * @property CI_Benchmark        $benchmark            This class enables you to mark points and calculate the time difference between them. Memory consumption can also be displayed.
 * @property CI_Config           $config               This class contains functions that enable config files to be managed
 * @property CI_Controller       $controller           This class object is the super class that every library in CodeIgniter will be assigned to.
 * @property CI_Exceptions       $exceptions           Exceptions Class
 * @property CI_Hooks            $hooks                Provides a mechanism to extend the base system without hacking.
 * @property CI_Input            $input                Pre-processes global input data for security
 * @property CI_Lang             $lang                 Language Class
 * @property CI_Loader           $load                 Loads framework components.
 * @property CI_Log              $log                  Logging Class
 * @property CI_Model            $model                Model Class
 * @property CI_Output           $output               Responsible for sending final output to the browser.
 * @property CI_Router           $router               Parses URIs and determines routing
 * @property CI_Security         $security             Security Class
 * @property CI_URI              $uri                  Parses URIs and determines routing
 * @property CI_Utf8             $utf8                 Provides support for UTF-8 environments
 ***************** DATABASE COMPONENTS *****************
 * @property CI_DB_forge         $dbforge              Database Forge Class
 * @property CI_DB_query_builder $db                   This is the platform-independent base Query Builder implementation class.
 * @property CI_DB_utility       $dbutil               Database Utility Class
 ***************** CORE LIBRARIES *****************
 * @property CI_Cache            $cache                CodeIgniter Caching Class
 * @property CI_Session          $session              CodeIgniter Session Class
 * @property CI_Calendar         $calendar             This class enables the creation of calendars
 * @property CI_Cart             $cart                 Shopping Cart Class
 * @property CI_Driver_Library   $driver               This class enables you to create "Driver" libraries that add runtime ability to extend the capabilities of a class via additional driver objects
 * @property CI_Email            $email                Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encryption       $encryption           Provides two-way keyed encryption via PHP's MCrypt and/or OpenSSL extensions.
 * @property CI_Form_validation  $form_validation      Form Validation Class
 * @property CI_FTP              $ftp                  FTP Class
 * @property CI_Image_lib        $image_lib            Image Manipulation class
 * @property CI_Migration        $migration            All migrations should implement this, forces up() and down() and gives access to the CI super-global.
 * @property CI_Pagination       $pagination           Pagination Class
 * @property CI_Parser           $parser               Parser Class
 * @property CI_Profiler         $profiler             This class enables you to display benchmark, query, and other data in order to help with debugging and optimization.
 * @property CI_Table            $table                Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback        $trackback            Trackback Sending/Receiving Class
 * @property CI_Typography       $typography           Typography Class
 * @property CI_Unit_test        $unit                 Simple testing class
 * @property CI_Upload           $upload               File Uploading Class
 * @property CI_User_agent       $agent                Identifies the platform, browser, robot, or mobile device of the browsing agent
 * @property CI_Xmlrpc           $xmlrpc               XML-RPC request handler class
 * @property CI_Xmlrpcs          $xmlrpcs              XML-RPC server class
 * @property CI_Zip              $zip                  Zip Compression Class
 ***************** DEPRECATED LIBRARIES *****************
 * @property CI_Jquery           $jquery               Jquery Class
 * @property CI_Encrypt          $encrypt              Provides two-way keyed encoding using Mcrypt
 * @property CI_Javascript       $javascript           Javascript Class
 ***************** YOUR LIBRARIES *****************
 * @property Layout              $layout               Layout Class
 * @property membership_model $membership_model
 * @property site_model       $site_model
 * @property data_model       $data_model
 * @property products_model   $products_model
 * @property film_model       $film_model
 * @property film_model1      $film_model1
 *
 * @property table_setting_m      $table_setting_m //테이블 설정 및 싱크
 * @property api_header_m      $api_header_m // api 인증 및 해드 체크
 * @property sales_screen_m      $sales_screen_m // 판매화면 구성
 * @property button_setting_m      $button_setting_m// 버튼 구성
 * @property setting_m      $setting_m// 버튼 구성
 * @property sync_m      $sync_m // 설정 싱크
 * @property kind_m      $kind_m // asp 분류
 * @property st_m      $st_m // asp 분류
 * @property pr_m      $pr_m // asp 분류*
 * @property mac_address_m      $mac_address_m // 맥 주소 저장
 * @property rct_bas_m      $rct_bas_m // 가맹점별 기초정보
 * @property member_join_m      $member_join_m // 회원 싱크
 * @property ct_m      $ct_m
 * @property partner_notice_m      $partner_notice_m
 * @property login_check_m      $login_check_m
 * @property coupon_m      $coupon_m
 * @property search_m $search_m // 검색
 * @property sms_m $sms_m // 문자발송
 * @property toast_event_m $toast_event_m // 이벤트
 * @property test_m $test_m // 테스트
 * @property pos_m $pos_m // POS 테이블
 * @property Bas_m $bas_m // 기초설정 테이블
 * @property rct_m $rct_m // 가맹점 테이블
 * @property software_type_m $software_type_m
 * @property calculate_m $calculate_m
 * @property pe_ps_m $pe_ps_m
 * @property ps_dc_m $ps_dc_m
 * @property member_m $member_m
 * @property adbox_m $adbox_m
 * @property global_info_m $global_info_m
 * @property ao_member_m $ao_member_m
 * @property ao_stamp_m $ao_stamp_m
 *
 *
 */
class CI_Model {
    public function __construct() {
    } // This default returns construct as set
}

/* End of file PHPStorm_CI_CC.php */