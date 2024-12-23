<?php

namespace App\Story;

use App\Factory\AuthorFactory;
use Zenstruck\Foundry\Story;

final class DefaultAuthorsStory extends Story
{
    public function build(): void
    {
        AuthorFactory::createMany(100);
    }
}
