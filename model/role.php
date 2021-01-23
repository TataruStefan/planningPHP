<?php
class Role {
  private $roleID;
  private $name;
  private $description;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }
}
?>