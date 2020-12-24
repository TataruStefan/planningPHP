<?php
class Project {
  private $projectid;
  private $title;
  private $vision;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }
}
?>
