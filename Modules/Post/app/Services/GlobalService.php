<?php

namespace Modules\Post\Services;

class GlobalService
{
    public $user;
    public function __construct()
    {
        $this->user = [
            'name' => 'Hello Laravel',
            'email' => 'laravel@gmail.com',
            'phone' => '01785452563'
        ];
    }

    public function userData()
    {
        return $this->user;
    }
}
