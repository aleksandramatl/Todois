<?php
class Task {
    public $name;
    public $description;

    public function __construct($name, $description){
        $this->name = $name;
        $this->description = $description;
    }

    public function setDescription($description){
        $this->description = is_string($description) ? $description : null;
    }
    public function getDescription(){
        return $this->description;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = is_string($name) ? $name : '';
    }

    public function viewTask(){
        echo ($this->name);
        echo ($this->description);
    }

}



?>