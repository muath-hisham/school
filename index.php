<?php
include 'shared/header.php';
if (isset($_SESSION['admin']) || isset($_SESSION['teacher'])) {
    include 'shared/nav.php';
} else { ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">School System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/amit/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="/amit/admin/login.php" method="GET">
            <button type="submit" name="login" class="btn btn-outline-success">log in</button>
        </form>
    </nav>
<?php } ?>

<h1 class="text text-center text-primary display-4">Home page</h1>

<?php
include 'shared/script.php';
?>