<?php
namespace Tests;

use Collection;
use StringFormatterCSV;
use DsExample;

class DsExampleTest extends \PHPUnit_Framework_TestCase
{
    protected $obj;

    public function setUp()
    {
        $this->obj = new DsExample(new Collection());
    }

    /**
     * @test
     */
    public function add_to_collection()
    {
        $this->obj->add(1);
        $this->assertCount(1, $this->obj->getCollection());
    }
    /**
     * @test
     */
    public function add_multiple_to_collection()
    {
        $this->createRandomCollection(5);
        $this->assertCount(5, $this->obj->getCollection());
    }
    /**
     * @test
     */
    public function get_element_in_position()
    {
        $this->createStaticCollection(3);
        $position = 1;
        $this->assertEquals(3, $this->obj->getCollection()->get($position));
    }
    /**
     * @test
     */
    public function add_in_the_middle()
    {
        $this->createRandomCollection(4);
        $this->obj->add(100);
        $expectedPosition = 2;
        $this->assertEquals(100, $this->obj->getCollection()->get($expectedPosition));
        $this->createRandomCollection(9);
        $this->obj->add(1000);
        $expectedPosition = 7;
        $this->assertEquals(1000, $this->obj->getCollection()->get($expectedPosition));
        $this->assertCount(15, $this->obj->getCollection());
    }
    /**
     * @test
     */
    public function add_at_the_end()
    {
        $this->createRandomCollection(5);
        $this->obj->add(100);
        $expectedPosition = 5;
        $this->assertEquals(100, $this->obj->getCollection()->get($expectedPosition));
    }
    /**
     * @test
     */
    public function size()
    {
        $this->createRandomCollection(5);
        $this->assertEquals(5, $this->obj->size());
    }
    /**
     * @test
     */
    public function remove()
    {
        $this->createStaticCollection(5);
        $return = $this->obj->remove();
        $this->assertCount(4, $this->obj->getCollection());
        $this->assertEquals(2, $return);
    }
    /**
     * @test
     */
    public function to_string()
    {
        $this->createStaticCollection(5);
        $formatter = new StringFormatterCSV();
        $expected = '1, 3, 5, 2, 4';
        $this->assertEquals($expected, $this->obj->toString($formatter));
        $this->obj->add(6);
        $expected = '1, 3, 5, 2, 4, 6';
        $this->assertEquals($expected, $this->obj->toString($formatter));
        $this->obj->add(7);
        $expected = '1, 3, 5, 7, 2, 4, 6';
        $this->assertEquals($expected, $this->obj->toString($formatter));
    }

    private function createRandomCollection($int)
    {
        for ($i = 0; $i < $int; $i++) {
            $this->obj->add(rand(1, 10));
        }
    }
    private function createStaticCollection($int)
    {
        for ($i = 1; $i <= $int; $i++) {
            $this->obj->add($i);
        }
    }
}
