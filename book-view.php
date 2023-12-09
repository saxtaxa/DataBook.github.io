<?php
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Book View</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book View Details
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $ISBN = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM book WHERE ISBN = '$ISBN'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $book = mysqli_fetch_array($query_run);
                        ?>
                                    <div class="mb-3">
                                        <label>Title</label>
                                        <p class="form-control">
                                            <?= $book['title']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Price</label>
                                        <p class="form-control">
                                            <?= $book['price']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Author</label>
                                        <p class="form-control">
                                            <?= $book['author']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Publication Year</label>
                                        <p class="form-control">
                                            <?= $book['publication_year']; ?>
                                        </p>
                                    </div>
                        <?php
                            } else {
                                echo "<h4>Book not found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bootstrap bundle with popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>