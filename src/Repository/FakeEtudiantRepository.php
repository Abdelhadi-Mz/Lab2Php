<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Etudiant;

final class FakeEtudiantRepository implements RepositoryInterface
{
    private  $data = [];
    private  $autoIncrement = 1;

    public function findAll()
    {
        return array_values($this->data);
    }

    public function findById(int $id)
    {
        return $this->data[$id] ;
    }

    public function save($entity)
    {
        if (!$entity instanceof Etudiant) {
            throw new \InvalidArgumentException("Type non supporté.");
        }

        if ($entity->getId() === null) {
            $entity->setId($this->autoIncrement);
            $this->data[$this->autoIncrement] = $entity;
            $this->autoIncrement++;
        } else {
            $this->data[$entity->getId()] = $entity;
        }
    }

    public function delete(int $id)
    {
        unset($this->data[$id]);
    }
}
?>

