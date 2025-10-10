This guide explains how to set up this project on linux (specifically ubuntu) with apache (and mariadb) locally. 
For MacOS setup, see [mamp-macos.md](mamp-macos.md)
For Windows setup, see [xammp-windows.md](xammp-windows.md)
For setting up hosting with your custom domain, see [hosting-linux.md](hosting-linux.md)

---
## 1. Install Apache

```bash
sudo apt update
sudo apt upgrade -y

sudo apt install apache2 -y

# Check if it is running
sudo systemctl status apache2
```
Test if you see the apache default page in your browser on `http://localhost/`

---
## 2. Install PHP with modules

```bash
sudo apt install php libapache2-mod-php php-mysql php-cli php-curl php-xml php-mbstring -y

# Test PHP
php -v
```
### Test PHP integration on apache:
```bash
# Create a test PHP file:
sudo nano /var/www/html/info.php
```
Add `<?php phpinfo(); ?>`to the php file
Visit `http://localhost/info.php`

---
## 3. Install MariaDB

```bash
sudo apt install mariadb-server mariadb-client -y

# Secure the installation:
sudo mysql_secure_installation
```
Follow prompts:
- Set root password
- Remove anonymous users
- Disallow remote root login
- Remove test database

Test
```bash
sudo mysql -u root -p
```

---
## 4. Clone the repo

Clone the repo into the `/var/www/html/` directory
```bash
cd /var/www/html/

# Via HTTPS
git clone https://github.com/DarioLoll/study-share.git

# Via SSH
git clone git@github.com:DarioLoll/study-share.git
```

---
## 5. Configure Apache

Give Apache read, write and execute rights:
```bash
sudo chown -R $USER:www-data /var/www/html/study-share
sudo chmod -R 775 /var/www/html/study-share
sudo chmod g+s /var/www/html/study-share
```

Set Apache's document root to `src/public`
```bash
# Open the config file
sudo nano /etc/apache2/sites-available/000-default.conf
```

Change the `DocumentRoot`line and add the `<Directory>` tag below
```bash
DocumentRoot "/var/www/html/study-share/src/public"
# Apache denies access by default to directories outside /var/www/html
<Directory "/var/www/html/study-share/src/public">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Reload the config
```bash
sudo systemctl reload apache2
```

Test in the browser: `http://localhost/`

---
## 6. Import database

**TODO**
