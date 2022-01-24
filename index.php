<?php require 'classes/Character.php' ?>
<?php require 'classes/Hero.php' ?>
<?php require 'classes/Ennemy.php' ?>
<?php require 'classes/Paladin.php' ?>
<?php require 'classes/Wizard.php' ?>
<?php require 'classes/Assassin.php' ?>
<?php require 'classes/WebDev.php' ?>
<?php require 'classes/Revenant.php' ?>
<?php require 'classes/UrukHaï.php' ?>
<?php require 'classes/Coronuviras.php' ?>
<?php require 'classes/Bug.php' ?>

<?php 

session_start();

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
    <?php if(!isset($_POST['classConfirm']) && empty($_SESSION['round'])){
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

    <?php 

if(!isset($_SESSION['round'])){
    $rounds = 1;
    $_SESSION['heroMaxHealth'] = $Hero->getHealth();
    $_SESSION['ennemyMaxHealth'] = $Ennemy->getHealth();
    $heroDefaultHealth = $_SESSION['heroMaxHealth'];
    $ennemyDefaultHealth = $_SESSION['ennemyMaxHealth'];
} else {
    $rounds = $_SESSION['round'];
    $heroDefaultHealth = $_SESSION['heroMaxHealth'];
    $ennemyDefaultHealth = $_SESSION['ennemyMaxHealth'];
}

if($rounds >= 2){
    $Hero = unserialize($_SESSION['hero']);
    $Ennemy = unserialize($_SESSION['ennemy']);
}

    $heroHealth = $Hero->getHealth();
    $ennemyHealth = $Ennemy->getHealth();
    
    if  ($heroHealth > 0 && $ennemyHealth > 0) {
        $heroPreviousHealth = $Hero->getHealth();
        $ennemyPreviousHealth = $Ennemy->getHealth();
        $Hero->createAttack();
        $Ennemy->createAttack();
        $Ennemy->updateRage();
        $Hero->updateRage();
        $ennemyHealth = $Ennemy->attacked($Hero->attack());
        $Ennemy->setHealth($ennemyHealth);
        $heroHealth = $Hero->attacked($Ennemy->attack());
        $Hero->setHealth($heroHealth);
        $heroLifeBarStatus = 100 * $Hero->getHealth() / $heroDefaultHealth;
        $heroRageBarStatus = 100 * $Hero->getRage() / 100;
        $ennemyLifeBarStatus = 100 * $Ennemy->getHealth() / $ennemyDefaultHealth;
        $ennemyRageBarStatus = 100 * $Ennemy->getRage() / 100;
    ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 my-4 forestCol text-white">
                    <h2 class="my-3 text-center">Tour <?= $rounds ?></h2>
                    <div class="row">
                        <div class="col-5">
                            <img class="fightImage" src="<?= $Hero->image() ?>" alt="Image du héro">
                            <div class="progress my-2 lifeBar">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $heroLifeBarStatus . '%' ?>" aria-valuemin="0" aria-valuemax="100"><?= $heroHealth . '/' . $heroDefaultHealth ?></div>
                            </div>
                            <div class="progress my-2 rageBar">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $heroRageBarStatus . '%' ?>" aria-valuemin="0" aria-valuemax="100"><?= $Hero->getRage() . '/' . 100 ?></div>
                            </div>
                            <p class="mt-4 text-center"><img class="battleIcon" src="assets/image/shield.svg"> <span class="battleInfos"><?= $Hero->getShieldValue() ?></span></p>
                            <p class="mt-2 text-center"><img class="battleIcon" src="assets/image/singleSword.svg"> <span class="battleInfos"> <?= $Hero->getWeaponDamage() ?> </span></p>
                            <p class="damagesTaken">- <?= $heroPreviousHealth - $heroHealth ?></p>
                        </div>
                        <div class="col-2 align-self-center">
                            <img class="swordLogo" src="assets/image/swords.svg">
                        </div>
                        <div class="col-5">
                            <img class="fightImage" src="<?= $Ennemy->image() ?>" alt="Image de l'ennemi">
                            <div class="progress my-2">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $ennemyLifeBarStatus . '%' ?>" aria-valuemin="0" aria-valuemax="100"><?= $ennemyHealth . '/' . $ennemyDefaultHealth ?></div>
                            </div>
                            <div class="progress my-2 rageBar">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $ennemyRageBarStatus . '%' ?>" aria-valuemin="0" aria-valuemax="100"><?= $Ennemy->getRage() . '/' . 100 ?></div>
                            </div>
                            <p class="mt-4 text-center"><img class="battleIcon" src="assets/image/shield.svg"> <span class="battleInfos"><?= $Ennemy->getShieldValue() ?></span></p>
                            <p class="mt-2 text-center"><img class="battleIcon" src="assets/image/singleSword.svg"> <span class="battleInfos"> <?= $Ennemy->getWeaponDamage() ?> </span></p>
                            <p class="damagesTaken">- <?= $ennemyPreviousHealth -  $ennemyHealth  ?></p>
 
                        </div>
                    </div>
                </div>
                <?php if($heroHealth > 0 && $ennemyHealth > 0){ ?>
                <div class="col-12 text-center">
                    <?php $rounds++;
    $_SESSION['round'] = $rounds; ?>
                
                <a href="<?= 'index.php?sessionRound=' . $rounds ?>"><button class="nextLevel">Prochain round</button></a>
                </div> 
                <?php } ?>
            </div>
        </div>
    <?php
    $_SESSION['hero'] = serialize($Hero);
    $_SESSION['ennemy'] = serialize($Ennemy);
    }
    ?>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-6 text-center">
                <?php if ($Ennemy->getHealth() <= 0) { 
                    session_unset(); ?>
                    <p class="winText">Victoire !</p>
                    <a href="index.php"><button class="nextLevel">Recomencer</button></a>
                <?php } else if ($Hero->getHealth() <= 0) { 
                    session_unset(); ?>
                    <p class="loseText">Défaite...</p>
                    <a href="index.php"><button class="nextLevel">Recomencer</button></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
    <!-- <script src="assets/js/autoscroll.js"></script> -->

</html>