<?php

?>

<div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="card">
        <div class="card-body d-flex flex-column align-items-center">
            <h1 class="mb-3">Login</h1>
            <form action="./login-page.php" method="post" class="d-flex flex-column">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
