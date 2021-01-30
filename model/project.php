<?php
class Project {
  private $projectID;
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
