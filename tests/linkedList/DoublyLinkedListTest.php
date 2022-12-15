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

    public function testRemoveHead() {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insert(0, 0);
        $doublyLinkedList->insert(1, 1);
        $doublyLinkedList->insert(2, 2);
        $doublyLinkedList->insert(3, 3);
        $doublyLinkedList->insert(4, 4);
        $doublyLinkedList->removeAt(0);

        self::assertSame(1, $doublyLinkedList->getHead()->element);
    }

    public function testRemoveTail() {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insert(0, 0);
        $doublyLinkedList->insert(1, 1);
        $doublyLinkedList->insert(2, 2);
        $doublyLinkedList->insert(3, 3);
        $doublyLinkedList->insert(4, 4);
        $doublyLinkedList->removeAt(4);

        self::assertNull($doublyLinkedList->indexOf(4));
        self::assertNull($doublyLinkedList->getElementAt(4));
        self::assertSame(3, $doublyLinkedList->getTail()->element);
    }

    public function testRemoveAnyPosition() {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insert(0, 0);
        $doublyLinkedList->insert(1, 1);
        $doublyLinkedList->insert(2, 2);
        $doublyLinkedList->insert(3, 3);
        $doublyLinkedList->insert(4, 4);
        
        $doublyLinkedList->removeAt(1);
        $doublyLinkedList->removeAt(2);

        self::assertSame(2, $doublyLinkedList->getHead()->next->element);
        self::assertSame(4, $doublyLinkedList->getTail()->element);
        self::assertNull($doublyLinkedList->indexOf(3));
        self::assertNull($doublyLinkedList->indexOf(1));
    }

    public function testPushOneItem() {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->push(1);

        self::assertSame(1, $doublyLinkedList->getHead()->element);
        self::assertSame(1, $doublyLinkedList->size());
    }

    public function testPushManyItems() {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->push(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        
        self::assertSame(10, $doublyLinkedList->size());

        self::assertSame(1, $doublyLinkedList->getHead()->element);
        self::assertSame(2, $doublyLinkedList->getHead()->next->element);
        self::assertNull($doublyLinkedList->getHead()->prev);

        self::assertSame(10, $doublyLinkedList->getTail()->element);
        self::assertSame(9, $doublyLinkedList->getTail()->prev->element);
        self::assertNull($doublyLinkedList->getTail()->next);

        self::assertSame(6, $doublyLinkedList->getElementAt(5)->element);
        self::assertSame(8, $doublyLinkedList->getElementAt(5)->next->next->next->prev->element);
        self::assertSame(5, $doublyLinkedList->getElementAt(5)->prev->element);
    }
}