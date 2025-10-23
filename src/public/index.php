<?php
require_once __DIR__ . '/../domain/Note.php';
use Domain\Note;

$notes = [
    new Note(
        id: 1,
        title: "PHP Advanced abcdrefef",
        description: "Advanced PHP concepts and examples.",
        date: "2025-10-23",
        user: "Dario",
        subject: "WEB",
        grade: 1
    ),
    new Note(
        id: 2,
        title: "Betriebssysteme",
        description: "Einführung Ubuntu, VM installieren, etc.",
        date: "2025-10-23",
        user: "Ali",
        subject: "INFRA",
        grade: 1
    ),
    new Note(
        id: 3,
        title: "Function pointer",
        description: "Beispielapp mit hierarchischen Menüs",
        date: "2025-10-23",
        user: "Dario",
        subject: "PROZ",
        grade: 1
    ),
    new Note(
        id: 4,
        title: "SQL",
        description: null,
        date: "2025-10-22",
        user: "Ali",
        subject: "DBMG",
        grade: 1
    ),
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyShare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body data-bs-theme="dark">
    <?php include_once '../components/navbar.php'; ?>

    <div class="container mt-3">
        <div class="row">
            <?php foreach ($notes as $note): ?>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-3 d-flex justify-content-center">
                    <?php require '../components/note_card.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>