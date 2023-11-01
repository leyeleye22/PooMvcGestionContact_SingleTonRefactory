<?php
require_once('../../Model/Databases.php');
$db = Databases::getInstance();
$tab = $db->AfficheClientFavoris();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Css/Style.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/all.min.css'>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h4 class="alert alert-danger text-center">Contact Favoris</h4>
        <div class="row">
            <div class="col-sm-12 text-center">

                <table class="table table-hover">
                    <thead>
                        <tr>

                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Numero Telephone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($tab as $cli) : ?>
                        <tr>

                            <td><?php echo $cli['nom'] ?></td>
                            <td><?php echo $cli['prenom'] ?></td>
                            <td><?php echo $cli['numerotelephone'] ?></td>
                            <td>
                                <form action="../../Controller/SuppressioModifierFavoris.php" method="POST">
                                    <button class="btn btn-success" name="modif" value="<?php echo $cli['id'] ?>"> Modifier</button>
                                    <button class="btn btn-danger" name="supp" value="<?php echo $cli['id'] ?>">Supprimer</button>
                                    <button class="btn btn-success" name="plusterm" value="<?php echo $cli['id'] ?>">Enlever Comme Favoris </button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </table>
                <h4 class="alert alert-info"><a href="./admin.php">Voir Liste Des Contacts ></h4>
            </div>
        </div>
    </div>
    <div><br><br><br><br><br><br><br></div>
    <div><br><br><br><br><br><br><br></div>
    <?php include 'footer.php'; ?>
</body>

</html>