<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<body>
    <?php include("menu.php") ?>
    <div class="row">
        <form method="post" action="../controller/ControllerRegistre.php" id="form" name="form" onsubmit="valider(document.form); return false;" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nom" name="nom" placeholder="Nom du livre" required autofocus>
                <input class="form-control" type="text" id="auteur" name="auteur" placeholder="Auteur du livre" required>
                <input class="form-control" type="number" id="quantite" name="quantite" placeholder="Nombre de pages" required>
                <input class="form-control" type="text" id="prix" name="prix" placeholder="Prix ​​du livre"  required>
                <input class="form-control" type="date" id="date" name="date" placeholder="Date de publication" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="registre">Registre</button>
            </div>
        </form>
    </div>

    <script language="javascript" type="text/javascript">

        function valider(formulaire) {
            var quantite = form.quantite.value;
            var prix = form.prix.value;
            for (i = 0; i <= formulaire.length - 2; i++) {
                if ((formulaire[i].value == "")) {
                    alert("Remplissez le champ" + formulaire[i].name);
                    formulaire[i].focus();
                    return false;
                }
            }
            if (quantite <= 0) {
                alert('Le nombre de pages ne peut pas être égal ou inférieur à 0');
                form.quantite.focus();
                return false;
            }
            if (prix <= 0) {
                alert('Le prix du livre ne peut être égal ou inférieur à 0');
                form.prix.focus();
                return false;
            }
            formulaire.submit();
        }

    </script>
</body>

</html>
