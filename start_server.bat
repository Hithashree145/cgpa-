@echo off
echo Starting PHP server for CGPA Calculator on http://localhost:8000...
echo Make sure XAMPP MySQL is running if you get database errors!
start http://localhost:8000
"C:\xampp\php\php.exe" -S localhost:8000
