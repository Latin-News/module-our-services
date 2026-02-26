# Our Services Module for Joomla 5

A responsive Joomla 5 module that displays services in a UIKit grid layout with images, titles, descriptions, and links.

## Features

- **Responsive Design**: Uses UIKit grid system for responsive layouts
- **Flexible Grid**: Choose from 1-6 columns for desktop display
- **Image Support**: Each service can have an image displayed on the left (desktop) or top (mobile)
- **Repeatable Fields**: Add unlimited services with the subform field
- **Menu Item Links**: Link services directly to menu items
- **Customizable Spacing**: Choose between small, medium, or large grid gaps
- **Auto Updates**: Automatic update notifications through Joomla Update Manager

## Requirements

- Joomla 5.x
- PHP 8.1 or higher
- UIKit framework (should be loaded by your template)

## Installation

### Method 1: Install from GitHub Release

1. Download the latest release ZIP file from [GitHub Releases](https://github.com/Latin-News/module-our-services/releases)
2. In Joomla Administrator, go to **System** → **Install** → **Extensions**
3. Click **Upload Package File** and select the downloaded ZIP file
4. Click **Upload & Install**

### Method 2: Install from URL

1. In Joomla Administrator, go to **System** → **Install** → **Extensions**
2. Click the **Install from URL** tab
3. Enter the URL to the latest release ZIP file
4. Click **Install**

### Method 3: Manual Installation

1. Clone or download this repository
2. Create a ZIP file of the module directory
3. Install via Joomla's extension installer

## Configuration

### Module Parameters

After installation, create a new module instance:

1. Go to **Content** → **Site Modules**
2. Click **New**
3. Select **Our Services**
4. Configure the following options:

#### Basic Options

- **Services**: Click "Add" to add service items. Each service includes:
  - **Image**: Select an image from your media library
  - **Title**: Enter the service title (required)
  - **Description**: Enter the service description (HTML allowed)
  - **Link to Menu Item**: Select a menu item to link to

- **Grid Columns**: Choose how many columns to display on desktop (1-6)
- **Grid Gap**: Select spacing between items (Small, Medium, or Large)

#### Advanced Options

- **Layout**: Select alternative layouts if available
- **Module Class Suffix**: Add custom CSS classes
- **Caching**: Configure module caching options

## Layout Structure

### Desktop View
Each service card displays with:
- Image on the left side
- Title, description, and "Read More" button stacked on the right

### Mobile View
Each service card stacks vertically:
- Image at the top
- Title below the image
- Description below the title
- "Read More" button at the bottom

## Updates

This module includes automatic update support. Updates will appear in:

**System** → **Update** → **Extensions**

The module checks for updates from this GitHub repository.

## Creating a New Release

To create a new release and make it available through Joomla Updates:

1. Update the version number in `mod_ourservices.xml`
2. Update the version and download URL in `updates.xml`
3. Commit and push changes to the main branch
4. Create a new release on GitHub with the version tag (e.g., v1.0.1)
5. Attach the module ZIP file to the release
6. The ZIP file name should match the download URL in `updates.xml`

### Creating the Distribution ZIP

The distribution ZIP should include:
- `mod_ourservices.xml`
- `mod_ourservices.php`
- `src/` directory
- `tmpl/` directory
- `language/` directory

Do NOT include:
- `.git` directory
- `.gitignore` or `.gitattributes`
- `README.md`
- `updates.xml` (this stays in the repo root for the update server)

## Development

### File Structure

```
module-our-services/
├── mod_ourservices.xml           # Module manifest
├── mod_ourservices.php           # Main module file
├── src/
│   └── Helper/
│       └── OurservicesHelper.php # Helper class
├── tmpl/
│   └── default.php               # Default template
├── language/
│   └── en-GB/
│       ├── mod_ourservices.ini     # Language strings
│       └── mod_ourservices.sys.ini # System language strings
├── updates.xml                   # Update server XML
└── README.md                     # This file
```

## License

GNU General Public License version 2 or later

## Author

Russell English

## Support

For issues, questions, or contributions, please visit:
https://github.com/Latin-News/module-our-services/issues

## Changelog

### Version 1.0.0 (26 February 2026)
- Initial release
- Responsive UIKit grid layout
- Image, title, description, and menu link fields
- Configurable columns and spacing
- Auto-update support
