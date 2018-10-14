<?php

namespace QueryGrid\QueryGrid\Columns;

class FilterException extends \RuntimeException
{
    public static function unknownFilterType(string $type)
    {
        return new static("Trying to set an unknown filter type: {$type}");
    }
}
