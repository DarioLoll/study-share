This guide explains how to set up this project on windows locally using XAMPP.
For MacOS setup, see [mamp-macos.md](mamp-macos.md)
For Linux setup, see [apache-linux.md](apache-linux.md)
For setting up hosting with your custom domain, see [hosting-linux.md](hosting-linux.md)

---
## 1. Install XAMPP

1. Download XAMPP for Windows from [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)
2. Run the downloaded `.exe` installer and complete the setup wizard.
    - Default install location: `C:\xampp`
3. After installation, launch the XAMPP Control Panel.
4. Start both ****Apache**** and ****MySQL**** by clicking "Start" next to each in the control panel.
5. Open `http://localhost/` in your browser. You should see the XAMPP welcome page. If not, verify that the services are running.

---
## 2. Clone the Repo

```bash
# Navigate to the XAMPP web root
cd C:\xampp\htdocs 

# Clone via HTTPS
git clone https://github.com/DarioLoll/study-share.git

# OR
# Clone via SSH
git clone git@github.com:DarioLoll/study-share.git
```

---
## 3. Configure Apache Document Root

1. In the XAMPP Control Panel, next to Apache, click ****Config**** > ****Apache (httpd.conf)****.
2. Find these lines (use Ctrl+F):
```
DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">
```
3. Change both to point to the project's `public` folder:
```
DocumentRoot "C:/xampp/htdocs/study-share/src/public"

<Directory "C:/xampp/htdocs/study-share/src/public">
```
4. Save the file and close your editor.
5. Restart Apache from the XAMPP Control Panel for changes to take effect.

---
## 4. Create the Database

1. In the XAMPP Control Panel, click ****Admin**** next to MySQL to open phpMyAdmin, or go to `http://localhost/phpmyadmin/` in your browser.
2. Click the ****Databases**** tab.
3. Under "Create database", enter the name `study_share` and click Create.

---
## 5. Import/Migrate the Database

Do the following to ensure your newly created database has the correct schema:

****TODO****

---
## 6. Connect PHP to MariaDB

1. Navigate to `src/config/`
2. Create a copy of the file `config.example.php` and name it `config.php`
```bash
copy config.example.php config.php
```
3. Open `config.php` and edit as needed:
    - Common defaults for XAMPP on Windows:
```php
<?php
return [
    'host'    => 'localhost',
    'port'    => 3306,           // default for XAMPP
    'db'      => 'study_share',
    'user'    => 'root',         // root is default for XAMPP
    'pass'    => '',             // blank password by default
    'charset' => 'utf8mb4',
];
```
  You can check the MySQL port in the XAMPP Control Panel, under "Config" > "my.ini".

---
## 8. Test

Open `http://localhost/` in your browser.

--- 
## 9. Set up Visual Studio Code

See [this guide](vscode.md) for setting up html/css/php intellisense and hot reload with vscode
