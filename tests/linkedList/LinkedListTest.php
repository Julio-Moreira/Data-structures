<?php
namespace Julio\DataStructure\test\linkedList;

use Julio\DataStructure\linkedList\LinkedList;
use PHPUnit\Framework\TestCase;

require_once "vendor/autoload.php";

class LinkedListTest extends TestCase {
    public function testPushOneItemToList() {
        $linkedList = new LinkedList();
        $linkedList->push(1);

        self::assertSame(1, $linkedList->getHead());
        self::assertSame(1, $linkedList->size());
        self::assertFalse($linkedList->isEmpty());
    }

    public function testPushManyItemsToList() {
        $linkedList = new LinkedList();
        $linkedList->push(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

        self::assertSame(0, $linkedList->getHead());
        self::assertSame(10, $linkedList->size());
        self::assertFalse($linkedList->isEmpty());

        self::assertSame(5, $linkedList->getElementAt(5));
        self::assertSame(5, $linkedList->indexOf(5));
    }

    public function testInsertElementInList() {
        $linkedList = new LinkedList();
        $linkedList->push(0, 1, 2, 3);
        $linkedList->insert(-1, 0);
        $linkedList->insert(2.5, 2);

        self::assertSame(-1, $linkedList->getHead());
        self::assertSame(2.5, $linkedList->getElementAt(2));
        self::assertSame(4, $linkedList->indexOf(3));
    }

    public function testRemoveItems() {
        $linkedList = new LinkedList();
        $linkedList->push(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

        $linkedList->remove(2);
        $linkedList->removeAt(2);
        $linkedList->remove(10);

        self::assertSame(0, $linkedList->getHead());
        self::assertSame(7, $linkedList->size());

        self::assertSame(4, $linkedList->getElementAt(2));
        self::assertSame(null, $linkedList->indexOf(10));
        self::assertSame(7, $linkedList->indexOf(9));

    }

    public function testPrintList() {
        $linkedList = new LinkedList();
        $linkedList->push(0, 1, 2, 3, 4, 5);

        self::assertSame('START -> |0| -> |1|1| -> |2|2| -> |3|3| -> |4|4| -> |5|5| -> END', $linkedList);
    }
}