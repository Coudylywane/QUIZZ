<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <?php if (est_admin()):?>
            <li class="nav-item active">
                <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=admin&view=liste.question'?>">liste des questions <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=admin&view=liste.joueur'?>">Liste des joueurs </a>
            </li>
            <?php endif ?>
            <?php if (est_joueur()):?>
            <li class="nav-item">
                <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=joueurview=jeu'?>">Jeu </a>
            </li>
            <?php endif ?>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <?php if (est_connect()):?>
            <li class="nav-item active">
                <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=security&view=connextion'?>"> Deconnexion<span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <?php endif ?>
    </div>
</nav>