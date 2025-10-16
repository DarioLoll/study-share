This guide explains how to set up this project on macOS locally using MAMP.
For Windows setup, see [xampp-windows.md](xampp-windows.md)
For Linux setup, see [apache-linux.md](apache-linux.md)
For setting up hosting with your custom domain, see [hosting-linux.md](hosting-linux.md)

---
## 1. Install MAMP

1. Download MAMP from [https://www.mamp.info/en/downloads/](https://www.mamp.info/en/downloads/)
2. Drag MAMP into your Applications folder
3. Launch the app, click on start in the top-right corner. 
A browser window should open displaying a welcome message. If not, open `http://localhost:8888/`manually in your browser to see if it works.
You can also change the port in the `Preferences`window

---
## 2. Clone the repo

```bash
# This is where you should clone your repo into
cd /Applications/MAMP/htdocs

# Clone via HTTPS
git clone https://github.com/DarioLoll/study-share.git

# OR
# Clone via SSH
git clone git@github.com:DarioLoll/study-share.git
```

---
## 3. Configure Apache

1. In the MAMP app, click on `Preferences`in the top-left corner.
2. Select the `Server` tab at the top.
3. For the `Document Root`setting, click on `Choose...`
4. Select the folder `public`folder at: `study-share/src/public` and click `Choose`
5. Click on `OK`

--- 
## 4. Create the database

1. In the MAMP app, click `WebStart` page
2. In the browser window, click on `Tools → phpMyAdmin` at the top
3. Go to `Databases` 
4. under "Create database" enter the name `study_share`and click `Create`

--- 
## 5. Import/migrate the database

Do the following to make sure the database you created has the correct schema:
**TODO**

---
## 6. Connect PHP to MariaDB

Navigate to `src/config/`
Create a copy of the file `config.example.php` and name it `config.php`
```bash
cp config.example.php config.php
```

Open `config.php` and change the variables as needed:
You can check the MySQL port under `Preferences -> Ports`
```php
<?php
return [
	'host'    => 'localhost',
	'port'    => 8889,           // might need to change (usually 8889 for MAMP)
	'db'      => 'study_share',
	'user'    => 'root',         // root is default for MAMP
	'pass'    => 'root',         // root is default for MAMP
	'charset' => 'utf8mb4',
];
```

--- 
## 7. Test

Open `http://localhost:8888/` in the browser

---
## 8. Set up Visual Studio Code

See [this guide](vscode.md) for setting up html/css/php intellisense and hot reload with vscode