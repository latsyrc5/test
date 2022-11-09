# Upgrade process

## Setup

### Add a second db to lando (example)
```
services:
  database:
    type: mariadb
    portforward: 37005
    creds:
      user: vpr9
      password: vpr9
      database: vpr9
  db2:
    type: mariadb
    portforward: 37006
    creds:
      user: d7legacysite
      password: d7legacysite
      database: d7legacysite
```
**note: Use new ports for every site to avoid collisions**

### Create a `settings.local.php` file
- place it into `web/sites/default`
- assign your dbs as per your lando file, define private file path outside the web root
```
$settings['file_private_path'] = DRUPAL_ROOT . '/../private';


$databases['default']['default'] = array(
  'database' => 'vpr9',
  'username' => 'vpr9',
  'password' => 'vpr9',
  'prefix' => '',
  'host' => 'database',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
$databases['drupal7']['default'] = array(
  'database' => 'd7legacysite',
  'username' => 'd7legacysite',
  'password' => 'd7legacysite',
  'prefix' => '',
  'host' => 'db2',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
$settings['hash_salt'] = 'x_bJYU1Wza54sD10kmbj51mfot7mR6mRWJivXd4-L_LHKtTKxkEOffPe1ibY7GG8QqPlx5k78g';
```

### install site with composer and start up lando
`composer install`
`composer update` to make sure we get the latest module and theme versions
`lando start`

### run the `landoquickstart.sh` file to kick off a VPR boilerplate site
`sh landoquickstart.sh`

### download a copy of the remote db and add it as your second database
`platform db:dump -p [project-id] -e master`
`lando db-import [dump.sql] --host db2`

### download a copy of both your remote public and remote private files
`platform mount:download -p [project-id] -e master`
- save your private files in the private directory at the project root
- save your public files in the temporary directory at `d7files/sites/default/files`

### Download and install migration modules
`composer require drupal/migrate_plus drupal/migrate_tools drupal/migrate_upgrade drupal/webform_migrate drupal/migrate_media_handler`
`lando drush pm:enable migrate migrate_plus migrate_tools migrate_upgrade webform_migrate migrate_media_handler`

### Install the ws_transformations module (copy into modules/custom if not there)
`lando drush pm:enable migrate ws_transformations`

### Set three variables for the `migrate_media_handler` module
`lando drush config-set migrate_media_handler.settings site_uri '/https?:\/\/[w.]*bpi\.ubc\.ca/' -y`
`lando drush config-set migrate_media_handler.settings file_source 'public://' -y`
`lando drush config-set migrate_media_handler.settings file_dest 'public://' -y`

### Register your migration variables in drush
`lando drush --yes migrate:upgrade --legacy-db-key='drupal7' --legacy-root=web --configure-only`

### export then import your config so you can verify it in the UI and the `config sync` directory
`lando drush cex -y`
`lando drush cim -y`

### The migrations directory files
- do a search/replace for `search: sites/bpi.ubc.ca/files` and update it to `search: sites/[mysite].ubc.ca/files`
- copy the migration files you want into your config/sync directory and run `lando drush cim` to be able to view and run them from the UI at `/admin/structure/migrate/manage/webservices/migrations`

## Running migrations
### Order of operations & setup
- users
  - edit `migrate_plus.migration.migrate_users.yml` to map numeric role ids to D9 role names
  - note new names:
    - D7 Administrator -> D9 super_user
    - D7 Supervisor -> D9 editor
    - D7 Editor -> D9 content_creator
  - If the site uses Private Pages, create a Role (ie. Access Private Pages) and map like:
    - D7 Access Private Pages -> D9 access_private_pages
- files
  - these should be good to go if the instruction above are followed, although the private files source directory may require adjustment (ie change `sites/default/files` to `sites/[my-site-name]/files`)
- taxonomies
  - delete any terms in taxonomies you are migrating into
  - create any taxonomies not present (ie. `migrate_plus.migration.migrate_profile_cihr_terms.yml`) using the exisiting sample migrations as a starting point.
  - ensure taxonomies map to the correct `vid` from the source site (review `taxonomy_vocabulary` table in D7 site)
- node
  - review field names per migration and adjust mapping as required
- webforms (see below)
- menu items and aliases (see below)

### Webforms
- Finally, if required, migrate webforms. Find the yaml migrations in the webform_migrate module in the `migration_templates/d7` directory. In your site, go to `/admin/config/development/configuration/single/import` and select Configuration Type `migration`
- Import the `d7_webform.yml` file (and, optionally the `d7_webform_submission.yml` file, but this isn't recommended)
- You can now run them from the Migrate UI under the Drupal 7 group `admin/structure/migrate/manage/migrate_drupal_7/migrations`
- Search for the `upgrade_d7_webform` migration and run it. It will also import some roles that we don't want, so please visit `/admin/people/roles` and remove any roles that aren't one of:
    - anonymous user
    - authenticated user
    - Access Private Pages
    - CWL User
    - Read Only
    - Content Creator
    - Editor
    - Super User
    - Administrator

### URL Aliases
After these have all nodes have been imported, you can migrate menus, menu items and URL aliases using the migrations in the `migrate_drupal_7` group
- `migrate_plus.migration.upgrade_d7_menu.yml`
- `migrate_plus.migration.upgrade_d7_menu_links.yml`
- `migrate_plus.migration.upgrade_d7_url_alias.yml`

Run these with:
`lando drush migrate:import upgrade_d7_menu`
`lando drush migrate:import upgrade_d7_menu_links`
`lando drush migrate:import upgrade_d7_url_alias`

## Misc migrations to run
`lando drush migrate:import upgrade_d7_google_analytics_settings`
`lando drush migrate:import upgrade_d7_pathauto_patterns`

# Migration commands
`lando drush migrate:import --group=webservices --tag=users`
`lando drush migrate:import --group=webservices --tag=files`
`lando drush migrate:import --group=webservices --tag=taxonomy`
`lando drush migrate:import --group=webservices --tag=node`
If you need to roll them all back:
`lando drush migrate:rollback --group=webservices`
Or roll them back individually:
`lando drush migrate:rollback --group=webservices --tag=files`

# Help, I need to change the config
You can access and change config in the `config/sync` directory, then run `lando drush cim`
You can access and change config via devel using the admin menu Tools > Development > Config Editor
You can access and export / import config using the admin menu Configuration > Development > Configuration Synchronization > Import (or Export)

## Issues
- taxonomy
  - import fails when taxonomy is not present
  - need to remap every vid from legacy DB in every term migration
- webform - forms not attached to nodes (but form imported)

## Update sitemap settings
By default these are unset, but should be enabled for all public content types.
  - go to `/admin/structure/types`
  - select `edit` from the dropdown button
  - enable indexing to the default sitemap
    - Priority of `1` for the homepage
    - priority of `7` for landing pages, announcements, events and any other hight value page types
    - default priority of `5` is fine for the rest
  - After all have been updated, choose the `Regenerate all sitemaps after hitting Save` on one of the types to kick of the batch index regeneration.

## Special note about permissions
- **certain migrations can change or cause incomplete permissions settings. Please review and adjust these prior to client review. Previous live migrations are good examples to check against for the correct settings.**

## Cleanup (not in any specific order - two weeks after go live)

### Migration asset cleanup on Drupal 9 site
- uninstall migration modules on live site (unless site is syndicating content via these)
  - migrate
  - migrate_plus
  - migrate_tools
  - migrate_upgrade
  - webform_migrate
  - migrate_media_handler
  - ws_transformations
- once modules are uninstalled on live site and config is synched to local, uninstall them via composer and push changes
- remove `d7files` directory
- remove second db from `.lando.yml`
- remove `migrations->move to sync folder and import` directory
- remove `migrations-notes.md`

### Delete the Drupal 7 version of the site on p.sh

