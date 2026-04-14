# Kopi Senja Portfolio

Laravel 8 portfolio website for a coffee shop, redesigned as a modern landing page with Tailwind CSS, reusable Blade components, and separate pages for home, menu, gallery, and contact.

## Features

- Premium hero section with brand story
- Reusable Blade components for section headings, cards, and testimonials
- Separate pages for menu, gallery, and contact
- Tailwind CSS build via Laravel Mix
- CI/CD practice files for GitHub Actions, GitLab CI, and Jenkins
- Docker build support for containerized usage

## Requirements

- PHP 8.4+
- Composer
- Node.js 18+
- npm

## Local Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan serve
```

In another terminal:

```bash
npm run development
```

## Production Build

```bash
npm run production
php artisan test
```

## Windows Notes

- Use PowerShell or Windows Terminal.
- Keep the project path without special shell escaping when possible.
- Run Composer and npm commands from the repository root.
- If asset compilation fails, remove `node_modules` and reinstall with `npm install`.

## CI/CD

This repository includes the following pipeline files:

- GitHub Actions: [.github/workflows/deploy.yml](.github/workflows/deploy.yml)
- GitLab CI: [.gitlab-ci.yml](.gitlab-ci.yml)
- Jenkins: [Jenkinsfile](Jenkinsfile)

Each pipeline is focused on install, test, and asset build stages so it is safe for practice workflows without triggering an automatic deploy.

## SSH Deployment to VPS

This project now supports SSH-based deployment to your Ubuntu VPS (including Azure VPS with Docker Community installed).

### Server preparation (run once on VPS)

```bash
mkdir -p /var/www/laravel-ci
cd /var/www/laravel-ci
git clone <your-repo-url> .
cp .env.example .env
php artisan key:generate
```

Ensure the VPS has:

- PHP 8.4+
- Composer
- Node.js 18+
- npm

### Required GitHub Secrets

Set these in your repository secrets:

- `VPS_SSH_PRIVATE_KEY`: private key matching the public key in `~/.ssh/authorized_keys` on VPS
- `VPS_SSH_USER`: SSH username on VPS
- `VPS_SSH_HOST`: VPS IP or domain
- `VPS_DEPLOY_PATH`: deploy directory, for example `/var/www/laravel-ci`
- `VPS_KNOWN_HOSTS`: output of `ssh-keyscan -H <host>`

Generate known_hosts value from your local machine:

```bash
ssh-keyscan -H <vps-host-or-ip>
```

### Required GitLab CI Variables

Set these CI/CD variables in GitLab:

- `VPS_SSH_PRIVATE_KEY`
- `VPS_SSH_USER`
- `VPS_SSH_HOST`
- `VPS_DEPLOY_PATH`
- `VPS_KNOWN_HOSTS`

### Deployment behavior

The script [scripts/deploy_vps.sh](scripts/deploy_vps.sh) will:

1. Pull the target commit/branch on VPS
2. Install PHP dependencies (`composer install --no-dev`)
3. Build frontend assets (`npm ci` and `npm run production`)
4. Run migrations (`php artisan migrate --force`)
5. Rebuild Laravel caches

GitHub deploy runs automatically on push to `main` after tests pass. GitLab deploy is manual on `main` for safer release control.

## Pages

- `/` - Home / overview
- `/menu` - Menu highlights
- `/gallery` - Visual gallery
- `/contact` - Contact and reservation form

## Tests

The feature test suite covers all public pages and can be run with:

```bash
php artisan test
```