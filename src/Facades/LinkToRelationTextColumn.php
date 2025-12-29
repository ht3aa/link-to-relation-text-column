<?php

namespace Ht3aa\LinkToRelationTextColumn\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ht3aa\LinkToRelationTextColumn\LinkToRelationTextColumn
 */
class LinkToRelationTextColumn extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ht3aa\LinkToRelationTextColumn\LinkToRelationTextColumn::class;
    }
}
