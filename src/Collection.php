<?php

class Collection implements CollectionInterface, Countable
{
    protected $data = [];

    /**
     * add into collection
     * @param $element
     */
    public function add($element)
    {
        ($this->count() % 2 === 0)
            ? $this->addInTheMiddle($element)
            : $this->addAtTheEnd($element);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * add element into middle of collection
     * @param $element
     */
    private function addInTheMiddle($element)
    {
        $index = intval($this->count() / 2);
        array_splice($this->data, $index, 0, $element);
    }

    /**
     * push the $element into collection
     * @param $element
     */
    private function addAtTheEnd($element)
    {
        $this->data[] = $element;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : null;
    }

    /**
     * remove last element and return the last element of remaining array
     * @return array
     */
    public function remove()
    {
        array_pop($this->data);
        return end($this->data);
    }

    /**
     * @return ArrayIterator
     */
    public function getData()
    {
        return $this->data;
    }
}