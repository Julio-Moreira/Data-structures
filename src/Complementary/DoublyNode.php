<?php
namespace Julio\DataStructure\Complementary;

use Julio\DataStructure\Complementary\Node;

class DoublyNode {
    public function __construct(
        public $element,
        public $next = null,
        public $prev = null
    ) { }
}