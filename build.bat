@echo off
REM Script para compilar el proyecto React a producción

echo.
echo ========================================
echo Genesis React Production Build
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

REM Compilar
echo Compilando proyecto...
call npm run build

if %errorlevel% equ 0 (
    echo.
    echo ========================================
    echo Compilación exitosa!
    echo ========================================
    echo.
    echo Los archivos compilados están en:
    echo   ..\dist-react\
    echo.
    echo Para servir localmente:
    echo   npm run preview
    echo.
    pause
) else (
    echo.
    echo Error durante la compilación
    pause
    exit /b 1
)
