<?php
declare(strict_types=1);
function formatPrice(int $price): void
{
    $price = $price / 100;
    echo number_format($price, 2, ",", " ") . "€";
}

function priceExcludingVAT(int $prixTTC, int $TVA = 20): int
{
    return (int)($prixTTC / (1 + $TVA / 100));
}

function discountPrice(int $price, int $discount): int
{
    return (int)(($price * 100) / (100 + $discount));
}

function priceForWeight(int $price, int $weight, string $transporteur): int
{
    $price_for_weight = 0;
    switch ($transporteur) {
        case ("La poste"):
            if ($weight <= 500) {
                $price_for_weight = 500;
            } else if ($weight <= 2000) {
                $price_for_weight = $price * 10 / 100;
            }
            break;
        case ("Amazon"):
            if ($weight <= 500) {
                $price_for_weight = 500 - 1;
            } else if ($weight <= 2000) {
                $price_for_weight = $price * 10 / 100 - 1;
            }
            echo "On est moins cher que la poste ;)";
            break;
        case ("daron"):
            echo "Toi tu vas te bouger les fesses avant que je te colle mon 45 au cul --'";
            break;
        case ("Musk"):
            if ($weight <= 500) {
                $price_for_weight = 500 * 100;
            } else if ($weight <= 2000) {
                $price_for_weight = $price * 10;
            }
            break;
    }
    return (int)$price_for_weight;
}

function emptyCart(): void
{
    session_destroy();
}

function displayItem(Item $item): void
{
    ?>
    <div class="card col-4 me-3 ms-3 mb-3 mt-3" style="width: 15rem;">
        <img src="<?= $item->imageURL ?>" style="height: 200px; border-bottom: darkgrey 1px dotted;">
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="container">
                <h5 class="card-title"><?= $item->name ?></h5>

                <?php
                if ($item->discount !== null) {
                    ?>
                    <p>
                        <span style="text-decoration: line-through red;"><?php formatPrice($item->price) ?> </span>
                        TTC <strong>-<?= $item->discount ?>%</strong></p>
                    <p>Prix :
                        <strong><?php formatPrice(discountPrice($item->price, $item->discount)); ?></strong>
                    </p>
                    <?php
                } else { ?>
                    <p>Prix : <strong><?php formatPrice($item->price) ?></strong></p>
                    <?php
                } ?>
            </div>
            <div class="container">
                <form method="post">
                    <div class="container mb-3 ps-0 pe-0">
                        <label class="mb-1" for="quantity_purchased">Quantité : </label>
                        <input class="mb-3" type="number" name="quantity_purchased" min="0" value="0">
                        <input type="hidden" value="<?= $item->id ?>" name="id">
                        <input type="hidden" value="<?= $item->name ?>" name="name">
                        <input type="hidden" value="<?= $item->price ?>" name="price">
                        <input type="hidden" value="<?= $item->discount ?>" name="discount">
                        <input type="hidden" value="<?= $item->weight ?>" name="weight">
                        <input type="submit" class="btn btn-primary" value="Ajouter au panier">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}

function displayCatalogue(Catalogue $catalogue): void
{
    foreach ($catalogue->items as $item) {
        displayItem($item);
    }
}

function displayClientList(ClientList $list): void
{
    echo "<pre>";
    var_dump($list);
    echo "</pre>";
}