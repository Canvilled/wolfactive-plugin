# Wolfactive Addons

**Plugin Name:** Wolfactive Addons  
**Plugin URI:** [https://wolfactive.net](https://wolfactive.net)  
**Description:** This is a plugin support for Wolfactive.net  
**Version:** 1.0.1  
**Author:** Huy Nguyen - Wolfactive
**Author URI:** [https://wolfactive.net/](https://wolfactive.net/)  
**License:** GPL-2.0+  
**License URI:** [http://www.gnu.org/licenses/gpl-2.0.txt](http://www.gnu.org/licenses/gpl-2.0.txt)  
**Text Domain:** wolfactive-addons

## Description

Wolfactive Addons is a WordPress plugin that provides additional functionality and support for the Wolfactive.net website. This plugin includes features such as multilingual URL support, custom Polylang integration, admin notices, and asset management.

## Installation

1. Download the `wolfactive-addons` plugin.
2. Upload the `wolfactive-addons` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

This plugin includes several features and functionalities:

- **WA\_Filter\_Navigator:** Modifies the output of the navigation block to support multilingual URLs.
- **Polylang\_Custom:** Custom functionalities for Polylang integration.
- **WA\_Notices:** Handles admin notices.
- **WA\_Register\_Assets:** Registers and enqueues necessary assets.

### WA\_Filter\_Navigator

The `WA_Filter_Navigator` class modifies the output of the navigation block to support multilingual URLs. It uses the `Polylang_Fns` helper class to get the current language and replace the language in the URL.

### Polylang\_Custom

The `Polylang_Custom` class provides custom functionalities for Polylang integration, ensuring that the plugin works seamlessly with the Polylang plugin.

### WA\_Notices

The `WA_Notices` class handles admin notices, providing a way to display important messages to the site administrators.

### WA\_Register\_Assets

The `WA_Register_Assets` class registers and enqueues necessary assets such as stylesheets and scripts required by the plugin.

## Changelog

### 1.0.1
- Initial release.

## License

This plugin is licensed under the GPL-2.0+ license. See the [LICENSE](http://www.gnu.org/licenses/gpl-2.0.txt) file for more details.