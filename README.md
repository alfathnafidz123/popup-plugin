#Pop-Up Plugin

This plugin is a WordPress pop-up solution that includes a Custom Post Type (CPT) for pop-ups, a secured REST API that only logged-in users can access, and a modern pop-up display using Vue.js and standard CSS.

## Features

- **Custom Post Type (CPT):** Manage pop-up data through the WordPress admin panel.
- **REST API Endpoint:** Retrieve pop-up data via `/wp-json/artistudio/v1/popup`, accessible only to logged-in users.
- **Security:** API access is restricted to authenticated users.
- **Modern Pop-Up Design:** Built with Vue.js and CSS for a sleek, responsive design.

---

## Installation


1. Clone this repository into your WordPress plugin folder:

2. Activate the Plugin
  - Log in to your WordPress Dashboard.
  - Navigate to Plugins.
  - Locate Artistudio Pop-Up Plugin and click Activate.

3. Creating the "Popups" Custom Post Type
Upon activation, the plugin automatically registers a CPT with the slug popup. To create a new pop-up:
  - Go to the WordPress Dashboard.
  - Find the Popups menu on the left sidebar.
  - Click Add New.
  - Enter a Title, add content using the editor, and optionally set metadata (popup_page).
  - Click Publish.
