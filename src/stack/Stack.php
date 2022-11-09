<?php
namespace Julio\DataStructure\stack;

// Data structure #1
// Stack {obeys the lifo principle (last in first out)}
class Stack {
    private $items;

    // add too many elements in the top of the stack
    public function push(...$ele) { 
        foreach ($ele as $key => $value) {
            array_push($this -> items, $value);
        }
    }
    
    // print the stack
    public function __toString() {  
        echo "<br><br>Stack";
        foreach ($this -> getItems() as $key => $value) {
            echo "<br> [$key] -> $value ";
        }
        echo "<br>size: {$this -> size()}";
    }

    // search values in the stack
    public function search($key) { return $this -> items[$key]; }

    // return top of the stack
    public function peek() { return $this -> items[$this->size() - 1]; } 

    // destroy the base of stack
    public function pop() { return array_pop($this -> items); }
    
    // return if the stack is empty
    public function isEmpty(): bool
    { return $this -> size() === 0; }
    
    // return the size of the stack
    public function size(): int
    { return count($this -> items); }

    // clear the stack
    public function clear() {  $this -> setItems([]); } 
    
    public function __construct() { $this -> setItems([]); }

    private function getItems() { return $this->items; }

    private function setItems($items) { $this->items = $items; return $this; }

}
?>
