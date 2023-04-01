<?php
require('connect.php');
class Database  extends Connect{
  use Builder;
  public function query($sql, $data, $isStatus = true)
  {
    $status  = null;
    $statement = null;
    try {
      $statement = $this->conn->prepare($sql);
      $status = $statement->execute($data);
    } catch (PDOException $e) {
      echo $e->getMessage();
      require 'error.php';
      die();
    }
    if ($isStatus) {
      return $status;
    }
    return $statement;
  }

  public function getData($sql, $data = [])
  {
    $statement = $this->query($sql, $data, false);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}
//