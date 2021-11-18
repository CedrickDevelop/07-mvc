<?php

namespace App\Core;

class Response
{

    public function setCodeHeader($code)
    {
        http_response_code($code);
    }
}
