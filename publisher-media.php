<?php
include "php actions/db_connect.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BigLibrary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">BigLibrary</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-item nav-link" href="index.php">Browse Content<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="edit-index.php">Edit Content</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add media
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="add-media.php?media_type=book">Add Book</a>
                    <a class="dropdown-item" href="add-media.php?media_type=audio">Add Audio</a>
                    <a class="dropdown-item" href="add-media.php?media_type=video">Add Video</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link active" href="publishers.php">Publisher info</a>
            </li>
        </ul>
    </div>
</nav>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 mt-3">BigLibrary</h1>
        <p class="lead">Publishers.</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        $publisher = $_GET["publisher"];
        $sql = "SELECT * FROM media where publisher = '$publisher'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result -> fetch_assoc()) {
            $id = $row["id"];
            $title = $row["title"];
            $subtitle = $row["subtitle"];
            $author_fn = $row["author_fn"];
            $author_ln = $row["author_ln"];
            $band_name = $row["band_name"];
            $media_type = $row["media_type"];
            $description = $row["description"];
            $publisher = $row["publisher"];
            $publisher_address = $row["publisher_address"];
            $publisher_size = $row["publisher_size"];
            $date_published = $row["date_published"];
            $availability = $row["availability"];
            $image = $row["image"];
            $isbn13 = $row["isbn13"];
            $stars = $row["stars"];
            ?>
            <div class="col-md-6 col-xl-4 box card-group">
                <div class="mb-3 card shadow-sm rounded-0">
                    <img src="<?= "upload/" . $image ?>" class="card-img-top p-3 <?php if ($availability == 0) echo "not-available" ?>"
                         alt="<?= $title . " " . $subtitle ?> image">
                    <div class="card-body">
                        <?php if ($media_type == "book") : ?>
                            <img src="media/book.png" class="logo" alt="">
                        <?php endif; ?>
                        <?php if ($media_type == "audio") : ?>
                            <img src="media/audio.png" class="logo" alt="">
                        <?php endif; ?>
                        <?php if ($media_type == "video") : ?>
                            <img src="media/video.png" class="logo" alt="">
                        <?php endif; ?>
                        <hr>
                        <h3 class="card-title"><?= $title; ?></h3>
                        <h5><?= $subtitle ?></h5>
                        <hr>
                        <p><?php
                            if (isset($author_fn) && $media_type != "video") {
                                echo "Author: " . $author_fn . " " . $author_ln;
                            } else if  (isset($band_name)) {
                                echo "Artist: " . $band_name;
                            } else if ($media_type == "video") {
                                echo "Director: " . $author_fn . " " . $author_ln;
                            }
                            ?>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="moreinfo.php?id=<?= $id ?>">
                            <button class="btn btn-light btn-outline-secondary btn-sm">more info...</button>
                        </a>
                        <p class="mb-0">Currently
                            <span class="">
                                <?php
                                if ($availability == 1) {
                                    echo " available";
                                } else
                                    echo " not available"
                                ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<footer>
    <div class="container-fluid text-center bg-light border-muted border-top text-secondary mt-5">
        <h1 class="display-4 my-5">BigLibrary</h1>
        <p>vedrana &#169; CodeFactory 2020</p>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>