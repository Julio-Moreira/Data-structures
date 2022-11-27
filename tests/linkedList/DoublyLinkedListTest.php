<?php
namespace Julio\DataStructure\test\linkedList;

use Julio\DataStructure\Complementary\DoublyNode;
use PHPUnit\Framework\TestCase;

class DoublyLinkedListTest extends TestCase {
    public function testIfDoublyNodeIsWorking() {
        $firstDoublyNode = new DoublyNode(1);
        $secondDoublyNode = new DoublyNode(2, prev: $firstDoublyNode);
        $thirdDoublyNode = new DoublyNode(3, prev: $secondDoublyNode);

        $firstDoublyNode->next = $secondDoublyNode;
        $secondDoublyNode->next = $thirdDoublyNode;

        self::assertSame(1, $firstDoublyNode->element);
        self::assertNull($firstDoublyNode->prev);
        self::assertNull($thirdDoublyNode->next);
        self::assertSame(2, $thirdDoublyNode -> prev -> element);
        self::assertSame(2, $firstDoublyNode -> next -> element);
    }
}