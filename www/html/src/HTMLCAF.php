<?php
namespace releasecheck;

require_once __DIR__ . '/HTML.php';

class HTMLCAF extends HTML
{
    public function isCAF(): bool
    {
        return true;
    }
}
