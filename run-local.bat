@echo off
REM TFA6 POS - one-click local setup and run (Windows / XAMPP)
REM Installs dependencies, creates .env, generates the app key, then starts the Artisan dev server.

cd /d "%~dp0"

where php >nul 2>nul
if errorlevel 1 (
    if exist "C:\xampp\php\php.exe" (
        set "PATH=C:\xampp\php;%PATH%"
    ) else (
        echo PHP was not found. Install XAMPP or add PHP to your PATH.
        pause
        exit /b 1
    )
)

if not exist "vendor\autoload.php" (
    where composer >nul 2>nul
    if errorlevel 1 (
        echo Composer was not found. Install it from https://getcomposer.org/download/ then run this file again.
        pause
        exit /b 1
    )
    echo Installing dependencies with Composer...
    call composer install --no-interaction
    if errorlevel 1 (
        echo composer install failed.
        pause
        exit /b 1
    )
)

if not exist ".env" (
    copy ".env.example" ".env" >nul
    echo Created .env from .env.example
)

findstr /r /c:"^APP_KEY=base64:" ".env" >nul
if errorlevel 1 php artisan key:generate --ansi

php artisan --version
php artisan route:list --except-vendor
echo.
echo Open http://127.0.0.1:8000 in your browser. Press Ctrl+C to stop the server.
php artisan serve
pause
