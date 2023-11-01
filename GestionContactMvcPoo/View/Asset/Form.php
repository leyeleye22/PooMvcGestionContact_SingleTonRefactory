<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
        }

        input[type=text],
        input[type=tel] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
        }

        input[type=text]:focus,
        input[type=tel]:focus {
            background-color: #ddd;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <div class="container">
        <form action="" method="POST">
            <label for="nom"><b>Nom</b></label>
            <input type="text" value="<?= $f[0]['nom'] ?>" name="nom" required>
            <input type="hidden" name="idmodif" value="<?= $_POST['modif'] ?>">
            <label for="prenom"><b>Prenom</b></label>
            <input type="text" value="<?= $f[0]['prenom'] ?>" name="prenom" required>

            <label for="numeroTelephone"><b>Numero de Telephone</b></label>
            <input type="tel" value="<?= $f[0]['numerotelephone'] ?>" name="numeroTelephone" required>

            <button type="submit" class="btn" name="send">Modifier</button>
        </form>
    </div>

</body>

</html>