<?php

namespace domain;

class Note
{
    public int $id;
    public string $title;
    public ?string $description;
    public string $date;
    public string $user;
    public string $subject;
    public int $grade;

    public function __construct(int $id, string $title, ?string $description, string $date, string $user, string $subject, int $grade)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->user = $user;
        $this->subject = $subject;
        $this->grade = $grade;
    }
}