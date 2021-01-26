<?php
class Comment 
{
  private $text;
  private $user;

  function __get($name)
  {
    return $this->$name;
  }

  function __set($name, $value)
  {
    $this->$name = $value;
  }
}