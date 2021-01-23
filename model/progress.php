<?php
class Progress {
  private $projectID;
  private $Title;
  private $done;
  private $toDo;
  private $inProgress;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }
}
?>
