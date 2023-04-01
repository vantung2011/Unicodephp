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
  public function createData($table, $attributes = [])
  {
    if (!empty($attributes)) {
      echo '<br>';
      $keys = array_keys($attributes);
      echo '<pre>';
      print_r($keys);
      echo '</pre>';
      $sql = 'INSERT INTO ' . $table . '(' . implode(',', $keys) . ') VALUES (:' . implode(',:', $keys) . ')';
      echo $sql;
      return $this->query($sql, $attributes);
    }
    return false;
  }
  public function createGetId($table, $attributes =  [])
  {
    if (!empty($attributes)) {
      $this->create($table, $attributes);
      return $this->conn->lastInsertId();
    }
    return false;
  }
  public function update($table, $attributes =  [], $conditions)
  {
    if (!empty($attributes)) {
      $keys = array_keys($attributes);
      $update = "";
      foreach ($keys as $key) {
        $update .= $key . '=:' . $key . ', ';
      }
      $update = rtrim($update, ', ');
      $sql = 'UPDATE ' . $table . ' SET ' . $update . ' WHERE ' . $conditions;
      $status = $this->query($sql, $attributes);
      return $status;
    }
    return false;
  }
  public function delete1($table, $conditions)
  {
    $sql = "DELETE FROM $table WHERE $conditions";
    return $this->query($sql, []);
  }
  public function getData($sql, $data = [])
  {
    $statement = $this->query($sql, $data, false);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getFirst($sql, $dataCondition)
  {
    $statement = $this->query($sql, $dataCondition, false);
    $groups = $statement->fetch(PDO::FETCH_ASSOC);
    return $groups;
  }
  public function getRows($sql, $data = [])
  {
    $statement = $this->query($sql, $data, false);
    return $statement->rowCount();
  }
}
