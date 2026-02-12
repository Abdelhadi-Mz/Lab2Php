<?php
declare(strict_types=1);

namespace App\Entity;

final class Filiere
{
    private  $id;
    private  $libelle;

    public function __construct($id,  $libelle)
    {
        $this->setId($id);
        $this->setLibelle($libelle);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId( $id)
    {
        if ($id !== null && $id <= 0) {
            throw new \InvalidArgumentException("Id filiere errore : need to be positif");
        }
        $this->id = $id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle( $libelle)
    {
        
        if ($libelle === '') {
            throw new \InvalidArgumentException("Libelle obligatoire.");
        }
        $this->libelle = $libelle;
    }
}
?>

