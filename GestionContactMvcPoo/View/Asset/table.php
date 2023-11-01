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
    </div>
</div>