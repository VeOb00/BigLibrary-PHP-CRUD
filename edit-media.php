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
                <a class="nav-item nav-link" href="index.php">Browse Content</a>
            </li>
            <li class="nav-item active">
                <a class="nav-item nav-link" href="edit-index.php">Edit Content<span class="sr-only">(current)</span></a>
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
        </ul>
    </div>
</nav>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 mt-3">BigLibrary<span class="font-italic small font-weight-light"> edit</span></h1>
        <p class="lead">Edit media entries.</p>
    </div>
</div>


<div class="container">
    <div class="row">
        <?php
        if ($_GET["id"]) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM media where id = $id";
        $result = mysqli_query($conn, $sql);

        $row = $result->fetch_assoc();
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

        <div class="col-md-4">
            <img class="mb-5" src="<?= "upload/" . $image ?>" alt="<?= $title . " " . $subtitle ?> image">
        </div>
        <div class="col-md-8">
            <h3 class=""><?= $title; ?></h3>
            <h5><?= $subtitle ?></h5>
            <hr>
            <dl>
                <?php
                if (isset($author_fn) && $media_type != "video") {
                    echo "<dt>Author: </dt> <dd>" . $author_fn . " " . $author_ln . "</dd>";
                } else if (isset($band_name) && $media_type != "video") {
                    echo "<dt>Artist: </dt> <dd>" . $band_name . "</dd>";
                } else if ($media_type == "video") {
                    echo "<dt>Director: </dt><dd>" . $author_fn . " " . $author_ln . "</dd>";
                }
                ?>
                <dt>Publisher:</dt>
                <dd><?= $publisher . ", <small class='text-secondary'><address>" . $publisher_address . "</address></small>" ?></dd>
                <dt>Publishing date:</dt>
                <dd><?= $date_published ?></dd>
                <dt>Availability:</dt>
                <dd>
                    <?php
                    if ($availability == 1) {
                        echo " available";
                    } else
                        echo " not available"
                    ?>
                </dd>
                <?php if (isset($stars) && $media_type == "video") echo "<dt>Stars: </dt><dd>" . $stars . "</dd>"; ?>
                <?php if (isset($isbn13) && $media_type == "book") echo "<dt>isbn-13: </dt><dd>" . $isbn13 . "</dd>"; ?>
            </dl>
            <hr>
            <p> <?= $description ?> </p>
        </div>

    </div>

    <hr>
    <h1>Edit data:</h1>

    <div class="row">
        <form action="php%20actions/a_update.php" class="col-md-8" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" , value="<?= $id ?>">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $title ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="subtitle">Subtitle:</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?= $subtitle ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <?php
                    if (isset($author_fn) && $media_type != "video") {
                        echo "<label for=\"author_fn\">Author first name:</label>
                                    <input type=\"text\" class=\"form-control\" id=\"author_fn\" name=\"author_fn\" value=\"$author_fn\" required>";
                    } else if (isset($band_name) && $media_type != "video") {
                        echo "<label for=\"band_name\">Band name:</label>
                                    <input type=\"text\" class=\"form-control\" id=\"band_name\" name=\"band_name\" value=\"$band_name\" required>";
                    } else if ($media_type == "video") {
                        echo "<label for=\"author_fn\">Director first name:</label>
                                    <input type=\"text\" class=\"form-control\" id=\"author_fn\" name=\"author_fn\" value=\"$author_fn\" required>";
                    }
                    ?>
                </div>
                <div class="col-md-6 mb-3">
                    <?php
                    if (isset($author_fn) && $media_type != "video") {
                        echo "<label for=\"author_ln\">Author last name:</label>
                                    <input type=\"text\" class=\"form-control\" id=\"author_ln\" name=\"author_ln\" value=\"$author_ln\" required>";
                    } else if ($media_type == "video") {
                        echo "<label for=\"$author_ln\">Director last name:</label>
                                    <input type=\"text\" class=\"form-control\" id=\"author_ln\" name=\"author_ln\" value=\"$author_ln\" required>";
                    }
                    ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="publisher">Publisher:</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" value="<?= $publisher ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="publisher_address">Publisher address:</label>
                    <input type="text" class="form-control" id="publisher_address" name="publisher_address"
                           value="<?= $publisher_address ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="date_published">Publishing date:</label>
                    <input type="date" class="form-control" name="date_published"
                           value="<?= $date_published ?>">
                </div>
                <?php
                if (isset($isbn13))
                    echo "
                    <div class=\"col-md-6 mb-3\">
                        <label for=\"isbn13\">isbn-13:</label>
                        <input type=\"text\" class=\"form-control\" name=\"isbn13\" value=\"$isbn13\">
                    </div>"
                ?>

            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="publisher_size">Publisher size:</label>
                    <select class="custom-select" id="publisher_size" name="publisher_size" required>
                        <option selected disabled>Choose...</option>
                        <option <?php if ($publisher_size == "big") : ?> selected <?php endif; ?> >big</option>
                        <option <?php if ($publisher_size == "medium") : ?> selected <?php endif; ?> >medium</option>
                        <option <?php if ($publisher_size == "small") : ?> selected <?php endif; ?> >small</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="media_type" >Media type:</label>
                    <select class="custom-select" id="media_type" name="media_type" disabled>
                        <option selected disabled >Choose...</option>
                        <option <?php if ($media_type == "book") : ?> selected <?php endif; ?> >book</option>
                        <option <?php if ($media_type == "audio") : ?> selected <?php endif; ?> >audio</option>
                        <option <?php if ($media_type == "video") : ?> selected <?php endif; ?> >video</option>
                    </select>
                </div>
                <input type="hidden" name="media_type" value="<?= $media_type ?>">
            </div>
            <?php
            if ($media_type == "video")
                echo "
                <div class=\"form-row\">
                    <div class=\"col-md-12 mb-3\">
                        <label for=\"stars\">Stars:</label>
                        <input type=\"text\" class=\"form-control\" name=\"stars\" value=\"$stars\"></input>
                        <p class='small'>(One line, separated by commas)</p>
                    </div>
                </div>";
            ?>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="description">Short description</label>
                    <!--                    <input type="text" class="form-control" id="description" name="description"-->
                    <!--                           value="--><? //= $description ?><!--">-->
                    <textarea class="form-control" id="description" rows="6"
                              name="description"><?php echo htmlspecialchars($description); ?></textarea>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-6 mb-3">
                    <label for="image">Upload image:</label>
                    <input type="file" id="image" name="image">
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="form-check">
                    <input <?php if ($availability == 1) : ?> checked <?php endif; ?> class="form-check-input"
                                                                                      type="checkbox" value="true"
                                                                                      id="availability"
                                                                                      name="availability">
                    <label class="form-check-label" for="available">
                        Available
                    </label>
                </div>
            </div>
            <input class="btn btn-success my-5" type="submit" value="Update">
        </form>
        <form action="delete-confirm.php" class="col-md-4 text-right mb-5" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input class="btn btn-danger" type="submit" value="Delete this entry">
        </form>
    </div>
    <?php } ?>
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