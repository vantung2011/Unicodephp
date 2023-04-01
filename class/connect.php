<?php
require('config.php');
class Connect extends Config{
    protected $conn;
    public function __construct(){
        
    if (class_exists('PDO')) {
        //echo 'Được phép sử dụng PDO';
    
        try {
            $dns = $this->driver.':dbname='.$this->db.';host='.$this->host;
    
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //Hỗ trợ tiếng việt
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Đẩy lỗi ra ngoại lệ khi gặp lỗi truy vấn (Sai lệnh câu lệnh SQL)
            ];
             $this->conn = new PDO(
                $dns,
                $this->user,
                $this->pass,
                $options
            );
        } catch(Exception $e) {
            require_once 'error.php';
            die();
        }
    } else {
        echo 'Vui lòng kích hoạt PDO';
    }
    }
}
