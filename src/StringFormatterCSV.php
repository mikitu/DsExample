<?php

class StringFormatterCSV implements StringFormatterInterface
{

    /**
     * @param array $collection
     * @return string
     */
    public function format($collection)
    {
        if (! is_array($collection)) {
            return null;
        }
        return implode(', ', $collection);
    }
}