<?php

class Database{
  /*
    deklarasi property
  */
  private static $_INSTANCE = null;
  private $mysqli,
          $_HOST   = 'localhost',
          $_USER   = 'root',
          $_PASS   = '',
          $_DBNAME = 'auth_oop';

  /*
    koneksi ke database
  */
  public function __construct(){
    $this->mysqli = new mysqli( $this->_HOST, $this->_USER, $this->_PASS, $this->_DBNAME );
    if( mysqli_connect_error() ){
      die('gagal koneksi ke database');
    }
  }

  /*
    singleton pattern, menguji koneksi agar tidak berkali-kali.
  */
  public static function getInstance(){
    if( !isset( self::$_INSTANCE ) ){
      self::$_INSTANCE = new Database;
    }
    return self::$_INSTANCE;
  }

  public function insert($table, $fields = array())
  {
    //mengambil kolom
    $column = implode(", ", array_keys($fields));

    //mengambil nilai
    // $values = implode(", ", array_values($fields));
    $valueArrays = array();
    $i = 0;
    foreach ($fields as $key => $values) {
      if ( is_int($values) ){
        $valueArrays[$i] = $this->escape($values);
      }else {
        $valueArrays[$i] ="'" . $this->escape($values) . "'";
      }
      $i++;
    }

    $values = implode(", ", $valueArrays);
    $query = "INSERT INTO $table ($column) VALUES ($values)";
    // die($query);
    return $this->run_query($query, 'masalah saat memasukkan data');
  }

  public function get_info($table, $column = '', $value = '')
  {

    if( !is_int($value) )
      $value = "'" . $value . "'";

      if( $column != '' ){
        $query = "SELECT * FROM $table WHERE $column = $value";
        $result = $this->mysqli->query($query);

        while($row = $result->fetch_assoc()){
          return $row;
        }
      }else {
        $query = "SELECT * FROM $table";
        $result = $this->mysqli->query($query);

        while($row = $result->fetch_assoc()){
          $results[] = $row;
        }
        return $results;
      }
  }

  public function update($table, $fields, $id)
  {

    //mengambil nilai
    // $values = implode(", ", array_values($fields));
    $valueArrays = array();
    $i = 0;
    foreach ($fields as $key => $values) {
      if ( is_int($values) ){
        $valueArrays[$i] = $key . "=" . $this->escape($values);
      }else {
        $valueArrays[$i] =$key . "='" . $this->escape($values) . "'";
      }
      $i++;
    }

    $values = implode(", ", $valueArrays);
    $query = "UPDATE $table SET $values WHERE id = $id";
    // die($query);
    return $this->run_query($query, 'masalah saat mengupdate data');

  }


  public function run_query($query, $msg)
  {
    if($this->mysqli->query($query)) return true;
    else die($msg);
  }

  public function escape($data)
  {
    return $this->mysqli->real_escape_string($data);
  }





}
// new Database();
// $db = Database::getInstance();
// var_dump($db);
?>
