```
study-share/
├── src/                # All PHP source code
│   ├── components/     # Shared UI components (header.php, footer.php, etc.)
│   ├── pages/          # Page-level views (home.php, login.php, profile.php)
│   ├── config/         # DB config, constants, environment setup
│   ├── lib/            # Helper functions or classes (auth.php, db.php, etc.)
│   └── public/         # Publicly accessible files (index.php, css/, images/)
│   └── domain/         # Business logic (User, Note, etc.)
│
├── migrations/         # SQL migration files to keep DB schema in sync
│   ├── 001-create-users.sql    # Example
│   └── 002-create-notes.sql
│
├── docs/               # Documentation (setup, deployment, project overview)
│   └── project-structure.md  # <-- You are here
│   └── setup/
│
├── tests/              # Unit tests
│
├── .gitignore
├── README.md

```