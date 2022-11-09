<?php
namespace Julio\DataStructure\Complementary;

class Node {
    public $element, $next;

    public function __construct($element) {
        $this->element = $element;
        $this->next = null;
    }
}
