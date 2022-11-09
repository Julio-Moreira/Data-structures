<?php
namespace Julio\DataStructure\test\linkedList;

use Julio\DataStructure\linkedList\LinkedList;
use PHPUnit\Framework\TestCase;

require_once "vendor/autoload.php";

class LinkedListTest extends TestCase {
    public function testPushOneItemToList() {
        $linkedList = new LinkedList();
        $linkedList->push(1);
        // todo
    }
}