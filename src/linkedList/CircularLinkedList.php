<?php
namespace Julio\DataStructure\linkedList;

use Julio\DataStructure\Complementary\Node;

class CircularLinkedList extends LinkedList {
    public function __construct() {
        parent::__construct();
    }

    /** push values in list */
    public function push(...$elements) {
        foreach ($elements as $element) {
            $node = new Node($element);
            
            if ($this->head == null) {
                $this->head = $node;
            } else {
                $lastItem = $this->getElementAt($this->size()-1);
                $lastItem->next = $node;
            }

            $node->next = $this->head;
            $this->count++;
        }
    }

    /** insert element in specified index */
    public function insert($element, $index) {
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
            $current = $this->getElementAt($this->size()-1);
            $this->head = $node;
            $current->next = $this->head;
        }
    }
}