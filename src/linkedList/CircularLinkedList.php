<?php
namespace Julio\DataStructure\linkedList;

use Julio\DataStructure\Complementary\Node;

class CircularLinkedList extends LinkedList {
    private ?Node $head = null;
    private int $count = 0;

    /** push values in list */
    public function push(...$elements): void {
        foreach ($elements as $element) {
            $node = new Node($element);
            
            if ($this->head == null) {
                $this->head = $node;
            } else {
                $lastItem = $this->getLastItem();
                $lastItem->next = $node;
            }

            $node->next = $this->head;
            $this->count++;
        }
    }

    /** insert element in specified index */
    public function insert($element, $index): bool {
        if (!($index >= 0 && $index <= $this->count)) return false;

        $node = new Node($element);
        if ($index === 0) {
            $this->insertedIndexIsHead($node);
        } else {
            $previous = $this->getElementAt($index - 1);
            $node->next = $previous->next;
            $previous->next = $node;            
        }

        $this->count++;
        return true;
    }

    private function insertedIndexIsHead(Node $node): void {
        $current = $this->head;

        if ($this->head == null) {
            $current = $node;
            $node->next = $current;
        } else {
            $node->next = $current;
            $current = $this->getLastItem();
            $this->head = $node;
            $current->next = $this->head;
        }
    }

    /** remove an specific node */
    public function removeAt(mixed $index): ?Node {
        if (!($index >= 0 && $index < $this->count)) return null;

        if ($index === 0) {
            $this->ifRemovedIndexIsZero();
        } else {
            /** @var Node */
            $current = $this->getElementAt($index);
            $previous = $this->getElementAt($index-1);
            $previous->next = $current->next;
        }

        $this->count--;
        return $current;
    }

    private function ifRemovedIndexIsZero(): void {
        if ($this->size() === 1) {
            $this->head = null;
        } else {
            $removed = $this->head;
            $current = $this->getLastItem();

            $this->head = $this->head->next.
            $current->next = $this->head;
            $current = $removed;
        }
    }

    /** Get Last item of list */
    public function getLastItem(): ?Node {
        return $this->getElementAt($this->size() - 1);
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

    public function size() {
        return $this->count;
    }

    public function getHead() {
        return $this->head;
    }

    /** Get the index of element in list */
    public function indexOf($element) {
        /** @var Node */
        $current = $this->head;
        for ($i=0; $i < $this->count && $current != null; $i++) { 
            if ($element === $current->element) return $i; 
            
            $current = $current->next;
        }
        return null;
    }
}