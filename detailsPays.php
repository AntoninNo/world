<?php require_once 'header.php'; ?>
<?php require_once 'inc/manager-db.php'; ?>
<?php
$name_pays = $_GET['name'];
if ($name_pays == "Russia")
    $name_pays = "Russian Federation";

$info = getPaysByName($name_pays);
?>

<h1> <?php echo $name_pays ?> </h1>
<table class="table">
    <tr>
    <th></th>
    <th>Drapeau</th>
    <th>Code</th>
    <th>Continent</th>
    <th>Capitale</th>
    <th>Population</th>
    <th>Superficie</th>
    </tr>

    <tr>
        <td></td>
        <?php  $source = 'images/drapeau/'.strtolower($info -> Code2).".png" ?>
        <td> <img src=<?= $source;  ?> ></td>
        <td> <?php echo $info->Code ?></td>
        <td> <?php echo $info->Continent ?></td>
        <td> <?php
            $capitale = GetCapitale($info->Capital)-> Name ;
            if (empty($capitale)){
            echo "None";
            }
            else{
            echo $capitale;
            }
        ?></td>
        <td> <?php echo $info->Population ?></td>
        <td> <?php echo $info->SurfaceArea ?></td>
    </tr>
</table>

<h3 class="space-below"> <?php echo "Données économiques et sociales" ?> </h3>

<style>
  .space-below {
    margin-top: 30px; 
  }
</style>

<table>
    <tr>
        <th>Population</th>
        <th> <?php echo $info->Population ?></th>
    </tr>
    <tr>
        <td>PNB</td>
        <th> <?php echo $info->GNP ?></th>
    </tr>
    <tr>
        <td>Chef D'état</td>
        <th> <?php echo $info->HeadOfState ?></th>
    </tr>
    <tr>
        <td>Espérance de vie</td>
        <th> <?php echo $info->LifeExpectancy ?></th>
    </tr>
</table>


