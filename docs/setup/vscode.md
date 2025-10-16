This guide explains how to set up Visual Studio Code as the code editor for this project. Including HTML, CSS and PHP intellisense and hot reload support.

---
## 1. Install Visual Studio Code

Follow the installation instructions on [https://code.visualstudio.com/](https://code.visualstudio.com/)

---
## 2. Configure the HTML CSS Support extension

1. Open the Extensions tab in vscode on the left sidebar (or under View --> Extensions)
2. Search for "HTML CSS Support" and install the extension by "ecmel"
3. Click on the settings/cog icon and select "Settings"
4. Click on "Edit in settings.json"
5. Add `php` to `css.enabledLanguages`:
```json
...
"css.enabledLanguages": [
	"php",
	"html"
],
...
```
6. For bootstrap support, you need to include the same CDN link as in the `<head>`in the `index.php`. So add the following to the same `settings.json` (Change the link if necessary)
```json
"css.styleSheets": [
	"https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
],
```

---
## 3. Install other helpful extensions

Add other extensions of your choice. Here are some recommended ones:
1. PHP Intelephense by Ben Mewburn
2. PHP Debug by Xdebug
3. Path Intellisense by Christian Kohler
4. Prettier - Code formatter
5. htmltagwrap by Brad Gashler

---
# Set up hot reload

For hot reload (having the page automatically refresh after changing the code and saving), we will be using a tool called browser-sync. 

---
## 1. Install Node.js

Node.js is required for browser-sync. Install it [here](https://nodejs.org/en/download)
- After installing, check if it is installed with:
```bash
node -v
npm -v
```

---
## 2. Install browser-sync

```bash
npm install -g browser-sync
```
Check installation with:
```bash
browser-sync --version
```

---
## 3.  Start browser-sync

Now, after starting the apache server (e.g. in XAMPP or MAMP), navigate to the project directory:
```bash
# MacOS (MAMP)
cd /Applications/MAMP/htdocs/study-share


# Linux (Apache)
cd /var/www/html/study-share
```
```powershell
# Windows (XAMMP)
cd C:\xampp\htdocs\study-share
```

Start browser-sync:
```bash
# Adjust the port number (80), usually 8888 for MAMP
browser-sync start --proxy "localhost:80" --files "src/**/*.php"
```
`--proxy` → points to your MAMP server
`--files` → watches all PHP files under src/.

BrowserSync should automatically open the website in the browser and will give you a URL (usually http://localhost:3000) that you can open in the browser manually. Now changes in PHP files will automatically reload the page.