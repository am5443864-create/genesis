#!/usr/bin/env pwsh

<#
.SYNOPSIS
    Inicia el servidor de desarrollo de Genesis React
.DESCRIPTION
    Script para iniciar el servidor Vite en http://localhost:5173
.EXAMPLE
    ./dev-server.ps1
#>

param(
    [Switch]$Build
)

$ErrorActionPreference = 'Stop'

# Colores
function Write-Header {
    param([string]$Text)
    Write-Host "========================================" -ForegroundColor Cyan
    Write-Host $Text -ForegroundColor Cyan
    Write-Host "========================================" -ForegroundColor Cyan
}

function Write-Success {
    param([string]$Text)
    Write-Host $Text -ForegroundColor Green
}

function Write-Info {
    param([string]$Text)
    Write-Host $Text -ForegroundColor Blue
}

function Write-Error-Custom {
    param([string]$Text)
    Write-Host $Text -ForegroundColor Red
}

# Verificar Node.js
Write-Header "Genesis React Development Server"

Write-Info "Verificando Node.js..."
try {
    $nodeVersion = node --version
    Write-Success "✓ Node.js $nodeVersion detectado"
} catch {
    Write-Error-Custom "✗ Node.js no está instalado o no está en el PATH"
    exit 1
}

# Navegar a frontend
$frontendPath = Join-Path $PSScriptRoot "frontend"
if (-not (Test-Path $frontendPath)) {
    Write-Error-Custom "✗ Carpeta 'frontend' no encontrada"
    exit 1
}

Push-Location $frontendPath

# Verificar node_modules
if (-not (Test-Path "node_modules")) {
    Write-Info "node_modules no encontrado. Instalando dependencias..."
    npm install
}

Write-Host ""
Write-Success "✓ Todo listo para iniciar"
Write-Host ""

Write-Info "URL:          http://localhost:5173"
Write-Info "Backend:      http://localhost/Genesis"
Write-Info "Proxy:        /send_form.php → http://localhost/Genesis/send_form.php"
Write-Host ""
Write-Info "Presiona Ctrl+C para detener el servidor"
Write-Host ""

# Iniciar servidor
if ($Build) {
    Write-Info "Compilando para producción..."
    npm run build
} else {
    npm run dev
}

Pop-Location
