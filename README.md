# Mill Creek Bakery — WordPress Backend

A headless WordPress backend built as part of a portfolio project demonstrating React, Next.js, and headless WordPress skills. The fictional bakery content is served via WPGraphQL to a Next.js frontend.

## Live Demo

The WordPress backend powers: **[bakery.tonyschappaugh.com](https://bakery.tonyschappaugh.com)**

The Next.js frontend fetches all content from the GraphQL endpoint exposed by this WordPress install.

## Skills Demonstrated

### PHP / WordPress Backend
- **Custom Post Type** registration (`bread`) with REST API and WPGraphQL support
- **Custom Taxonomy** registration (`bread_category`) hierarchical, with REST API and WPGraphQL support
- **WPGraphQL integration** via `show_in_graphql`, `graphql_single_name`, and `graphql_plural_name` on both the CPT and taxonomy
- **Plugin architecture** using a single hand-rolled PHP plugin (no CPT UI dependency)
- **WordPress coding standards** — snake_case functions, `mill_creek_` prefix throughout

### Headless Architecture
- WordPress acts as a pure content backend — no frontend rendering
- All content exposed via **WPGraphQL** and consumed by a separate Next.js App Router frontend
- GraphQL endpoint at `/graphql` replaces the REST API for frontend data fetching
- `show_in_rest` enabled alongside GraphQL support for editor compatibility

## Features

- Custom `bread` post type with archive support, featured image, title, editor, and excerpt
- Custom `bread_category` taxonomy (hierarchical) for filtering bread entries
- 12 bread entries with featured images, excerpts, and categories — live on production
- Works with any WordPress theme — backend only, no frontend template logic

## Requirements

- WordPress 6.0+
- PHP 7.4+
- WPGraphQL plugin

## Installation

1. Clone this repository into your WordPress site's `wp-content/` directory
2. Activate the **Mill Creek Custom Post Types** plugin in **Plugins > Installed Plugins**
3. Install and activate the **WPGraphQL** plugin
4. Content is ready to query at `/graphql`

## Usage

### Creating Bread Entries

Go to **Breads > Add New** in the WordPress admin. Fill in the title, content body, excerpt, featured image, and assign one or more bread categories.

### Querying via GraphQL

Use the GraphiQL IDE at **GraphQL > GraphiQL IDE** in the admin, or query the endpoint directly:

```graphql
query GetBreads {
  breads {
    nodes {
      slug
      title
      excerpt
      featuredImage {
        node {
          sourceUrl
          altText
        }
      }
      breadCategories {
        nodes {
          name
          slug
        }
      }
    }
  }
}
```

## File Structure

```
wp-content/
├── plugins/
│   └── mill-creek-cpt/
│       └── mill-creek-cpt.php    # CPT and taxonomy registration
└── themes/
    └── twentytwentyfive/         # Active theme (unmodified)
```

## License

GPL-2.0+
