
  <?php include('header.php'); ?>
  <section id="allSection">
  <form id="FormLogin">
    <div class="container">
      <h1> Connexion à mon compte utilisateur</h1>

      <hr>
      <label for="uname"><b>Votre E-mail</b></label>
      <input type="text" placeholder="Ex.kevin@gmail.com" id="uname" name="uname" >

      <label for="psw"><b>Votre mot de passe</b></label>
      <input type="password" placeholder="Ex.1234xxxxx" id="psw" name="psw" >

      <button type="submit">continuer</button>

    </div>
    <div class="container signin">
      <p>Vous avez déjà un compte ? <a href="./?action=register">s’inscrire avec un email</a>.</p>
    </div>
  </form>
  </section>
  <?php include('footer.php'); ?>
  <script src="app/js/login.js">defer</script>

  </section>
 