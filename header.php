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
                <?php
                if (count($_SESSION) != 0){ ?>
                    <a class="btn btn-primary" href="cart.php">Panier (<?= count($_SESSION)?>)</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="cart.php">Panier</a>
                <?php }
                ?>

            </div>
            <form method="post">
                <input  class="btn btn-light" type="submit" name="emptyCart" value="Vider le panier">
            </form>
        </div>
    </nav>
</header>