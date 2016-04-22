<?php

interface CollectionInterface
{
    public function add($element);
    public function get($key);
    public function remove();
}