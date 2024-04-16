<?php include ('header.php'); ?>
 <!-- ================================for bootstrap======================================= -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
 <!-- ================================ bootstrap======================================= -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>
<script src="app/js/api.js">defer</script>