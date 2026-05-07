<?php
namespace releasecheck;

require_once __DIR__ . '/HTML.php';

class HTMLCAF extends HTML
{
    public function shouldRenderTab(string $tab): bool
    {
        if ($tab === 'esi') {
            return false;
        }

        return true;
    }

    public function isTabAllowed(string $tab): bool
    {
        if ($tab === 'esi') {
            return false;
        }

        return true;
    }

    public function defaultTab(): string
    {
        return 'attributes';
    }
}
