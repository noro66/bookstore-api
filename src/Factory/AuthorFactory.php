<?php
// src/Factory/AuthorFactory.php

namespace App\Factory;

use App\Entity\Author;
use Zenstruck\Foundry\Foundry;

class AuthorFactory extends Foundry
{
    protected function getDefaults(): array
    {
        return [
            'firstName' => self::faker()->firstName,
            'lastName' => self::faker()->lastName,
            'bibliography' => self::faker()->sentence(5),
        ];
    }

    protected static function getClass(): string
    {
        return Author::class;
    }
}
