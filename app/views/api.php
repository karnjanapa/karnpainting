<?php include ('header.php'); ?>
<section id="allSection">

    <table class="table">
        <h1>Des musées en Bretagne</h1>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Département</th>
                <th scope="col">Liste de musées</th>
                <th scope="col">Adresse</th>
            </tr>
        </thead>
        <tbody id="apiData">
        </tbody>
    </table>
</section>


<?php include ('footer.php'); ?>
<script src="app/js/api.js">defer</script>