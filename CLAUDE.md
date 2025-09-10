# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Batterra is a Czech investment company focused on battery energy storage centers. This is a professional PHP/HTML/CSS website showcasing investment opportunities in battery storage projects.

## Technology Stack

- **Backend**: PHP 8+ with includes-based templating system
- **Frontend**: HTML5, CSS3 (no frameworks), minimal vanilla JavaScript
- **Styling**: Custom CSS with CSS Custom Properties, mobile-first responsive design
- **Forms**: Server-side PHP processing with CSRF protection and validation
- **Deployment**: Standard web hosting (compatible with Forpsi.com)

## Project Structure

```
batterra/
├── index.php                 # Homepage
├── o-spolecnosti.php         # About page (to be created)
├── projekty.php              # Projects listing
├── projekt.php               # Individual project detail
├── investicni-model.php      # Investment model (to be created)
├── aktuality.php             # News listing (to be created)
├── kontakt.php               # Contact page with working form
├── transparentnost.php       # Transparency page (to be created)
├── includes/
│   ├── config.php            # Site configuration and constants
│   ├── header.php            # Site header template
│   ├── footer.php            # Site footer template  
│   ├── nav.php               # Navigation menu
│   └── functions.php         # Utility functions
├── assets/
│   ├── css/
│   │   ├── main.css          # Base styles and design system
│   │   ├── components.css    # Reusable UI components
│   │   └── pages.css         # Page-specific styles
│   ├── js/
│   │   └── main.js           # Core JavaScript functionality
│   └── images/               # Site images
├── api/
│   ├── contact.php           # Contact form handler
│   └── newsletter.php        # Newsletter signup handler
└── zadani/                   # Original requirements and designs
```

## Key Features Implemented

- ✅ Responsive design matching provided mockups
- ✅ Contact form with email processing and validation
- ✅ Newsletter signup system
- ✅ Project showcase with detailed project pages
- ✅ Mobile-first responsive design with hamburger menu
- ✅ Security features (CSRF protection, rate limiting, input sanitization)
- ✅ SEO-friendly structure with proper meta tags

## Development Commands

This is a standard PHP project with no build process:

- **Local development**: Use PHP built-in server: `php -S localhost:8000`
- **File editing**: Edit PHP/HTML/CSS files directly
- **Testing**: Test forms and functionality in browser
- **Deployment**: Upload files via FTP/SFTP to web hosting

## Configuration

- Update site constants in `includes/config.php`
- Email configuration for contact forms in API files
- CSS custom properties in `assets/css/main.css` for theming

## Security Notes

- All user inputs are sanitized using `sanitize_input()` function
- CSRF tokens protect all forms
- Rate limiting prevents form spam
- No direct database connections (uses file-based storage for newsletter)

## Content Management

Project data is currently stored as PHP arrays in the files. For CMS integration:
- Replace arrays in `projekty.php` and `projekt.php` with database/API calls
- Newsletter system can be integrated with existing CMS
- News system ready for CMS integration

## Remaining Tasks

- Investment model page with interactive visualization
- About and transparency pages
- News/blog system
- .htaccess file for clean URLs
- Final testing and optimization