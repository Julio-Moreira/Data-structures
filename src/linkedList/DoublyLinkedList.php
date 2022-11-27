<?php
namespace Julio\DataStructure\linkedList;

use Julio\DataStructure\linkedList\LinkedList;

class DoublyLinkedList extends LinkedList {
    private $tail = null;

    public function __construct() {
        parent::__construct();
    }
}