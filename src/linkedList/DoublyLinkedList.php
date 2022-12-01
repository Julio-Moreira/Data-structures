<?php
namespace Julio\DataStructure\linkedList;

use Julio\DataStructure\Complementary\DoublyNode;
use Julio\DataStructure\linkedList\LinkedList;

class DoublyLinkedList extends LinkedList {
    private ?DoublyNode $tail = null;
    private ?DoublyNode $head = null;
    private int $count = 0;

    /** insert any element in specified index */
    public function insert($element, $index): bool {
        if (!($index >= 0 && $index <= $this->count)) return false;
        $node = new DoublyNode($element);
        
        // if index is zero
        if ($index == 0) $this->indexIsZero($node);

        // if index is the tail
        else if ($index == $this->count) $this->indexIsTail($node);
        
        // if index is in any position
        else $this->indexIsInAnyPosition($node, $index);

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