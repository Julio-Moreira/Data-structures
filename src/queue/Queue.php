<?php
    namespace Julio\DataStructure\queue;

    class Queue {
        // Queue
        // Data structure #2 
        private $itens;
        
        // add values at the end of the queue
        public function enqueue(...$ele) {
            foreach ($ele as $key => $value) {
                array_push($this -> itens, $value);
            }
        }
        
        // delete value from end of queue
        public function dequeue() {
            if ($this -> isEmpty()) { return false; }
            array_shift($this->itens);
        }
        
        // print the queue
        public function __toString() {
            echo "<br><br>Queue <br> Start";
            foreach ($this -> itens as $key => $value) {
                echo " -> $value = [$key] ";
            }
            echo " -> End <br>size: {$this -> size()}";
        }
        
        // show end of queue
        public function peek() {
            if ($this -> isEmpty()) { return false; }
            
            return $this -> itens[$this->size()-1];
        }

        public function __construct() { $this -> itens = []; } 
        
        // look for a value in the queue
        public function search($key) { return $this -> itens[$key]; }
        
        // show queue size
        public function size() { return count($this -> itens); } 

        // checks if the queue is empty
        public function isEmpty() { return $this -> size() === 0; }
        
        // clear the queue
        public function clear() { $this -> itens = []; }
        
    }
?>
