@echo off
REM Script para iniciar el servidor de desarrollo de React en Windows

echo.
echo ========================================
echo Genesis React Development Server
echo ========================================
echo.

REM Verificar si node está instalado
node --version >nul 2>&1
if %errorlevel% neq 0 (
    echo Error: Node.js no está instalado o no está en el PATH
    pause
    exit /b 1
)

REM Navegar a la carpeta del frontend
cd /d "%~dp0frontend"

REM Mostrar información
echo Iniciando servidor de desarrollo...
echo.
echo URL:        http://localhost:5173
echo Backend:    http://localhost/Genesis
echo Proxy:      /send_form.php -> http://localhost/Genesis/send_form.php
echo.
echo Presiona Ctrl+C para detener el servidor
echo.

REM Iniciar el servidor
cmd /k "npm run dev"
