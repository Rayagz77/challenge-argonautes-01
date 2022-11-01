<?php

//on se connecte à la bdd 
require "connect.php";

//Allons récupérerles information de la bdd

//Definition du titre
$titre = "Accueil";

//Inclusion du header
include "includes/header.php";

require_once "ajout.php";
require "read.php";
require('close.php');
//On deternine la page sur laquelle on se trouve

?>

<!-- Main section -->
<main class="content">
    <div class="new-member">
        <!-- New member form -->
        <h2 class="ajout_argonaute">Ajouter un(e) Argonaute</h2>
        <form class="new-member-form" method="post" action="ajout.php">
            <label for="name"></label>
            <input class="form-control" id="name" name="name" type="text" placeholder="Exemple: Charalampos" />
            <label for="name"></label>
            <input class="form-control" id="description" name="description" type="text"
                placeholder="Exemple: Audacieux" />
            <button class="button" type="submit">Ajouter</button>
        </form>
        <!--EO .new-member-form-->

    </div>

    <!-- Member list -->
    <h2 class="membres_equipage">Membres de l'équipage</h2>
    <section class="member-list">

        <table class="table">
            <thead>
                <tr>
                    <th scope=" col">Identifiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Qualificatif</th>
                </tr>
            </thead>
            <?php foreach ($argonautes as $argonaute) : ?>

            <tbody>
                <tr>
                    <td>
                        <div class="member-item"><?= $argonaute["id"] ?></div>
                    </td>
                    <td>
                        <div class="member-item"><?= $argonaute["name"] ?></div>
                    </td>
                    <td>
                        <div class="member-item"><?= $argonaute["description"] ?></div>
                    </td>
                </tr>
            </tbody>
            <!--EO tbody -->


            <?php
            endforeach; ?>
        </table>
        <!--EO table -->

    </section>
    <!--EO .member-list -->

    <section class="pagination-section">

        <div>

            <nav>
                <ul class="pagination">

                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="" class=" page-link">Précédente</a>
                    </li>

                    <?php for ($page = 1; $page <= $pages; $page++) : ?>
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href=" ./?page=<?= $page ?>" class=" page-link"><?= $page ?></a>
                    </li>
                    <?php endfor ?>

                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="" class=" page-link">Suivante</a>
                    </li>

                </ul>
            </nav>
        </div>

    </section>



</main>
<!--EO main -->

<?php

//Inclusion du footer
include "includes/footer.php ";