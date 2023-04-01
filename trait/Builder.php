<?php
trait Builder
{
  public function query($sql)
  {
    $status  = null;
    $statement = null;
    try {
      $statement = $this->conn->prepare($sql);
      $status = $statement->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
      require 'error.php';
      die();
    }
    return $statement;
  }
  private $table,$select = array(),$where = '';
  public function table($table)
  {
    $this->table = $table;
    return $this;
  }
  public function select($columns) {
      if (is_string($columns)) {
        $columns = explode(',', $columns);
      }
      $this->select = array_merge($this->select, $columns);
      return $this;
  }
  public function where($field, $compare, $value)
  {
    $this->where =  $field.$compare.$value .$this->getOperator($this->where).$this->where;  
    return $this;
  }
  public function create($data = []){
    $this->create = array_keys($data);
    return $this;
  }
  public function getOperator($sql){
    if(strpos($sql,'WHERE') !== false){
      return ' AND ';
    }
    else{
      return ' WHERE ';
        }
  }
  public function get()
  {
    $sql = 'SELECT ' .implode(',',$this->select).' FROM ' . $this->table;
    if($this->where) {
      $sql .= $this->getOperator($sql).$this->where;
      $sql = substr($sql, 0, -8);
    }
    return $sql;
  }
  public function add()
  {
    $sql = 'INSERT INTO ' .$this->table .'('.implode(',',$this->create).') VALUES (:' . implode(',:',$this->create).')';
    return $sql;
  }
}
