<?php
include 'vendor/functions.php';

if (isset($_GET['destination'])) {
    $destination = urldecode($_GET['destination']);
}

// Query SPARQL untuk mengambil data
$query = '
    SELECT DISTINCT ?name ?province ?description ?thumbnail ?category ?location ?built ?discovered ?subject
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

<div class="container-content">
    <div class="content">
        <?php 
        // Eksekusi query SPARQL
        $result = $sparql_jena->query($query);

        if ($result && count($result) > 0): // Periksa apakah ada hasil dari query ?>
            <?php foreach ($result as $row): ?>
                <?php 
                // Periksa apakah 'about' ada dan valid
                $aboutValue = '';
                if (isset($row->subject) && filter_var($row->subject, FILTER_VALIDATE_URL)) {
                    $aboutValue = basename(parse_url($row->subject, PHP_URL_PATH)); // Mendapatkan nama resource
                }

                // Query SPARQL untuk mendapatkan koordinat
                if ($aboutValue) {
                    $mapQuery = '
                    National_Monument_(Indonesia)
                    ';
                    $result2 = $sparqlDbPedia->query($mapQuery)->current();
                }

                // Menyiapkan data koordinat dengan default jika tidak ada
                if ($result2 && isset($result2->lat) && isset($result2->long)) {
                    $lat = $result2->lat;
                    $long = $result2->long;
                } else {
                    $lat = 0;  // Nilai default
                    $long = 0; // Nilai default
                }
                ?>
                <div class="card-content-img">
                    <img alt="<?= $destination; ?>" height="400" src="<?= $row->thumbnail; ?>" width="300"/>
                </div>
                <div class="card-content">
                    <div class="text-content">
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
                    <div class="card-content mt-10">
                        <div class="text-content">
                            <!-- Menampilkan lokasi pada peta -->
                            <div class="mt-4">
                                <?php if ($lat && $long): ?>
                                    <iframe width="100%" height="376.875px" style="border:0;" allowfullscreen="" 
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
                                            src="https://maps.google.com/maps?q=<?= $lat ?>,<?= $long ?>&hl=en&z=14&amp;output=embed">
                                    </iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <h2>No data found</h2>
        <?php endif; ?>
    </div>
</div>

<?php include 'include/footer.php'; ?>
