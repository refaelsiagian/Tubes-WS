<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/card.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
</head>

<body>
    <nav>
        <div class="nav__header">
            <div class="nav__logo">
                <a href="#" class="logo">HISTORIA</a>
            </div>
            <div class="nav__menu__btn" id="menu-btn">
                <i class="ri-menu-line"></i>
            </div>
        </div> 
        <ul class="nav__links" id="nav-links">
            <li><a href="index.php">HOME</a></li>
            <li><a href="destinations.php">DESTINATIONS</a></li>
            <li><a href="categories.php">CATEGORIES</a></li>
            <li><a href="provinces.php">PROVINCES</a></li>
        </ul>
        <div class="search-container">
            <form action="destinations.php" method="GET">
                <input type="text" class="search-input" name="keyword" placeholder="Search...">
                <button type="submit">
                    <div class="search-icon">
                        <i class="fas fa-search"></i>
                    </div>
                </button>
            </form>
        </div>
    </nav>

<!-- Lanjut ke Main -->
    