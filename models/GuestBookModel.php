<?php

/**
 * Class GuestBookModel
 * @property $id
 * @property $dtime
 * @property $name
 * @property $body
 */
class GuestBookModel extends AbstractModel
{
    /**
     * @var string
     */
    protected static $table = 'guest_book';
}