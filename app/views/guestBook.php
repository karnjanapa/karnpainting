<?php include ('header.php'); ?>

<section id="allSection">

    <h1>Donnez-nous vos commentaires pour développer notre service</h1>
    <form id="commentUser">
        <br>
        <textarea id="writeComments" rows="4" cols="50" placeholder="Entrez le texte ici. ."></textarea>
        <input id="submitButton" type="submit" value="Submit" />
    </form>
    <div id="showMessage">
        <p>Lister les commentaires</p>
        <div id="showComments" class="articleComments">
        </div>
    </div>

</section>
<?php include ('footer.php'); ?>
<script src="app/js/guestBook.js">defer</script>