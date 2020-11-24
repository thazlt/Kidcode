<?php
use Illuminate\Support\Str;
class MYSQLIDB {
  private $host;
  private $user;
  private $pw;
  public $db;

  private $dbh;
  public $stmt;
  private $error;

  public function __construct() {
    $this->host = env('DB_HOST', '127.0.0.1');
    $this->user = env('DB_USERNAME', 'forge');
    $this->pw = env('DB_PASSWORD', '');
    $this->db = env('DB_DATABASE', 'forge');
    $this->dbh = new mysqli($this->host, $this->user, $this->pw, $this->db);
  }

  public function run($sql, $types = '', $params=[]) {
    if(!$params) {
      $this->stmt = $this->dbh->query($sql);
    } else {
      //$types = $types ?: str_repeat("s", count($params));
      $stmt = $this->dbh->prepare($sql);
      $stmt->bind_param($types, ...$params);
      if($stmt->execute()) {
        $this->stmt = $stmt->get_result();
        return true;
      } else {
        return false;
      }
    }
  }

  public function single() {
    return $this->stmt->fetch_assoc();
  }

  public function resultSet() {
    return $this->stmt->fetch_all(MYSQLI_ASSOC);
  }

  public function countRows() {
    return $this->stmt->num_rows;
  }

}
