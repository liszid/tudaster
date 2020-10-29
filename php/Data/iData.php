<?php

declare(strict_types=1);

namespace Data;

interface iData
{
    public static function Insert(array $array): bool;

    public static function Select(array $array, string $type): array;

    public static function Update(array $array, string $type): bool;

    public static function Delete(array $array, string $type): bool;

    public static function Check( ): bool;
}