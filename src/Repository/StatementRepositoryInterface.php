<?php
declare(strict_types = 1);
namespace App\Repository;

interface StatementRepositoryInterface
{
    public function all(string $dateStart, $dateEnd, int $userId): array;
}