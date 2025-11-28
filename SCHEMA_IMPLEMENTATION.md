# Schema Management System - Technical Documentation

## Overview

The Schema Management System is a comprehensive WordPress solution for managing JSON-LD schema markup across pages, posts, and custom post types. It provides an intuitive React-based admin interface for adding, editing, and managing structured data without requiring technical knowledge.

## Features

### Core Functionality

- **Global Schema Management**: Apply schema markup site-wide with toggle control
- **Page-Specific Schema**: Manage individual page schemas with dedicated interface
- **Post Schema Management**: Add schema to any post type (posts, pages, news, services, case-studies, authors)
- **Meta Box Integration**: Quick schema editor directly in post edit screens
- **React-Based Admin UI**: Modern, responsive interface using React 18
- **REST API Integration**: Secure API endpoints for all operations
- **SweetAlert2 Notifications**: User-friendly success and error messages

## Architecture

### File Structure

```
inc/schema.php                    # Main PHP class (450+ lines)
js/schema-admin.js               # Admin page entry point
js/schema-meta-box.js            # Meta box entry point
js/modules/schema-admin.jsx      # React admin component
js/modules/schema-meta-box.jsx   # React meta box component
css/schema-admin.css             # Admin interface styles
```

### Database Structure

**Options Table:**

- Option Name: `modular_schema_settings`
- Structure:
  ```php
  array(
      'global_schema' => string,      // Global schema JSON-LD code
      'global_enabled' => boolean,     // Global schema enabled/disabled
      'page_schemas' => array(        // Page-specific schemas
          array(
              'page_id' => int,
              'schema' => string,
              'enabled' => boolean
          )
      )
  )
  ```

**Post Meta:**

- Meta Key: `_modular_schema_data` - Stores schema JSON-LD code
- Meta Key: `_modular_schema_data_enabled` - Stores enabled/disabled status (1 or 0)

## REST API Endpoints

All endpoints require `manage_options` capability and are namespaced under `modular-schema/v1`.

### GET `/wp-json/modular-schema/v1/settings`

Returns current schema settings.

**Response:**

```json
{
  "global_schema": "",
  "global_enabled": false,
  "page_schemas": []
}
```

### POST `/wp-json/modular-schema/v1/settings`

Saves schema settings.

**Request Body:**

```json
{
  "global_schema": "<script type=\"application/ld+json\">...</script>",
  "global_enabled": true,
  "page_schemas": [
    {
      "page_id": 123,
      "schema": "<script type=\"application/ld+json\">...</script>",
      "enabled": true
    }
  ]
}
```

### GET `/wp-json/modular-schema/v1/post/{id}`

Returns schema data for a specific post.

**Response:**

```json
{
  "schema": "",
  "enabled": true
}
```

### POST `/wp-json/modular-schema/v1/post/{id}`

Saves schema data for a specific post.

**Request Body:**

```json
{
  "schema": "<script type=\"application/ld+json\">...</script>",
  "enabled": true
}
```

### GET `/wp-json/modular-schema/v1/posts`

Returns list of posts for selection.

**Query Parameters:**

- `post_type` (optional) - Filter by post type (default: 'any')
- `search` (optional) - Search term

**Response:**

```json
[
  {
    "id": 123,
    "title": "Post Title",
    "type": "post",
    "edit_link": "http://..."
  }
]
```

## Frontend Output

Schema markup is automatically output in the `<head>` section of pages:

1. **Global Schema** - Output if `global_enabled` is true
2. **Page-Specific Schema** - Output for matching pages from `page_schemas` array
3. **Post Schema** - Output for individual posts if enabled

The system automatically wraps JSON-LD code in `<script type="application/ld+json">` tags if not already wrapped.

## Security

### Implementation

- ABSPATH checks prevent direct file access
- Nonce verification for all form submissions
- Capability checks (`manage_options`) for all admin functions
- Input sanitization: `wp_kses_post()`, `sanitize_text_field()`, `absint()`
- Output escaping where needed
- REST API permission callbacks

### Best Practices

- No hardcoded credentials
- No eval() or dangerous functions
- No direct file system access
- Uses WordPress native APIs only

## Dependencies

### External Libraries (CDN)

- React 18.2.0 (unpkg.com)
- React DOM 18.2.0 (unpkg.com)
- Babel Standalone 7.23.0 (unpkg.com) - JSX transformation
- SweetAlert2 11.0.0 (cdn.jsdelivr.net)

**Note:** These load only on admin pages, not frontend.

### WordPress Requirements

- WordPress 5.0+
- PHP 7.4+
- REST API enabled
- No plugin dependencies

## Usage

### Adding Global Schema

1. Navigate to **Schema** in WordPress admin menu
2. Click **Global Schema** tab
3. Toggle **Enable Global Schema**
4. Paste JSON-LD schema code in editor
5. Click **Save Global Settings**

### Adding Page-Specific Schema

1. Navigate to **Schema** → **Page Schemas** tab
2. Select a page from dropdown
3. Click **Add Page**
4. Configure schema in editor
5. Toggle enable/disable as needed
6. Click **Save Page Schemas**

### Adding Post Schema

**Method 1: From Schema Admin**

1. Navigate to **Schema** → **Post Schemas** tab
2. Filter by post type or search
3. Click on a post to load editor
4. Add/edit schema code
5. Click **Save Schema**

**Method 2: From Post Edit Screen**

1. Edit any post/page
2. Find **Schema Markup** meta box
3. Toggle **Enable Schema for this post**
4. Add schema code
5. Click **Save Schema**

## Code Architecture

### Class Structure

**Modular_Schema_Manager** - Singleton class

- Handles all schema functionality
- REST API registration
- Admin menu and meta boxes
- Frontend output

### Component Structure

**SchemaAdmin** - Main admin component

- Tab navigation
- Global schema panel
- Page schema panel
- Post schema panel

**SchemaMetaBox** - Post edit meta box component

- Schema editor
- Save functionality

### Reusable Components

- **ToggleSwitch** - Enable/disable toggle
- **SchemaEditor** - Code editor with hints

## Performance

- Schema cached in WordPress options and post meta
- No database queries on frontend
- React components load only on admin pages
- External libraries loaded via CDN
- Total file size: ~53 KB

## Browser Compatibility

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile responsive design
- IE11+ (with polyfills)

## Troubleshooting

### Schema Not Appearing on Frontend

1. Verify schema is enabled (toggle switch)
2. Check schema code is valid JSON-LD
3. Check browser console for JavaScript errors
4. Verify user has `manage_options` capability

### Admin Interface Not Loading

1. Check browser console for errors
2. Verify React, ReactDOM, and Babel are loading
3. Check network tab for failed requests
4. Verify file permissions on JS/CSS files

### Schema Not Saving

1. Check REST API nonce
2. Verify user permissions
3. Check PHP error logs
4. Verify database write permissions

## Version History

**Version 1.0.0** - Initial Implementation

- Global schema management
- Page-specific schema
- Post schema management
- Meta box integration
- React-based UI
- SweetAlert2 notifications

---

**Last Updated:** 2025-01-27  
**Compatible with:** WordPress 5.0+, PHP 7.4+  
**License:** GNU General Public License V2 or Later
