<?php

namespace App\Actions\Router;

use App\Models\Router;

class UpdateRouter
{
    public function update($input, Router $router)
    {
        $router->update($input);
    }
}
