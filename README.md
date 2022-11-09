# Drupal 9 for Platform.sh

This template builds Drupal 9 using the [Drupal Composer project](https://github.com/drupal-composer/drupal-project) for better flexibility. It also includes configuration to use Redis for caching, although that must be enabled post-install in `.platform.app.yaml`.

Drupal is a flexible and extensible PHP-based CMS framework.

## Services

- PHP 8.0
- MariaDB 10.4
- Redis 6

## Post-install

1. Run through the Drupal installer as normal. You will not be asked for database credentials as those are already provided.

2. Once Drupal is fully installed, edit your `.platform.app.yaml` file and uncomment the line under the `relationships` block that reads `redis: 'rediscache:redis'`. Commit and push the changes. That will enable Drupal's Redis cache integration. (The Redis cache integration cannot be active during the installer.)

3. Review the docs for more information: [platform.sh docs for Redis with Drupal 8](https://docs.platform.sh/frameworks/drupal8/redis.html#using-redis-with-drupal-8x)

## Customizations

The following changes have been made relative to Drupal 8 as it is downloaded from Drupal.org. If using this project as a reference for your own existing project, replicate the changes below to your project.

- It uses the Drupal Composer project, which allow the site to be managed entirely with Composer. That also causes the `vendor` and `config` directories to be placed outside of the web root for added security. See the [Drupal documentation](https://www.drupal.org/node/2404989) for tips on how best to leverage Composer with Drupal 8.
- The `.platform.app.yaml`, `.platform/services.yaml`, and `.platform/routes.yaml` files have been added. These provide Platform.sh-specific configuration and are present in all projects on Platform.sh. You may customize them as you see fit.
- The `.platform.template.yaml` file contains information needed by Platform.sh's project setup process for templates. It may be safely ignored or removed.
- An additional Composer library, [`platformsh/config-reader`](https://github.com/platformsh/config-reader-php), has been added. It provides convenience wrappers for accessing the Platform.sh environment variables.
- The `settings.platformsh.php` file contains Platform.sh-specific code to map environment variables into Drupal configuration. You can add to it as needed. See the documentation for more examples of common snippets to include here. It uses the Config Reader library.
- The `settings.php` file has been heavily customized to only define those values needed for both Platform.sh and local development. It calls out to `settings.platformsh.php` if available. You can add additional values as documented in `default.settings.php` as desired. It is also setup such that when you install Drupal on Platform.sh the installer will not ask for database credentials as they will already be defined.

## References

- [Drupal](https://www.drupal.org/)
- [Drupal on Platform.sh](https://docs.platform.sh/frameworks/drupal8.html)
- [PHP on Platform.sh](https://docs.platform.sh/languages/php.html)

## Lando Quick Start

Edit your `.lando,yml` file and update the url to your site name. Install Drupal using the Standard installation profile.

## Shortcut! (recommended)

You can proceed with the lando commands below to run them individually, or run `sh landoquickstart.sh` from the project root to run the required commands automatically.

### Enable and set themes

`lando drush theme:enable gin && lando drush theme:enable kraken && lando drush theme:enable vpr && lando drush config-set system.theme admin gin -y && lando drush config-set system.theme default vpr -y`

### Enable contrib modules

`lando drush en address, admin_toolbar_links_access_filter, admin_toolbar_tools, allowed_formats, anchor_link, antibot, auto_entitylabel, block_exclude_pages, chosen, ckeditor_a11ychecker, config_ignore, crop, ctools, datetime_range, datetimehideseconds, devel, devel_generate, easy_breadcrumb, editor_advanced_link, editor_button_link, entity_reference_revisions, entityqueue, field_group, file_delete, focal_point, formtips, fullcalendar_view, gin_toolbar, google_analytics, image_widget_crop, inline_responsive_images, jsonapi, linkit, linkit_media_library, maxlength, media, media_bulk_upload, media_entity_file_replace, media_library, menu_block, menu_position, metatag, metatag_open_graph, metatag_twitter_cards, node_revision_delete, optional_end_date, pathauto, paragraphs, quick_node_clone, rebuild_cache_access, redirect, responsive_table_filter, rest, role_delegation, scheduler, serialization, simple_gmap, simple_sitemap, smtp, svg_image, telephone, text_summary_options, token, twig_tweak, view_unpublished, webform, webform_ui -y`

### Enable custom modules for general settings

`lando drush en ubc_ckeditor_widgets, ubc_chosen_style_tweaks, ubc_claro_style_tweaks, ubc_content_items, ubc_date_formats, ubc_editor_config, ubc_editor_config_simple, ubc_image_styles, ubc_media_entities, ubc_paragraph_entities, ubc_general_shared_config, ubc_column_options_widget, ubc_color_box_widget, ubc_taxonomy_terms_admin, ubc_custom_block_types -y`

### Enable custom content type modules

`lando drush en ubc_alert, ubc_announcement, ubc_homepage, ubc_event, ubc_landing_page, ubc_page, ubc_profile, ubc_taxonomy_terms_admin -y`

### Enable User Role and Views modules last, once all the pieces are in place.

`lando drush en ubc_add_to_calendar, ubc_announcement_views, ubc_homepage_views, ubc_event_calendar, ubc_event_views, ubc_landing_page_views, ubc_profile_views, ubc_user_roles -y`

- note that `ubc_user_roles` currently assumes you have installed _ALL_ of the modules as per the code snippet. Exclude this if you've opted not to install one or more of the UBC modules, otherwise _it will fail_.

---

### ADDITIONAL INSTALLATIONS FOR VPR WEBSITES

#### Extend the installed types

`lando drush en ubc_vpr_announcement_extend, ubc_vpr_event_extend, ubc_vpr_homepage_extend, ubc_vpr_landing_page_extend, ubc_vpr_page_extend, ubc_vpr_profile_extend, ubc_vpr_roles, ubc_vpr_shared_config, ubc_vpr_webform_extend -y`

#### Conditionally add additional types

`lando drush en ubc_partner_organization -y`
`lando drush en ubc_project -y`
`lando drush en ubc_publication -y`
`lando drush en ubc_research_project -y`

---

### NEXT STEPS: Additional configuration and settings

#### Add File Delete to default files view by going to:

- /admin/structure/views/view/files/edit/default
- add field "Link to delete File"

#### Delete unused content types by going to:

- /admin/structure/types/manage/article/delete
- /admin/structure/types/manage/page/delete

#### Delete unused comment types if not going to be used:

- /admin/structure/comment/manage/comment/delete

#### Disable unused text formats

`lando drush config-set editor.editor.basic_html status 0 -y && lando drush config-set filter.format.basic_html status 0 -y && lando drush config-set editor.editor.full_html status 0 -y && lando drush config-set filter.format.full_html status 0 -y`

### Remove unused role

`lando drush config:delete "user.role.content_editor"`
`lando drush config:delete "system.action.user_add_role_action.content_editor"`
`lando drush config:delete "system.action.user_remove_role_action.content_editor"`

#### Uninstall some infrequently used modules (need to delete Article and Comment types first)

`lando drush pmu color, comment -y`

### CONFIGURE SITE

#### Set your site name and email address:

`lando drush config-set system.site name '[sitename]' -y && lando drush config-set system.site mail 'no-reply.webservices@ubc.ca' -y`

#### And the same thing for your theme:

`lando drush config-set vpr.settings clf_unitname '[sitename]' -y && lando drush config-set vpr.settings clf_unitname_footer '[sitename]' -y`

#### Update SMTP Settings (note that password is not set here and must be added manually - see keypass):

`lando drush config-set smtp.settings smtp_on 1 -y && lando drush config-set smtp.settings smtp_host 'smtp.mail.ubc.ca' -y && lando drush config-set smtp.settings smtp_port '587' -y && lando drush config-set smtp.settings smtp_protocol 'tls' -y && lando drush config-set smtp.settings smtp_autotls 1 -y && lando drush config-set smtp.settings smtp_username 'ubcuit-a-UBCITWSNR' -y && lando drush config-set smtp.settings smtp_client_hostname 'mail.ubc.ca' -y`

#### Update Scheduler Settings:

`lando drush config-set scheduler.settings allow_date_only 1 -y && lando drush config-set scheduler.settings default_time '00:00' -y && lando drush config-set scheduler.settings hide_seconds 1 -y`

#### Update Devel Settings:

`lando drush config-set devel.settings devel_dumper 'var_dumper' -y`

#### Update Metatag Settings:

`lando drush config-set metatag.metatag_defaults.global tags.canonical_url '[current-page:url]' -y && lando drush config-set metatag.metatag_defaults.global tags.title '[current-page:title] | [site:name]' -y && lando drush config-set metatag.metatag_defaults.front tags.canonical_url '[node:url]' -y && lando drush config-set metatag.metatag_defaults.front tags.description '[node:summary]' -y && lando drush config-set metatag.metatag_defaults.front tags.title '[node:title] | [site:name]' -y && lando drush config-set metatag.metatag_defaults.node tags.canonical_url '[node:url]' -y && lando drush config-set metatag.metatag_defaults.node tags.description '[node:summary]' -y && lando drush config-set metatag.metatag_defaults.node tags.title '[node:title] | [site:name]' -y && lando drush config-set metatag.metatag_defaults.node tags.og_description '[node:summary]' -y && lando drush config-set metatag.metatag_defaults.node tags.og_site_name '[site:name]' -y && lando drush config-set metatag.metatag_defaults.node tags.og_title '[node:title]' -y && lando drush config-set metatag.metatag_defaults.node tags.og_url '[node:url]' -y && lando drush config-set metatag.metatag_defaults.node tags.twitter_cards_description '[node:summary]' -y && lando drush config-set metatag.metatag_defaults.node tags.twitter_cards_page_url '[node:url]' -y && lando drush config-set metatag.metatag_defaults.node tags.twitter_cards_title '[node:title]' -y && lando drush config-set metatag.metatag_defaults.node tags.twitter_cards_type 'summary' -y`

#### Update Media Bulk Upload Settings:

`lando drush config-set media_bulk_upload.media_bulk_config.bulk_upload_documents media_types.document '0' -y && lando drush config-set media_bulk_upload.media_bulk_config.bulk_upload_documents media_types.file 'file' -y`

#### Update Chosen Settings:

`lando drush config-set chosen.settings minimum_single '0' -y && lando drush config-set chosen.settings minimum_multiple '0' -y && lando drush config-set chosen.settings max_shown_results '20' -y && lando drush config-set chosen.settings minimum_width '100' -y && lando drush config-set chosen.settings use_relative_width 'true' -y && lando drush config-set chosen.settings search_contains 'true' -y && lando drush config-set chosen.settings chosen_include '0' -y`

#### Update Node Revision Delete Settings:

`lando drush config-set node_revision_delete.settings node_revision_delete_time '0' -y && lando drush config-set node_revision_delete.settings delete_newer 'false' -y`

#### Update Easy Breadcrumb Settings:

`lando drush config-set easy_breadcrumb.settings include_title_segment 0 -y`

#### Visit the theme settings page to configure any theme options you would like:

- /admin/appearance/settings/kraken

### ENABLE YOUR BLOCKS!

While blocks are created for various views, etc, we don't capture those in config and they must be placed manually. These include the feature regions, listing views, and paragraph regions.

### ENABLE DEMO CONTENT (if needed)

`lando drush en ubc_demo_content -y`
Once enabled, it can be safely disabled, along with it's dependencies:
`lando drush pmu ubc_demo_content, default_content, hal, serialization -y`

### NOTE ABOUT CONFIG MODULES CLEANUP

_IF_ you are not concerned about getting future updates to content types / views enabled via the config modules, they can all be safely disabled in reverse order (Steps 4 & 5). _However_, you cannot reenable them after this is done as they try to install types / views / etc when installed and will fail if they're already present. So while this may be desireable in some cases, the descision cannot be reversed.

### ENABLE REDIS

Once your build is done and modules installed, enable redis caching. You **CANNOT** have this enabled when first installing the site.

#### In `.platform.app.yaml`, uncomment:

```
# redis: 'rediscache:redis'
```

Commit your change and let build. Redis should be operating with the default settings. To verify, refer the [platform.sh documentation](https://docs.platform.sh/frameworks/drupal8/redis.html#verifying-redis-is-running)

---

## TESTING

There is rudimentary integration for **local** testing in cypress at the moment. To being using it:

- update the `baseUrl` in the `cypress.json` file to match your lando domain (ie. `https://mysite.ubc.ca/lndo.site`).
- update the `package.json` with a the name and links to your repo
- install it with `npm install`
- start it up with `npm run cypress:open`

You can find the sample tests and add new ones in the `cypress/integration` directory.

See the [cypress docs](https://docs.cypress.io/guides/overview/why-cypress) for more information.

To fully integrate with github actions and platform workflows, see [this repo](https://github.com/ubc-web-services/cypress-test)

---

## CONFIGURATION INCLUDED

### Roles

- Administrator: all permissions
- Editor: Access to
  - All content types
  - Media
  - Non-admin taxonomies
  - Menus
  - Blocks
  - Google Analytics
  - Redirects
  - URL aliases
  - Metatags
  - User creation and role assignment
- Content Creator: Access to
  - Add / edit Announcement, Event Page, Profile
  - Media

### Content Types & View Modes

- Announcement
  - Default
  - Card: Horizontal
  - Card: Image
  - Card: Vertical
  - Featured Content
  - Teaser
- Event
  - Default
  - Card: Horizontal
  - Card: Image
  - Card: Vertical
  - Featured Content
  - Teaser
- Homepage
  - Default
  - Custom Content
  - Featured Content
  - Teaser
- Landing Page
  - Default
  - Card: Horizontal
  - Card: Image
  - Card: Vertical
  - Custom Content
  - Featured Content
  - Teaser
- Page
  - Default
- Profile
  - Default
  - Card: Horizontal
  - Card: Vertical
  - Teaser

### Media Types

- File
- Image
- Private file
- Remote video
- SVG Icon
- Video

### Custom Block Types

- Code Block
- Quicklinks Block
- Twitter Timeline

### Paragraph Types

- Card
- Card Group
- Featurette
- Icon Card
- Image Card
- Slide (requires vuejs setting in theme)
- Slideshow (requires vuejs setting in theme)
- Tab (requires vuejs setting in theme)
- Tabcordion (requires vuejs setting in theme)
- Text

* suggestions for additional types: Hero image, Image Gallery

### VIEWS

- Content: Announcement Feature (Featured Content view mode on announcement node)
- Content: Announcement List (List of announcement cards with exposed filters)
- Content: Announcement List: RSS (List of announcements)
- Content: Announcements Latest (List of announcement teasers)
- Content: Announcements Latest: By Tags (List of announcement teasers, related by 'tags' taxonomy)
- Content: Announcements Promoted (List of announcement cards, promoted to front page)
- Content: Announcements Related (List of announcement cards, related by shared terms)
- Content: Announcements Related: Announcement Type (List of announcement cards, related by 'announcement type' taxonomy)
- Content: Announcements Related: Tags (List of announcement cards, related by 'tags' taxonomy)

- Content: Conditional Title (Current node title that doesn't display if a Feature image is present)

- Content: Event Feature (Featured Content view mode on event node)
- Content: Event list (List of event cards with exposed filters)
- Content: Event list: RSS (List of events)
- Content: Events Latest (List of event teasers)
- Content: Events Latest: By Tags (List of event teasers, related by 'tags' taxonomy)
- Content: Events Calendar (Calendar of events)
- Content: Events Promoted (List of event cards, promoted to front page)
- Content: Events Related (List of event cards, related by shared terms)
- Content: Events Related: Event Category (List of event cards, related by 'event category' taxonomy)
- Content: Events Related: Tags (List of event cards, related by 'tags' taxonomy)

- Content: Homepage (Featured Content view mode on homepage node)
- Content: Homepage Paragraphs (Custom Content view mode on homepage node)

- Content: Landing Feature (Featured Content view mode on landing page node)
- Content: Landing Paragraphs (Custom Content view mode on landing page node)

- Content: Profile Directory (Alpha pager of Profiles in table format at /directory)
- Content: Profile List (List of profiles in Teaser view mode)
- Content: Profile List Grouped (List of profiles in table format, grouped by last name letter)
