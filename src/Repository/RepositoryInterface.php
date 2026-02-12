<?php
declare(strict_types=1);

namespace App\Repository;

interface RepositoryInterface
{
    public function findAll();
    public function findById(int $id);
    public function save($entity);
    public function delete(int $id);
}
?>

