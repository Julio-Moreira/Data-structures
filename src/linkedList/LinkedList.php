<?php
namespace Julio\DataStructure\linkedList;

use Julio\DataStructure\Complementary\Node;
use function Julio\DataStructure\Complementary\defaultEquals;

class LinkedList {
    private $head, $count;

    public function __construct() {
        $this->head = null;
        $this->count = 0;
    }

    /** push values in list */
    public function push(...$elements) {
        foreach ($elements as $element) {
            $node = new Node($element);
            
            if ($this->head == null) $this->head = $node;

            $current = $this->head;
            while ($current->next != null) $current = $current->next;            
            $current->next = $node;

            $this->count++;
        }
    }

    /** remove specified index from list */
    public function removeAt($index) {
        if (!($index >= 0 && $index < $this->count)) return null;
        /** @var Node $current */
        $current = $this->head;

        if ($index === 0) {
            $this->head = $current->next;
        } else {
            /** @var Node */ $previous = $this->getElementAt($index - 1);
            /** @var Node */ $current = $previous->next;

            $previous->next = $current->next;
        }

        $this->count--;
        return $current->element;
    }

    /** remove element in list */
    public function remove($element) {
        $index = $this->indexOf($element);
        return $this->removeAt($index);
    }

    /** get element of specified index */
    public function getElementAt($index) {
        if (!($index >= 0 && $index <= $this->count)) return null;

        /** @var Node $node */
        $node = $this->head;
        for ($i=0; $i < $index && $node != null; $i++) $node = $node->next;

        return $node;
    }

    /** insert element in specified index */
    public function insert($element, $index) {
        if (!($index >= 0 && $index <= $this->count)) return false;

        $node = new Node($element);
        if ($index === 0) {
            $current = $this->head;
            $node->next = $current;
            $this->head = $node;
        } else {
            $previous = $this->getElementAt($index - 1);
            $current = $previous->next;
            $node->next = $current;
            $previous->next = $node;            
        }

        $this->count++;
        return true;
    }

    /** Get the index of element in list */
    public function indexOf($element) {
        /** @var Node */
        $current = $this->head;
        for ($i=0; $i < $this->count && $current != null; $i++) { 
            if (defaultEquals($element, $current->element)) return $i; 
            
            $current = $current->next;
        }
        return null;
    }

    public function size() {
        return $this->count;
    }

    public function isEmpty() {
        return $this->size() === 0;
    }

    public function getHead() {
        return $this->head;
    }
}
