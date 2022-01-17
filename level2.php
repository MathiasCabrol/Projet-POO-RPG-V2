<?php require 'Character.php' ?>
<?php require 'Hero.php' ?>
<?php require 'Orc.php' ?>

<?php
$Hero = new Hero(3000, 0, 'Main de la justice', 400, 'Armure Ygdrasil', 750);
$Orc = new Orc(1000, 0, 750, 1100);
$heroDefaultHealth = $Hero->getHealth();
$heroHealth = $Hero->getHealth();
$weaponDamage = $Hero->getWeaponDamage();
$rounds = 0;

$orcHealth = $Orc->getHealth();
$orcDefaultHealth = $Orc->getHealth();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
<h1 class="mainTitle mt-4 mb-2">Le donjon de Mordrynn</h1>
    <h2 class="subTitle mb-5">Niveau 2</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <table class="statTable">
                    <thead>
                        <tr>
                            <th colspan="2">Statistiques du héro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Santé</td>
                            <td><?= $Hero->getHealth() ?></td>
                        </tr>
                        <tr>
                            <td>Rage</td>
                            <td><?= $Hero->getRage() ?></td>
                        </tr>
                        <tr>
                            <td>Arme équipée</td>
                            <td><?= $Hero->getWeapon() ?></td>
                        </tr>
                        <tr>
                            <td>Dégats</td>
                            <td><?= $Hero->getWeaponDamage() ?></td>
                        </tr>
                        <tr>
                            <td>Armure équipée</td>
                            <td><?= $Hero->getShield() ?></td>
                        </tr>
                        <tr>
                            <td>Points d'armure</td>
                            <td><?= $Hero->getShieldValue() ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-4 align-self-center">
                <table class="statTable">
                    <thead>
                        <tr>
                            <th colspan="2">Statistiques de l'orc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Santé</td>
                            <td><?= $Orc->getHealth() ?></td>
                        </tr>
                        <tr>
                            <td>Rage</td>
                            <td><?= $Orc->getRage() ?></td>
                        </tr>
                        <tr>
                            <td>Dégats</td>
                            <td><?= $Orc->getMinDamage() . ', ' . $Orc->getMaxDamage() ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php while ($heroHealth > 0 && $orcHealth > 0) {
        $Orc->attack();
        $Hero->updateRage();
        $actualRage = $Hero->getRage();
        if ($actualRage > 100) {
            $actualOrcHealth = $Orc->getHealth() - $weaponDamage;
            $Orc->setHealth($actualOrcHealth);
            $orcHealth = $actualOrcHealth;
            $actualRage = 0;
            $Hero->setRage($actualRage);
        }
        $actualHealth = $Hero->attacked($Orc->getDamage());
        $Hero->setHealth($actualHealth);
        $heroHealth = $Hero->getHealth();
        $rounds++;
        $heroLifeBarStatus = 100 * $heroHealth / $heroDefaultHealth;
        $heroRageBarStatus = 100 * $actualRage / 100;
        $orcLifeBarStatus = 100 * $Orc->getHealth() / $orcDefaultHealth;
    ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 my-4 text-center forestCol text-white">
                    <h2 class="my-3">Tour <?= $rounds ?></h2>
                    <div class="row">
                        <div class="col-5 heroCol">
                            <img class="fightImage" src="assets/image/hero.jpg" alt="Image du héro">
                            <div class="progress my-2 lifeBar">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $heroLifeBarStatus . '%' ?>" aria-valuemin="0" aria-valuemax="100"><?= $heroHealth . '/' . $heroDefaultHealth ?></div>
                            </div>
                            <div class="progress my-2 rageBar">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $heroRageBarStatus . '%' ?>" aria-valuemin="0" aria-valuemax="100"><?= $actualRage . '/' . 100 ?></div>
                            </div>
                            <p class="mt-4"><img class="battleIcon" src="assets/image/shield.svg"> <span class="battleInfos"><?= $Hero->getShieldValue() ?></span></p>
                            <p class="damagesTaken">- <?= $Orc->getDamage() - $Hero->getShieldValue() ?></p>
                        </div>
                        <div class="col-2 align-self-center">
                            <img class="swordLogo" src="assets/image/swords.svg">
                        </div>
                        <div class="col-5 orcCol">
                            <img class="fightImage" src="assets/image/orc.jpg" alt="Image de l'orc">
                            <div class="progress my-2">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $orcLifeBarStatus . '%' ?>" aria-valuemin="0" aria-valuemax="100"><?= $orcHealth . '/' . $orcDefaultHealth ?></div>
                            </div>
                            <p class="mt-5"><img class="battleIcon" src="assets/image/singleSword.svg"> <span class="battleInfos"> <?= $Orc->getDamage() ?> </span></p>
                            <?php if ($actualRage == 0) {
                            ?>
                                <p class="damagesTaken">- <?= $weaponDamage ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-6 text-center">
                <?php if ($Orc->getHealth() <= 0) { ?>
                    <p class="winText">Victoire !</p>
                    <a href="level3.php"><button class="nextLevel">Niveau Suivant</button></a>
                <?php } else { ?>
                    <p class="loseText">Défaite...</p>
                    <a href="level1.php"><button class="nextLevel">Recomencer</button></a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
    <script src="assets/js/autoscroll.js"></script>

</html>