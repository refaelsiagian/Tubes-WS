<?php
    include 'vendor/functions.php';

    $query = '
        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
        PREFIX places: <https://example.org/schema/places>

        SELECT DISTINCT ?province (COUNT(?tour) AS ?placeCount)
        WHERE {
            ?tour places:province ?province .
        }
        GROUP BY ?province
        ORDER BY ASC(?province)
    ';

    $icons = [
        'fa-map-marker-alt',
        'fa-map-marked-alt',
        'fa-map-marker',
        'fa-map-signs',
        'fa-map',
        'fa-map-pin',
    ];
?>

<?php 
    $title = 'Provinces';
    include 'include/header.php'; 
?>

<div class="header-top">
    <div class="header-image"></div>
    <div class="text-header">
        <div class="center">
            <h1>FIND BY PROVINCES</h1>
        </div>
    </div>
</div>


<div class="container-provinsi">
    <div class="grid-prov">

        <?php try { $result = $sparql_jena->query($query);?>
            <?php if(count($result) > 0) : ?>

                <?php foreach($result as $row) : ?>
                    <a href="destinations.php?province=<?= urlencode($row->province) ?>">
                        <div class="card-prov">
                            <div class="card-icon"><i class="fas <?= $icons[array_rand($icons)] ?>"></i></div>
                            <div>
                                <div class="card-title"><?= $row->province; ?></div>
                                <div class="card-description">
                                    <?= $row->placeCount; ?> places are located in this province
                                </div>
                            </div>
                            <div class="card-arrow"><i class="fas fa-arrow-right"></i></div>
                        </div>
                    </a>
                <?php endforeach; ?>


            <?php else : ?>
                <h2>No province found</h2>
            <?php endif; ?>

        <?php } catch (Exception $e) { ?>
            <h2>Terjadi kesalahan: <?= $e->getMessage() ?></h2>
        <?php } ?>

    </div>
</div>

<?php include 'include/footer.php'; ?>