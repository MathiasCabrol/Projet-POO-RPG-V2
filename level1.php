<?php require 'Character.php' ?>
<?php require 'Hero.php' ?>
<?php require 'Ennemy.php' ?>
<?php require 'Orc.php' ?>
<?php require 'Paladin.php' ?>
<?php require 'Wizard.php' ?>
<?php require 'Assassin.php' ?>
<?php require 'WebDev.php' ?>
<?php require 'Revenant.php' ?>
<?php require 'UrukHaï.php' ?>
<?php require 'Coronuviras.php' ?>
<?php require 'Bug.php' ?>

<?php 

$errorList = [];

if(isset($_POST['classConfirm'])){
    if(isset($_POST['classChoice'])){
        $choice = $_POST['classChoice'];
    } else {
        $errorList['classChoice'] = 'Veuillez cocher une classe';
    }
}


if(isset($choice)){
    switch ($choice){
        case 1:
            $Hero = new Wizard();
            break;
        case 2:
            $Hero = new Paladin();
            break;
        case 3:
            $Hero = new Assassin();
            break;
        case 4:
            $Hero = new WebDev();
            break;
    }
    $randomEnnemy = rand(1, 4);
    switch ($randomEnnemy){
        case 1:
            $Ennemy = new Revenant();
            break;
        case 2:
            $Ennemy = new Urukhai();
            break;
        case 3:
            $Ennemy = new Coronuviras();
            break;
        case 4:
            $Ennemy = new Bug();
            break;
    }
    var_dump($Ennemy);
    var_dump($Hero);
}



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
    <h2 class="subTitle mb-5">Niveau 1</h2>
    <?php if(!isset($_POST['classConfirm'])){
        ?>
    <div class="container">
    <form method="post" action="#">
        <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="subTitle my-4">Choisissez votre classe !</h2>
                </div>
                
                <div class="col-12 col-md-3 choiceCol text-center">
                    <h3>Mage</h3>
                    <img class="choiceImage" src="assets/image/mage.webp" alt="mage image">
                    <input type="radio" name="classChoice" class="classChoice" value="1">
                </div>
                <div class="col-12 col-md-3 choiceCol text-center">
                    <h3>Paladin</h3>
                    <img class="choiceImage" src="assets/image/paladin.webp" alt="paladin image">
                    <input type="radio" name="classChoice" class="classChoice" value="2">
                </div>
                <div class="col-12 col-md-3 choiceCol text-center">
                    <h3>Assassin</h3>
                    <img class="choiceImage" src="assets/image/assassin.jpg" alt="assassin image">
                    <input type="radio" name="classChoice" class="classChoice" value="3">
                </div>
                <div class="col-12 col-md-3 choiceCol text-center">
                    <h3>Développeur Web</h3>
                    <img class="choiceImage" src="assets/image/dev.png" alt="développeur image">
                    <input type="radio" name="classChoice" class="classChoice" value="4">
                </div>
                <div class="col-12 text-center mt-4">
                    <input type="submit" class="nextLevel" name="classConfirm" value="Fight">
                </div>
               

        </div>
        </form>
    </div>
    <!-- Starting else condition for isset submit post button -->
    <?php } else { ?>

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
                <div class="col-12 col-md-6 my-4 forestCol text-white">
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
            <div class="col-12 col-md-6">
                <?php if ($Orc->getHealth() <= 0) { ?>
                    <p class="winText">Victoire !</p>
                    <a href="level2.php"><button class="nextLevel">Niveau Suivant</button></a>
                <?php } else { ?>
                    <p class="loseText">Défaite...</p>
                    <a href="level1.php"><button class="nextLevel">Recomencer</button></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Ending else condition generating html code -->
    <?php } ?>
</body>
    <!-- <script src="assets/js/autoscroll.js"></script> -->

</html>