<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<body>
    <?php include("menu.php") ?>
    <?php require_once("../controller/ControllerEditer.php");?>
    <div class="row">
        <form method="post" action="../controller/ControllerEditer.php" id="form" name="form" onsubmit="valider(document.form); return false;" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nom" name="nome" value="<?php echo $editer->getNom(); ?>" required autofocus>
                <input class="form-control" type="text" id="auteur" name="auteur" value="<?php echo $editer->getAuteur(); ?>" required>
                <input class="form-control" type="number" id="quantite" name="quantite" value="<?php echo $editer->getQuantite(); ?>" required>
                <input class="form-control" type="number" id="prix" name="prix" value="<?php echo $editer->getPrix(); ?>" required>
                <select name="drapeau">
                    <?php $c = $editer->getDrapeau();?>
                    <option value="<?php echo $editer->getDrapeau();?>"><?php echo  ($editer->getDrapeau()== 0)? "Desactiver" :"Activer" ?></option>
                    <option value="<?php echo ($c == 0)? "1" : "0" ?>"><?php echo ($editer->getDrapeau()!= 0)? "Desactiver" :"Activer" ?></option>
                </select>
                <input class="form-control" type="date" id="date" name="date" value="<?php echo $editer->getDate(); ?>" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $editer->getNom();?>">
                <button type="submit" class="btn btn-success" id="editer" name="submit" value="editer">Editer</button>
            </div>
        </form>
    </div>
    <script language="javascript" type="text/javascript">

        function valider(formulaire) {
            var quantite = form.quantite.value;
            var prix = form.prix.value;
            for (i = 0; i <= formulaire.length - 2; i++) {
                if ((formulaire[i].value == "")) {
                    alert("Remplissez le champ " + formulaire[i].name);
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
