<?php
namespace Julio\DataStructure\test\circularLinkedList;

use Julio\DataStructure\Complementary\Node;
use Julio\DataStructure\linkedList\CircularLinkedList;
use PHPUnit\Framework\TestCase;

require_once "vendor/autoload.php";

class CircularLinkedListTest extends TestCase {
    public function testIfNodeIsWorking() {
        $node = new Node(1);
        $node->next = new Node(2);

        self::assertSame(1, $node->element);
        self::assertSame(2, $node->next->element);
        self::assertNull($node->next->next);
    }

    public function testPushOneItemToList() {
        $circularLinkedList = new CircularLinkedList();
        $circularLinkedList->push(1);

        self::assertSame(1, $circularLinkedList->getHead()->element);
        self::assertSame(1, $circularLinkedList->size());
        self::assertSame($circularLinkedList->getHead()->element, $circularLinkedList->getLastitem()->element);
        self::assertSame($circularLinkedList->getHead(), $circularLinkedList->getLastitem()->next);
    }

    public function testPushManyItemsToList() {
        $circularLinkedList = new CircularLinkedList();
        $circularLinkedList->push(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

        self::assertSame(0, $circularLinkedList->getHead()->element);
        self::assertSame(11, $circularLinkedList->size());
        self::assertFalse($circularLinkedList->isEmpty());

        self::assertSame(5, $circularLinkedList->getElementAt(5)->element);
        self::assertSame(5, $circularLinkedList->indexOf(5));

        self::assertSame($circularLinkedList->getHead(), $circularLinkedList->getLastItem()->next);
    }

    public function testInsertElementInList() {
        $circularLinkedList = new CircularLinkedList();
        $circularLinkedList->push(0, 1, 2, 3);
        $circularLinkedList->insert(-1, 0);
        $circularLinkedList->insert(2.5, 2);

        self::assertSame(-1, $circularLinkedList->getHead()->element);
        self::assertSame(2.5, $circularLinkedList->getElementAt(2)->element);
        self::assertSame(5, $circularLinkedList->indexOf(3));

        self::assertSame($circularLinkedList->getHead(), $circularLinkedList->getLastItem()->next);
    }

    public function testRemoveItems() {
        $circularLinkedList = new CircularLinkedList();
        $circularLinkedList->push(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

        $circularLinkedList->remove(2);
        $circularLinkedList->removeAt(2);
        $circularLinkedList->remove(10);

        self::assertSame(0, $circularLinkedList->getHead()->element);
        self::assertSame(8, $circularLinkedList->size());

        self::assertSame(4, $circularLinkedList->getElementAt(2)->element);
        self::assertSame(null, $circularLinkedList->indexOf(10));
        self::assertSame(7, $circularLinkedList->indexOf(9));
    }
}