This file explains how to set up this project on linux (specifically ubuntu) with apache (and mariadb) locally. 
There are also additional optional steps below for setting up hosting on a custom domain through a cloudflare tunnel (with the apache still running on your linux server 24/7).

# Set up locally

## 1. Install Apache
```bash
sudo apt update
sudo apt upgrade -y

sudo apt install apache2 -y

# Check if it is running
sudo systemctl status apache2
```

Test if you see the apache default page in your browser on `http://localhost/`

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

## 4. Install MariaDB
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

## 6. Clone the repo
```bash
# Via HTTPS
git clone https://github.com/DarioLoll/study-share.git

# Via SSH
git clone git@github.com:DarioLoll/study-share.git
```

## 7. Configure Apache

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

## 8. Import database

**TODO**

---
# Set up hosting

## 1. Acquire a domain

If you don't have a domain already you can buy one on [NameCheap](https://www.nemacheap.com) for as little as 1$ per year

## 2. Create a Cloudflare account

Go to [Cloudflare](www.cloudflare.com) and sign up

## 3. Add your domain to Cloudflare

1. On the left, open the dropdown **Domain registration**
2. Select **Transfer domains**
3. Click on **Add domain** and enter your domain, click Continue
4. Select free plan
5. Follow the steps on cloudflare (add the two nameservers from Cloudflare to your DNS provider, e.g. NameCheap)
6. Wait for a few minutes - hours

## 4.  Install cloudflared

```bash
# fetch latest package (amd64)
wget -q https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb

# install
sudo dpkg -i cloudflared-linux-amd64.deb
# Install missing dependencies
sudo apt-get install -f -y
```

## 5. Authenticate cloudflared

```bash
cloudflared tunnel login
```
This opens a browser window asking you to log in to Cloudflare and authorize cloudflared. It will create credentials under `~/.cloudflared/`

## 6. Create a named tunnel

```bash
cloudflared tunnel create study-share-tunnel
```
This prints a tunnel UUID and writes a credentials JSON file into `~/.cloudflared/`. Keep that file private.
If you name the tunnel something other than `study-share-tunnel`, you will also have to use that name in the next steps.

## 7.  Create a config.yml

Create `~/.cloudflared/config.yml`:
Replace the tunnel uuid and youruser (and hostname with your domain)
```yaml
tunnel: <TUNNEL-UUID> # the UUID printed by `tunnel create`
credentials-file: /home/youruser/.cloudflared/<TUNNEL-UUID>.json

ingress:
  - hostname: study-share.site
    service: http://localhost:80

  # optional: redirect root to hostname or return 404 for unknown hosts
  - service: http_status:404
```

## 8. Map DNS record to tunnel

```bash
cloudflared tunnel route dns study-share-tunnel study-share.site
```

## 9. Test the tunnel

Run the following command and replace "youruser"
```bash
cloudflared tunnel run--config /home/youruser/.cloudflared/config.yml study-share-tunnel
```
Visit the domain you registered in the browser (e.g. `https://study-share.site`)

## 10. Set up auto-start

Create `/etc/systemd/system/cloudflared.service`:
Replace youruser
```ini
[Unit]
Description=Cloudflare Tunnel for study-share.site
After=network-online.target
Wants=network-online.target

[Service]
Type=simple
User=youruser
ExecStart=/usr/local/bin/cloudflared tunnel --config /home/youruser/.cloudflared/config.yml run study-share-tunnel
Restart=on-failure
User=youruser
WorkingDirectory=/home/youruser

[Install]
WantedBy=multi-user.target
```

Enable and start the service:

```bash
sudo systemctl daemon-reload
sudo systemctl enable cloudflared
sudo systemctl start cloudflared
sudo systemctl status cloudflared
```

**You're done!**
