# Custom WordPress Plugin
##### Author: Shagan Plaatjies

## Description
This WordPress plugin allows users to add and display custom fields on the front end of WordPress posts. It implements custom text, date, and image fields with user-friendly customization options for a course summary card.

## Features
1. Custom fields for posts (text, date, image).
2. Front-end display of custom fields with custom post type.
3. User customization option for round and squared style elements.
4. User customization option for date format.

## Installation Instructions
1. Download the plugin file from the repository's /Plugins symlinked folder.
2. Upload the plugin folder to `/wp-content/plugins/` in your WordPress installation.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Custom Fields Implementation

### Fields Used
- **Duration (Date)**
- **Methodology Icon (Image)**
- **Methodology (Select)**
- **Course Summary (Text)**
- **Border Style**
- **Price (Number)**


### Inspiration
![image](https://github.com/shgnplaatjies/StriveSA/assets/63879125/2940497a-c745-455c-a55e-5fbabd2fac80)

### Demo/Preview
##### Custom Post Type:
![image](https://github.com/shgnplaatjies/StriveSA/assets/63879125/b431450b-1b75-4cbd-84fc-d31f9793e240)

##### Custom Course-Related Fields:
![image](https://github.com/shgnplaatjies/StriveSA/assets/63879125/ef4531b5-1f0e-4fa2-b2bb-6e69344d3e5c)

##### Conditional Rendering Display Options
- Rounded borders + Absolute date format + button configuration.
- ![image](https://github.com/shgnplaatjies/StriveSA/assets/63879125/8c2af1e7-edbf-4889-b34c-b64bba9dd62e)
- Squared Borders + Relative Date format + Removed Button
- ![image](https://github.com/shgnplaatjies/StriveSA/assets/63879125/6568ee56-aa4f-43bf-9016-1d8b68067db5)


### Implementation Details
- The plugin implements custom fields for displaying images, dates, and text.

### Customization Options
- The border style field offers the choice of rounded or unrounded edges.
- Date fields allow users to select from different date formats and use different date formats.

## Documentation Considerations
- **Source Control:** Utilized symbolic linking for clean and maintainable source control.
- **WordPress Theme Customizations:** Used a Child Theme to ensure customizations remain intact after theme updates.
- **Plugin Repository Independence:** Employed symbolic link structure to separate concerns of plugins, themes, and their host WordPress installations. This enables compatibility testing and cleaner repository creation. 
- **WordPress Theme Customizations:** Used a Child Theme to ensure customizations remain intact after theme updates.
- **Plugin Repository Independence:** Employed symbolic links to make the plugin repository independent of specific websites.
- **Choice of Tools:** Avoided tools like Advanced Custom Fields and Custom Post Type UI plugins in favour of a manual approach.
- **Plugin Implementation:** Implemented as a Must-Use plugin to separate it from the theme and load it early during WordPress initialization.
- **Input Sanitization:** Sanitized the text fields to prevent script-injection.
- **File Access Control:** Employed absolute path checks to restrict PHP file access within to WordPress.
- **Security Measures:** Used nonce's to prevent cross-site request forgery attacks.
- **Script Injection Security:** Utilized `esc_attr()` and `esc_html()` functions to escape attributes and HTML text for better security, in addition to input sanitization, reducing the risk of XSS (Cross-Site Scripting) vulnerabilities.
- **Translation Accessibility:** Used translation functions (`esc_html_e()`) instead of `echo`, enabling translation plugin support to improve accessibility.
- **Code Readability:** I've formatted and split the codebase into multiple files according to WordPress best practices for streamlined collaboration.
