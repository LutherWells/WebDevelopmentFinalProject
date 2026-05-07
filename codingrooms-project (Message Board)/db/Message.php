<?php 

class Message {
   public $id;
   public $text;
   public $name;
   public $postTime;
   
   public function __construct($id, $text, $name, $postTime) {
      $this->id = $id;
      $this->text = $text;
      $this->name = $name;
      $this->postTime = $postTime;
   }

   public function __toString() {
      return "id={$this->id}, text={$this->text}, name={$this->name}, postTime={$this->postTime}";
   }
}

?>