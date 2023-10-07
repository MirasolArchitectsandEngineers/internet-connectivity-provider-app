<?php

namespace App\Actions\Router;

use App\Models\Router;

class CreateRouter
{
    public function create($input)
    {
        return Router::create($input);
    }
}
