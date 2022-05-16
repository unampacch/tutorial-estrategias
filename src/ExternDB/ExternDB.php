<?php
/**
 * Connect MySQL with PDO class
 */
Namespace App\ExternDB;

use PDO;

class ExternDB {

  private $dbhost = '132.248.218.65';
  private $dbuser = 'externo';
  private $dbpass = 'bszwqLzKWPstmPcO';
  private $dbname = 'CCH';

  public function connect() {

    // https://www.php.net/manual/en/pdo.connections.php
    $prepare_conn_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
    $dbConn = new PDO( $prepare_conn_str, $this->dbuser, $this->dbpass );

    // https://www.php.net/manual/en/pdo.setattribute.php
    $dbConn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $dbConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // return the database connection back
    return $dbConn;
  }
}
