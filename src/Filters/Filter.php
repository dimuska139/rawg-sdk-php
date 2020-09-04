<?php


namespace Rawg\Filters;


abstract class Filter
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter(get_object_vars($this), function($element){
            return !is_null($element);
        });
    }
}