<?php
class Promotion{
    private $DateT;
    private $Score;
    private $Team1;
    private $Team2;
    private $Coefficient;
    private $GameID;

    function __get($name){
        return $this->$name;
    }

    function __set($name,$value){
        $this->$name = $value;
    }

}
