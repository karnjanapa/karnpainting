<?php

include ('head.php');
// var_dump($_SESSION);
?>

<nav>

  <div class="wrapper">
    <a href="./?action=default">
      <img id="logo" class="logo" src="public/photos/logo.png" alt="www.karnpainting.com">
    </a>

    <ul class="nav-links">
      <!-- Accueil admin news API Livre d'or Oeuvres d'art Contact Inscription -->
      <!-- Livre d'or   -->
      <li><a href="./?action=default">Accueil</a></li>
      <?php if ($_SESSION && (int) $_SESSION['is_admin'] == 15) { ?>
        <li><a href="./?action=admin">admin</a></li>
      <?php } ?>
      <li><a href="./?action=articlesNew">Actualités</a></li>
      <li><a href="./?action=api">Musées</a></li>
      <?php if ($_SESSION && (int) $_SESSION['is_admin'] == 0) { ?>
        <li><a href="./?action=guestBook">Commentaires</a></li>
      <?php } ?>
      
      <li>
        <a href="./?action=default" class="desktop-item">Arts</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="mobile-item">Arts</label>
        <ul class="drop-menu">
          <li><a href="./?action=abstract">Abstraits</a></li>
          <li><a href="./?action=pasage">Pasages</a></li>
          <li><a href="./?action=flower">Fleur</a></li>
          <li><a href="./?action=underWater">Sous marins</a></li>
        </ul>
      </li>

      <li><a href="./?action=contact">Contact</a></li>
      <li>
        <a href="./?action=default" class="desktop-item">Inscription</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="mobile-item">Inscription</label>
        <ul class="drop-menu">
          <?php if ($_SESSION) { ?>
            <li><a href="./?action=logout">Se déconnecter </a></li>
          <?php } else { ?>
            <li><a href="./?action=register">S'inscrire</a></li>
            <li><a href="./?action=login">Se connecter</a></li>
          <?php } ?>
          <?php if ($_SESSION && (int) $_SESSION['is_admin'] == 0) { ?>
            <li><a href="./?action=deleteUser">Supprimer </a></li>
      <?php } ?>
         
        </ul>
      </li>
    </ul>

  </div>
</nav>
