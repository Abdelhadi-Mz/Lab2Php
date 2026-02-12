<?php
declare(strict_types=1);

namespace App\Entity;

final class Etudiant
{
    private  $id;
    private  $nom;
    private  $email;
    private  $filiere;

    public function __construct( $id,  $nom,  $email,  $filiere)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setFiliere($filiere);
    }

    public function getId() { return $this->id; }

    public function setId( $id)
    {
        if ($id !== null && $id <= 0) {
            throw new \InvalidArgumentException("Id étudiant invalide.");
        }
        $this->id = $id;
    }

    public function getNom() { return $this->nom; }

    public function setNom(string $nom)
    {
        $nom = trim($nom);
        if ($nom === '') {
            throw new \InvalidArgumentException("Nom obligatoire.");
        }
        $this->nom = $nom;
    }

    public function getEmail() { return $this->email; }

    public function setEmail( $email)
    {
        $email = trim($email);
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Email invalide.");
        }
        $this->email = $email;
    }

    public function getFiliere() { return $this->filiere; }

    public function setFiliere(Filiere $filiere)
    {
        $this->filiere = $filiere;
    }
}
?>
