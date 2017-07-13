<?php
class Task {
    private $name;
    private $description;
    private $status;
    private $prioryty = null;
    private $date = null;

    public function __construct($name, $description, $prioryty = null, $date = null){
        $this->setName($name);
        $this->setDescription($description);
        $this->status = false;
        $this->setPriority($priority);
        $this->setDate($date);
    }
    



    public function setDescription($description){
        $this->description = is_string($description) ? $description : null;
        //$this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = is_string($name) ? $name : '';
        //$this->name = $name;
    }
    public function getStatus() {
        return $this->status;
    }
    public function finishTask() {
        $this->status = true;
    }
    public function setPrioryty($prioryty) {
        $this->prioryty = $prioryty;
    }
    public function getPrioryty() {
        return $this->prioryty;
    }
    public function setDate($date) {
        $this->date = str_replace('T',' ',$date);
    }
    public function getDate() {
        return $this->date;
    }
    public function checkOverdue () {
        if ($this->getDate() != null) {
            $currentDate = strtotime('now');
            $deadline = strtotime($this->getDate());
            if ($currentDate > $deadline) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function viewTask(){
        echo $this->getName().": ".$this->getDescription();
    }
    public function viewName () {
        if ($this->getStatus() == false) {
            if ($this->checkOverdue()) {
                return '<td class="text-uppercase text-danger"><strong>'.$this->getName().':</strong></td>';
            } else {
                return '<td class="text-uppercase"><strong>'.$this->getName().':</strong></td>';
            }
        } else {
            return '<td class="text-uppercase"><s><strong>'.$this->getName().':</strong></s></td>';
        }
    }
    public function viewDescription() {
        if ($this->getStatus() == false) {
            if ($this->checkOverdue()) {
                return '<td class="text-danger">'.$this->getDescription().'</td>';
            } else {
                return '<td>'.$this->getDescription().'</td>';
            }
        } else {
            return '<td><s>'.$this->getDescription().'</s></td>';
        }
    }public function displayPrioryty () {
        if ($this->getPrioryty() != null) {
            return '<td><img src="img/'.$this->getPrioryty().'.png" title="'.$this->getPrioryty().'"></td>';
        } else {
            return '<td>BRAK</td>';
        }
    }
    public function displayDate () {
        if ($this->getDate() != null) {
            if ($this->checkOverdue() && $this->getStatus() == false) {
                return '<td class="text-danger">'.$this->getDate().'</td>';
            } else {
                return '<td>'.$this->getDate().'</td>';
            }
        } else {
            return '<td>Brak</td>';
        }
    }


}

?>