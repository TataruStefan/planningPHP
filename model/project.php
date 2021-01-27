<?php
class Project {
  private $projectid;
  private $title;
  private $vision;
  private $tasks;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }
}
?>
