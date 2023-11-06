<?php

namespace App\Repo;

use App\Repo\SiteRepo;

class SiteRepo
{
    /**
     * return site details
     *
     * @return void
     */
    public function details()
    {
        return [
            'server' => 'AWS',
            'type' => 'dedicated',
            'disk' => '1250Mb',
        ];
    }
}
