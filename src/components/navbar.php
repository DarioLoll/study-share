<?php

?>

<nav class="navbar navbar-expand-lg p-3">
    <div class="container-fluid">
        <a class="navbar-brand d-lg-none" href="#">
            <img src="/images/logo.svg" alt="Logo" width="35" class="d-inline-block align-text-top img-fluid">
            Study Share
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navItemContainer" aria-controls="navItemContainer" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row-cols-lg-3" id="navItemContainer">
            <ul class="navbar-nav col-lg order-lg-1">
                <a class="navbar-brand d-lg-block d-none" href="#">
                    <img src="/images/logo.svg" alt="Logo" width="35" class="d-inline-block align-text-top img-fluid">
                    Study Share
                </a>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Browse</a>
                </li>
            </ul>
            <ul class="navbar-nav col-lg order-lg-last d-lg-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign-in</a>
                </li>
            </ul>
            <form class="d-flex col-lg order-lg-2" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>