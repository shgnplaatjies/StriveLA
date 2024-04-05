# Custom WordPress Plugin
##### Author: Shagan Plaatjies

## Description
This WordPress plugin allows users to add and display custom fields on the front end of WordPress posts. It implements custom text, date, and image fields with user-friendly customization options.

## Requirements
1. Custom fields for posts (text, date, image).
2. Front-end display of custom fields.
3. User customization of display.
4. Security and best practices.
5. Documentation.

## Installation Instructions
1. Download the plugin files from the repository.
2. Upload the plugin folder to the `/wp-content/plugins/` directory of your WordPress installation.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Custom Fields Implementation

### Fields Used
- **Duration (Date)**
- **Methodology Icon (Image)**
- **Methodology (Text)**
- **Price (Number)**

![image](https://github.com/shgnplaatjies/StriveSA/assets/63879125/727db9c0-45b3-449a-a538-b15fcc9a2c67)


### Implementation Details
- The plugin implements custom fields for displaying images, dates, and text.
- For text fields, users have the option to switch between paragraph text or heading text.
- Image fields offer the choice of rounded or unrounded edges.
- Date fields allow users to select from different date formats and use a date formatter.

### Customization Options
- Customization options are initially available within shortcodes.
- Additional customization features will be enabled through Divi for text and date fields.

## Documentation Considerations
- **Security Measures:** Avoided generic names like 'root' or 'admin' for enhanced security against brute force attacks.
- **Database Security:** Used different usernames and passwords for the database and root user.
- **Source Control:** Utilized symbolic linking for clean and maintainable source control.
- **WordPress Theme Customizations:** Used a Child Theme to ensure customizations remain intact after theme updates.
- **Plugin Repository Independence:** Employed symbolic links to make the plugin repository independent of specific

- **WordPress Theme Customizations:** Used a Child Theme to ensure customizations remain intact after theme updates.
- **Plugin Repository Independence:** Employed symbolic links to make the plugin repository independent of specific websites.
- **Choice of Tools:** Opted for Advanced Custom Fields and Custom Post Type UI plugins for enhanced functionality and ease of use.
- **Plugin Implementation:** Implemented as a Must-Use plugin to separate it from the theme and load it early during WordPress initialization.
- **File Access Control:** Employed absolute path checks to restrict PHP file access to within WordPress only.

These considerations ensure the plugin's robustness, security, and ease of maintenance.

![image](https://github.com/shgnplaatjies/StriveSA/assets/63879125/a8f71bee-53f0-4d42-b4eb-0c1f66663ff4)


