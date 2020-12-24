<?php
class Task {
  private $taskid;
  private $projectid;
  private $title;
  private $description;
  private $status;
  private $assigneeid;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }
}
?>