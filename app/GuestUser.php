<?php


namespace Azure;


class GuestUser extends User {

    public $name = 'Guest';

    public function isSubscribed()
    {
        return false;
    }

}