<?php
namespace Julio\DataStructure\queue;

class Deque {
    private $items;

    public function __construct() {
        $this->items = [];
    }

    public function addFront($element) {
        if (!$this->isEmpty()) {
            $this->addBack($element);
        } elseif (array_key_first($this->items) > 0) {
            $this->items[array_key_first($this->items)] = $element;
        } else {
            for ($i=array_key_first($this->items); $i > 0; $i--) { 
                $this->items[$i] = $this->items[$i - 1];
            }
            $this->items[0] = $element;
        }
    }

    public function addBack(...$element) {
        array_push($this->items, $element);
    }

    public function removeFront() {
        if ($this->isEmpty()) {
            return null;
        }

        $first = array_key_first($this->items);
        unset($this->items[$first]);
        return true;
    }

    public function removeBack() {
        if ($this->isEmpty()) {
            return null;
        }

        $last = array_key_last($this->items);
        unset($this->items[$last]);
        return true;
    }

    public function peekFront() {
        if ($this->isEmpty()) {
            return null;
        }

        $first = array_key_first($this->items);
        return $this->items[$first];
    }

    public function peekBack() {
        if ($this->isEmpty()) {
            return null;
        }

        $last = array_key_last($this->items);
        return $this->items[$last];
    }

    public function __toString() {
        if ($this->isEmpty()) return '';
        $size = $this->size();

        echo "<br> Deque ->";
        foreach ($this->items as $value) {
            echo "-> $value";
        }
        echo "-> END size: $size";
    }

    // look for a value in the queue
    public function search($key) { return $this -> items[$key]; }
        
    // show queue size
    public function size() { return count($this -> items); } 

    // checks if the queue is empty
    public function isEmpty() { return $this -> size() === 0; }
    
    // clear the queue
    public function clear() { $this -> items = []; }
}