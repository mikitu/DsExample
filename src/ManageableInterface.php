<?php

interface ManageableInterface
{
    public function add($element);
    public function remove();
    public function size();
    public function toString(StringFormatterInterface $formatter);
}