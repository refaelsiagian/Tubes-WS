<?php
    include 'vendor/functions.php';

    $filter = '';
    $title = 'DESTINATIONS';

    if (isset($_GET['province'])) {
        $filter = 'FILTER(?province = "' . urldecode($_GET['province']) . '")';
        $title = $_GET['province'];
    } elseif (isset($_GET['category'])) {
        $filter = 'FILTER(?category = "' . $_GET['category'] . '")';
        $title = $_GET['category'];
    } elseif (isset($_GET['keyword'])) {
        $keyword = urldecode($_GET['keyword']);
        $filter = '
            FILTER (
                CONTAINS(LCASE(?name), LCASE("' . $keyword . '")) ||
                CONTAINS(LCASE(?province), LCASE("' . $keyword . '")) ||
                CONTAINS(LCASE(?category), LCASE("' . $keyword . '")) ||
                CONTAINS(LCASE(?location), LCASE("' . $keyword . '"))
            )
        ';
        $title = "Search: " . $_GET['keyword'];
    }

    $query = '
        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
        PREFIX places: <https://example.org/schema/places>

        SELECT ?name ?province ?description ?thumbnail ?category ?location
        WHERE {
            ?subject rdfs:name ?name.
            ?subject places:province ?province.
            ?subject places:description ?description.
            ?subject places:thumbnail ?thumbnail.
            ?subject places:category ?category.
            ?subject places:location ?location.
            ' . $filter . '
        }
    ';

    include 'include/header.php'; 
?>

<div class="header-top">
    <div class="header-image"></div>
    <div class="text-header">
        <div class="center">
            <h1><?= $title ?></h1>
        </div>
    </div>
</div>

<div class="container row">

    <?php try { $result = $sparql_jena->query($query);?>
        <?php if(count($result) > 0) : ?>

            <?php foreach($result as $row) : ?>
                <div class="card column column-medium column-large">
                    <div class="card__thumbnail">
                        <img class="card__thumbnail-image" src="<?= $row->thumbnail ?>" alt="Setrojenar Beach Photo">
                        <div class="card__header">
                            <h3 class="card__header-title"><?= $row->name ?></h3>
                            <p class="card__header-subtitle"><?= $row->province ?></p>
                            <p class="card__header-subtitle"><?= $row->category ?></p>
                        </div>
                    </div>
                    <div class="card__content">
                        <p class="card__description">
                            <?= limitWords($row->description, 15) ?>
                        </p>
                        <a href="detail.php?destination=<?= urlencode($row->name) ?>" class="card__action">Selengkapnya</a>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php else : ?>
            <div class="no-data">
            <img src="assets/image/not-found.png" alt="no-data">
            <h2>OOPS!</h2>
            <p>Data not found</p>
            </div>
        <?php endif; ?>

    <?php } catch (Exception $e) { ?>
        <h2>Terjadi kesalahan: <?= $e->getMessage() ?></h2>
    <?php } ?>

</div>

<?php include 'include/footer.php'; ?>
