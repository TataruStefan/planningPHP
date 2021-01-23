<?php
class Team {
  private $projectID;
  private $role;
  private $name;
  private $email;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }
}
?>