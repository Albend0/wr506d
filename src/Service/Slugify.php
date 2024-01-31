<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;

class Slugify
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function slugify(string $phrase): string
    {
        return $this->slugger->slug($phrase)->lower();
    }
}
