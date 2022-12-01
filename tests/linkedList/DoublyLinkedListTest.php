<?php
namespace Julio\DataStructure\test\linkedList;

use Julio\DataStructure\Complementary\DoublyNode;
use Julio\DataStructure\linkedList\DoublyLinkedList;
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

    public function testInsertInHead() {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insert(2, 0);
        $doublyLinkedList->insert(3, 0);
        
        /** @var DoublyNode */
        $head = $doublyLinkedList->getHead();
        $tail = $doublyLinkedList->getTail();
        
        self::assertSame(3, $head->element);
        self::assertSame(2, $head->next->element);
        self::assertSame(3, $tail->prev->element);
    }

    public function testInsertInTail() {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insert(2, 0);
        $doublyLinkedList->insert(3, 1);

        /** @var DoublyNode */
        $head = $doublyLinkedList->getHead();
        $tail = $doublyLinkedList->getTail();

        self::assertSame(3, $head->next->element);
        self::assertSame(2, $tail->prev->element);
        self::assertSame(3, $tail->element);        
    }

    public function testInsertManyItems() {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insert(2, 0);
        $doublyLinkedList->insert(3, 3);
        $doublyLinkedList->insert(2, 2);
        $doublyLinkedList->insert(1, 1);
        $doublyLinkedList->insert(6, 5);

        $tail = $doublyLinkedList->getTail();
        
        self::assertSame(2, $doublyLinkedList->size());
        self::assertSame(1, $tail->element);
        self::assertSame(2, $tail->prev->element);
    }
}