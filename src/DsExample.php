<?php

class DsExample implements ManageableInterface
{
    /**
     * @var CollectionInterface
     */
    private $collection;

    /**
     * ToyBlob constructor.
     * @param CollectionInterface $collection
     */
    public function __construct(CollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param $element
     */
    public function add($element)
    {
        $this->collection->add($element);
    }

    /**
     * @return CollectionInterface
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @return mixed
     */
    public function size()
    {
        return $this->collection->count();
    }

    /**
     * @return mixed
     */
    public function remove()
    {
        return $this->collection->remove();
    }

    /**
     * @param StringFormatterInterface $formatter
     * @return mixed
     */
    public function toString(StringFormatterInterface $formatter)
    {
        return $formatter->format($this->getCollection()->getData());
    }
}