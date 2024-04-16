<?php include ('header.php'); ?>
<section id="allSection">
    <h2>Add Article</h2>
    <div class="container">
        <form id="forNew">
            <label for="titles">Title</label><br>
            <input type="text" id="titles" name="titles" maxlength="100" placeholder="Ex.Abc123$*@"><br><br>

            <label for="description">Description</label><br>
            <textarea id="description" name="description" rows="4" cols="100" maxlength="300"
                placeholder="Ex.texts/messages"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <article class="articleAdmin">
        <label for="description">Description obtenue à partir de la base de données par l'administrateur</label><br>
        <div id="showNew" class="article">
        </div>
    </article>
    <article class="commentUser">
        <label for="description">Obtenir les commentaires de l'utilisateur</label><br>
        <div id="showComments" class="article">

        </div>
    </article>
</section>
<?php include ('footer.php'); ?>
<script src="app/js/admin.js">defer</script>