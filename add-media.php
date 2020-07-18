<?php
$media_type = $_GET["media_type"];
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
            <li class="nav-item">
                <a class="nav-item nav-link" href="edit-index.php">Edit Content</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add media<span class="sr-only">(current)</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="add-media.php?media_type=book">Add Book</a>
                    <a class="dropdown-item" href="add-media.php?media_type=audio">Add Audio</a>
                    <a class="dropdown-item" href="add-media.php?media_type=video">Add Video</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="publishers.php">Publisher info</a>
            </li>
        </ul>
    </div>
</nav>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 mt-3">BigLibrary<span class="font-italic small font-weight-light"> expand</span></h1>
        <p class="lead">Add new media content to the library database.</p>
    </div>
</div>


<div class="container">

    <div class="row">
        <form action="php%20actions/a_create.php" class="col-md-8" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="subtitle">Subtitle:</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="">
                    <small class="form-text text-muted">Optional</small>
                </div>
            </div>
            <?php if ($media_type == "book") : ?>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="title">Author first name:</label>
                        <input type="text" class="form-control" id="author_fn" name="author_fn" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="author_ln">Author last name:</label>
                        <input type="text" class="form-control" id="author_ln" name="author_ln" value="">
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($media_type == "video") : ?>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="title">Director first name:</label>
                        <input type="text" class="form-control" id="author_fn" name="author_fn" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="author_ln">Director last name:</label>
                        <input type="text" class="form-control" id="author_ln" name="author_ln" value="">
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($media_type == "audio") : ?>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="title">Artist first name:</label>
                        <input type="text" class="form-control" id="author_fn" name="author_fn" value="">
                        <small class="form-text text-muted">Please note, you can only fill out artist info or band info.</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="author_ln">Artist last name:</label>
                        <input type="text" class="form-control" id="author_ln" name="author_ln" value="">
                        <small class="form-text text-muted">Please note, you can only fill out artist info or band info.</small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="title">Band name:</label>
                        <input type="text" class="form-control" id="band_name" name="band_name" value="">
                        <small class="form-text text-muted">Please note, you can only fill out artist info or band info.</small>
                    </div>
                </div>
            <?php endif; ?>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="publisher">Publisher:</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" value="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="publisher_address">Publisher address:</label>
                    <input type="text" class="form-control" id="publisher_address" name="publisher_address"
                           value="">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="date_published">Publishing date:</label>
                    <input type="date" class="form-control" name="date_published"
                           value="">
                </div>
                <?php if ($media_type == "book") : ?>
                    <div class="col-md-6 mb-3">
                        <label for="isbn13">ISBN-13:</label>
                        <input type="text" class="form-control" name="isbn13" value="" placeholder="978-0062641540" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                        <small class="form-text text-muted">Format requested: 978-0062641540</small>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="publisher_size">Publisher size:</label>
                    <select class="custom-select" id="publisher_size" name="publisher_size" required>
                        <option selected disabled>Choose...</option>
                        <option>big</option>
                        <option>medium</option>
                        <option>small</option>
                    </select>
                </div>
                <input type="hidden" name="media_type" value="<?= $media_type ?>">
            </div>

            <?php if ($media_type == "video") : ?>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="stars">Stars:</label>
                        <input type="text" class="form-control" name="stars" value=""></input>
                        <small class="form-text text-muted">Please note, multiple stars are filled out in single line separated by commas.</small>
                    </div>
                </div>
            <?php endif; ?>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="description">Short description</label>
                    <textarea class="form-control" id="description" rows="6" name="description"></textarea>
                    <small class="form-text text-muted">Optional</small>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-6 mb-3">
                    <label for="image">Upload image:</label>
                    <input type="file" id="image" name="image">
                    <small class="form-text text-muted">Optional</small>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox" value="true"
                           id="availability"
                           name="availability">
                    <label class="form-check-label" for="available">
                        Available
                    </label>
                </div>
            </div>
            <input class="btn btn-success my-5" type="submit" value="Add new entry">
        </form>
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