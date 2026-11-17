# Portfolio — Muhammad Safiyan Roslan

A personal portfolio website for a Software Engineer specialising in Hospital Management Systems (HMS), HL7 integrations and API development.

Built with **Laravel 12**, **Blade** and **Tailwind CSS v4**. No database required — all content lives in a single config file.

## Features

- **Single-page portfolio** with smooth-scroll sections: hero, about, skills, experience, projects, education, certifications, contact
- **Content-driven** — every resume entry lives in `config/portfolio.php`, no database or admin panel
- **Working contact form** — server-side validation, renders to email via Laravel Mail (log driver by default)
- **Resume download** — serves a PDF from the public storage disk
- **Responsive dark theme** — sticky blur nav, mobile menu, scroll-reveal animations, reduced-motion support

## Tech stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 (PHP 8.2+) |
| Templating | Blade |
| Styling | Tailwind CSS v4 |
| Build | Vite 7 |
| Mail | Laravel Mail (log / SMTP) |

## Getting started

```bash
# 1. Install PHP and JS dependencies
composer install
npm install

# 2. Create your environment file and app key
cp .env.example .env
php artisan key:generate

# 3. Build frontend assets
npm run build      # production
# or: npm run dev  # hot reload during development

# 4. Link storage (needed for the resume download)
php artisan storage:link

# 5. Serve
php artisan serve
```

Open <http://localhost:8000>.

## Editing content

All resume content is in [`config/portfolio.php`](config/portfolio.php):

| Key | Used for |
|---|---|
| `personal` | Name, title, tagline, summary, location, email, LinkedIn |
| `skills` | Grouped technical skills |
| `languages` | Language proficiency |
| `experiences` | Work history with sub-sections |
| `projects` | Project cards with features and tags |
| `education` | Degrees and results |
| `certifications` | Certifications and awards |

Replacing the downloadable resume means overwriting
`storage/app/public/resume/Muhammad-Safiyan-Roslan-Resume.pdf`.

## Contact form

By default `MAIL_MAILER=log`, so submissions are written to `storage/logs/laravel.log`
instead of being sent — handy for local testing.

To deliver real email, set these in `.env`:

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_FROM_ADDRESS=your@gmail.com
```

## Deployment notes

Laravel needs PHP hosting — GitHub alone cannot serve it. Point your host's
document root at `public/`, set `APP_ENV=production` and `APP_DEBUG=false`,
then run `composer install --no-dev`, `npm run build`, `php artisan config:cache`
and `php artisan storage:link` on the server.

## License

The application code is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
Resume content and personal details remain © Muhammad Safiyan Roslan.
