<?php
// static method (singleton) Has no properties, just a static method
class Pointer {
  private static $mysqli = null;

  // connect to mySQL
  public static function getPointer() {
    if(static::$mysqli === null) {
      try {
        // throw exceptions instead of PHP errors
        mysqli_report(MYSQLI_REPORT_STRICT);

        // connect!
        $mysqli = new mysqli("localhost", "root", "", "group_out");
      } catch(mysqli_sql_exception $error) {
        echo "Could not connect to mySQL";
      }
    }
    return($mysqli);
  }

}
?>
