<?php
namespace Julio\DataStructure\linkedList;

use Julio\DataStructure\Complementary\DoublyNode;
use Julio\DataStructure\linkedList\LinkedList;

class DoublyLinkedList extends LinkedList {
    private ?DoublyNode $tail = null;
    private ?DoublyNode $head = null;
    private int $count = 0;

    // public function push($element) {
    //     # code...
    // }

    /** insert any element in specified index */
    public function insert($element, $index): bool {
        if (!($index >= 0 && $index <= $this->count)) return false;
        $node = new DoublyNode($element);
        
        if ($index == 0) 
            $this->indexIsZero($node);
        else if ($index == $this->count) 
            $this->indexIsTail($node);
        else 
            $this->indexIsInAnyPosition($node, $index);

        $this->count++;
        return true;
    }

    /** If the index is zero put the node in head */
    private function indexIsZero(DoublyNode $node): void {
        $current = $this->head;

        if ($this->head == null) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $node->next = $this->head;
            $current->prev = $node;
            $this->head = $node;
        }
    }

    /** If the index is tail put the node in last position */
    public function indexIsTail(DoublyNode $node): void {
        $current = $this->tail;

        $current->next = $node;
        $node->prev = $current;
        $this->tail = $node;
    }

    /** If the index is in any position put the node in specified position */
    public function indexIsInAnyPosition(DoublyNode $node, $index): void {
        $previous = $this->getElementAt($index-1);
        /** @var DoublyNode */ 
        $current = $previous->next;

        $node->next = $current;
        $previous->next = $node;
        $current->prev = $node;
        $node->prev = $previous;
    }

    /** remove any element in index required */
    public function removeAt($index): bool {
        if (!($index >= 0 && $index < $this->count)) return false;
        $current = $this->head;

        if ($index === 0) 
            $this->removedIndexIsHead();
        else if ($index === $this->count-1) 
            $this->removedIndexIsTail();
        else 
            $this->removedIndexIsInAnyPosition($index);

        $this->count--;
        return $current->element;
    }

    /** Remove the head */
    private function removedIndexIsHead() {
        $this->head = $this->head->next;

        if ($this->count === 1) 
            $this->tail = null;
        else
            $this->head->prev = null;
    }

    /** Remove the tail */
    private function removedIndexIsTail() {
        $current = $this->tail;
        $this->tail = $current->prev;
        $this->tail->next = null;
    }

    /** Remove element in specified index */
    private function removedIndexIsInAnyPosition($index) {
        /** @var DoublyNode */
        $current = $this->getElementAt($index);
        $prev = $current->prev;

        $prev->next = $current->next;
        $current->next->prev = $prev;
    }

    /** get element of specified index */
    public function getElementAt($index) {
        if (!($index >= 0 && $index <= $this->count)) return null;

        /** @var Node $node */
        $node = $this->head;
        for ($i=0; $i < $index && $node != null; $i++) 
            $node = $node->next;

        return $node;
    }

    public function __toString() {
        if ($this->head == null) return '';
        $res = '';
        $current = $this->head;

        while ($current->next != null) 
            $res .= "{$current->element} -> ";

        $res .= " END";
        return $res;
    }

    /** get the size of doubly linked list */
    public function size() {
        return $this->count;
    }

    /** get head of doubly linked list */
    public function getHead() {
        return $this->head;
    }

    /** get tail of doubly linked list */
    public function getTail() {
        return $this->tail;
    }
}