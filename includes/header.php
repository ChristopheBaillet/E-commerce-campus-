<header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Projet-Campus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="btn btn-primary" href="pages/cart.php">Panier (<?= count($_SESSION)?>)</a>
            </div>
            <a class="btn btn-secondary" href="pages/admin.php">Admin</a>
            <a class="btn btn-light" href="pages/destroy_session.php">Vider le panier</a>
        </div>
    </nav>
</header>