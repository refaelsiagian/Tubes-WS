<?php
    include 'vendor/functions.php';

    if (isset($_GET['destination'])) {
        $destination = urldecode($_GET['destination']);
    }

    $query = '
        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
        PREFIX places: <https://example.org/schema/places>

        SELECT ?name ?province ?description ?thumbnail ?category ?location ?built ?discovered
        WHERE {
            ?subject rdfs:name ?name.
            ?subject places:province ?province.
            ?subject places:description ?description.
            ?subject places:thumbnail ?thumbnail.
            ?subject places:category ?category.
            ?subject places:location ?location.
            ?subject places:built ?built.
            ?subject places:discovered ?discovered.
            FILTER(?name = "'.$destination.'")
        }
    ';

?>

<?php 
    $title = $destination;
    include 'include/header.php';
?>

<div class="header-top">
    <div class="header-image"></div>
       <div class="text-header">
          <div class="center">
             <h1><?= $title; ?></h1>
          </div>
        </div>  
    </div>
</div>

<div class="container-content">
    <div class="content">
        <?php try { $result = $sparql_jena->query($query);?>
            <?php if(count($result) > 0) : ?>

                <?php foreach($result as $row) : ?>
                    <div class="card-content-img">
                        <img alt="<?= $destination; ?>" height="400" src="<?= $row->thumbnail; ?>" width="300"/>
                    </div>
                    <div class="card-content">
                        <div class="text-content">
                            <!-- <h3>Tempat Ibadah</h3> -->
                            <h2><?= $row->name; ?></h2>
                            <p><?= $row->description; ?></p>
                        </div>
                        <table class="info-table">
                            <tr>
                                <th>Ditemukan</th>
                                <td><?= $row->discovered; ?></td>
                            </tr>
                            <tr>
                                <th>Didirikan</th>
                                <td><?= $row->built; ?></td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td><?= $row->location; ?></td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td><?= $row->province; ?></td>
                            </tr>
                        </table>
                    </div>
                <?php endforeach; ?>

            <?php else : ?>
                <h2>No data found</h2>
            <?php endif; ?>

        <?php } catch (Exception $e) { ?>
            <h2>Terjadi kesalahan: <?= $e->getMessage() ?></h2>
        <?php } ?>

    </div>
</div>

<?php include 'include/footer.php'; ?>
