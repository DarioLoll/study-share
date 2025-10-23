
<?php
    /* @var \domain\Note $note */
?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
            <span class="badge text-bg-secondary mb-2">
                <?= $note->subject ?>
            </span>
        <span class="badge text-bg-secondary mb-2">
                <?= $note->grade ?>
            </span>
        <h3 class="card-title">
            <?= $note->title ?>
        </h3>
        <small class="text-body-secondary">
            <?= $note->user . " - " . $note->date ?>
        </small>
        <p class="card-text">
            <?= $note->description ?>
        </p>
    </div>
    <div class="card-footer">
        <a href="#" class="btn btn-primary">Download</a>
    </div>
</div>


