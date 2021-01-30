<?php
class Task {
  private $taskID;
  private $projectID;
  private $title;
  private $description;
  private $status;
  private $assigneeID;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }
}
?>