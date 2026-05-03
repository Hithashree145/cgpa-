# 🚀 Deployment Guide: Getting Your Constant URL

Follow these steps to move your CGPA Calculator to the internet.

## 1. Export Your Local Database
Run this command in your terminal/command prompt to save your current data:
```powershell
C:\xampp\mysql\bin\mysqldump.exe -u root cgpa_calculator > cgpa_calculator_backup.sql
```
*This will create a file named `cgpa_calculator_backup.sql` in your project folder.*

## 2. Setup InfinityFree
1. Go to [InfinityFree](https://infinityfree.com/) and create a free account.
2. Create a "Hosting Account".
3. Choose a **Subdomain** (e.g., `hitha-cgpa.infinityfreeapp.com`). This will be your **Constant URL**.
4. Once created, go to the **Control Panel**.

## 3. Create the Database Online
1. In the Control Panel, look for **MySQL Databases**.
2. Create a new database (e.g., `cgpa_db`).
3. Note down the following details from that page:
   - **MySQL Hostname** (e.g., `sql205.epizy.com`)
   - **MySQL Username** (e.g., `epiz_31234567`)
   - **MySQL Password** (Click "Show/Hide")
   - **MySQL Database Name** (e.g., `epiz_31234567_cgpa_db`)

## 4. Import Your Data
1. Open **phpMyAdmin** from the Control Panel for your new database.
2. Click the **Import** tab.
3. Choose the `cgpa_calculator_backup.sql` file you created in Step 1.
4. Click **Go**.

## 5. Upload Your Code
1. Open the **Online File Manager**.
2. Go into the `htdocs` folder.
3. Upload all files from your local `c:\xampp\htdocs\cgpa\` folder into `htdocs`.
   *Tip: Use an FTP client like FileZilla if you have many files.*

## 6. Update Online Config
1. In the Online File Manager, edit `config/database.php`.
2. Update the `else` section with the details from **Step 3**:
```php
} else {
    define('DB_HOST', 'sql205.epizy.com'); // Put your MySQL Hostname here
    define('DB_USER', 'epiz_31234567');     // Put your MySQL Username here
    define('DB_PASS', 'your_password');     // Put your MySQL Password here
    define('DB_NAME', 'epiz_31234567_db');   // Put your MySQL Database Name here
}
```

## ✅ Done!
Your website should now be live at the URL you chose in Step 2!
