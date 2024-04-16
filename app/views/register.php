

<?php include('header.php'); ?>

<section id="allSection">
<form id="FormRegister" class="inputRegister">
  <div class="container">
    <h1> Je crée mon compte
      sur karnpainting</h1>
    <p> Créer un compte vous permet
      de sauvegarder vos favoris
      et de recevoir des
      offres personnalisées.</p>
    <hr>
    <label  for="uname"><b>Votre prénom et Nom</b></label>
    <input placeholder="Ex.kevin xxxx" id="name" type="text" >

    <label  for="email"><b>Votre E-mail</b></label>
    <input placeholder="Ex.kevin@gmail.com" id="email" type="email" >

    <label  for="psw"><b>Votre mot de passe</b></label>
    <input placeholder="Ex.1234xxxxx" id="psw" type="password">
    <hr>
    <button type="submit">s’inscrire avec un email</button>
  </div>

  <div class="container signin">
    <p> Vous avez déjà un compte ? <a href="./?action=login">continuer</a>.</p>
  </div>
</form>
</section>
<?php include('footer.php'); ?>
<script src="app/js/register.js">defer</script>


