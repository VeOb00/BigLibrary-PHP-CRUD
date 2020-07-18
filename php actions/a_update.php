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
    <link rel="stylesheet" href="../style/main.css">
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">BigLibrary</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-item nav-link" href="../index.php">Browse Content</a>
            </li>
            <li class="nav-item active">
                <a class="nav-item nav-link" href="../edit-index.php">Edit Content<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add media
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../add-media.php?media_type=book">Add Book</a>
                    <a class="dropdown-item" href="../add-media.php?media_type=audio">Add Audio</a>
                    <a class="dropdown-item" href="../add-media.php?media_type=video">Add Video</a>
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

<?php
require_once "db_connect.php";

/**
 * @param $parameter
 * @return mixed|null
 */
function getDatabaseCompatibleValue($parameter) {
    $value = $_POST[$parameter];
    if (isset($value) || $value != "") {
        $replaced_string = str_replace("'", "\'", $value);
        return "'$replaced_string'";
    }
    return "null";
}

if ($_POST) {
    $title = getDatabaseCompatibleValue("title");
    $subtitle = getDatabaseCompatibleValue("subtitle");
    $author_fn = getDatabaseCompatibleValue("author_fn");
    $author_ln = getDatabaseCompatibleValue("author_ln");
    $media_type = getDatabaseCompatibleValue("media_type");
    $description = getDatabaseCompatibleValue("description");
    $publisher = getDatabaseCompatibleValue("publisher");
    $publisher_address = getDatabaseCompatibleValue("publisher_address");
    $publisher_size = getDatabaseCompatibleValue("publisher_size");
    $date_published = getDatabaseCompatibleValue("date_published");

    $isbn13 = getDatabaseCompatibleValue("isbn13");
    $band_name = getDatabaseCompatibleValue("band_name");
    $stars = getDatabaseCompatibleValue("stars");

    if (isset($_POST["availability"])) {
        $availability = 1;
    } else {
        $availability = 0;
    }

    $id = $_POST['id'];

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] != UPLOAD_ERR_NO_FILE) {
        $basename = basename($_FILES["image"]["name"]);
        $uploaded_file_path = "../upload/" . $basename;
        move_uploaded_file($_FILES["image"]["tmp_name"], $uploaded_file_path);
        $sql = "UPDATE media 
                SET 
                    title = $title,
                    subtitle = $subtitle,
                    author_fn = $author_fn,
                    author_ln = $author_ln,
                    band_name = $band_name,
                    media_type = $media_type,
                    description = $description,
                    publisher = $publisher,
                    publisher_address = $publisher_address,
                    publisher_size = $publisher_size,
                    date_published = $date_published,
                    isbn13 = $isbn13,
                    stars = $stars,
                    availability = '$availability',
                    image = '$basename'
                WHERE
                    id = $id";
    } else {
        $sql = "UPDATE media 
                SET 
                    title = $title,
                    subtitle = $subtitle,
                    author_fn = $author_fn,
                    author_ln = $author_ln,
                    band_name = $band_name,
                    media_type = $media_type,
                    description = $description,
                    publisher = $publisher,
                    publisher_address = $publisher_address,
                    publisher_size = $publisher_size,
                    date_published = $date_published,
                    isbn13 = $isbn13,
                    stars = $stars,
                    availability = '$availability' 
                WHERE
                    id = $id";
    }
    if (mysqli_query($conn, $sql)) {
        echo "<div class=\"container\">
                <h3 class='text-success'>Entry successfully updated!</h3>
                <p>You are being redirected to the edit content page</p></div>";
        header("Refresh:3; url=../edit-index.php");
    } else {
        echo "<div class=\"container\"><h3 class='text-danger'>There has been an error, please try again later!</h3>
               <p>go back to <a href='../index.php'>homepage</a></p></div>";
    }
    $conn->close();
}

?>

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
