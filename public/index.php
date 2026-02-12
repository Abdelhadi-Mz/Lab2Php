<?php
declare(strict_types=1);
    use App\Entity\Filiere;
    use App\Entity\Etudiant;
    use App\Repository\FakeEtudiantRepository;
    
    spl_autoload_register(function (string $class){
        $prefix = 'App\\';
        $baseDir = __DIR__ . '/../src/';

        if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
            return;
        }

        $relativeClass = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require $file;
        }
    });
    $f = new Filiere(null, "ComputerScience");
    echo $f->getLibelle();
    
    
    echo "<br>";
    $f = new Filiere(1, "Math");
    
    $e = new Etudiant(null, "Yuss", "Yuss@gmail.com", $f);

    echo $e->getNom() . " - " . $e->getFiliere()->getLibelle();
    
    
    try {
        $bad = new Etudiant(null, "", "notmail", $f);
    } catch (\InvalidArgumentException $ex) {
        echo "Erreur capturée : " . $ex->getMessage();
    }

    

    $repo = new FakeEtudiantRepository();
    $f1 = new Filiere(1, "Informatique");
    echo "<br>";
    $e1 = new Etudiant(null, "Sara", "faris@gmail.com", $f1);
    echo "<br>";
    $e2 = new Etudiant(null, "Youssef", "lyoss@gmail.com", $f1);

    $repo->save($e1);
    $repo->save($e2);

    echo "Insertion:\n";
    foreach ($repo->findAll() as $e) {
        echo $e->getId() . " - " . $e->getNom() . " (" . $e->getFiliere()->getLibelle() . ")\n";
    }

    $e1->setNom("Sara geri");
    $repo->save($e1);
    echo "<br>";
    echo "Modification:\n";
    echo $repo->findById($e1->getId())->getNom() . "\n";
    
    $repo->delete($e2->getId());
    echo "<br>";
    echo "Suppression:\n";
    foreach ($repo->findAll() as $e) {
    echo $e->getNom() . "\n";
    }
 ?>
