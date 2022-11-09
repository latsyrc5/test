#!/bin/bash

# setup sitename
echo -e "Please enter the site name: "
read sitename

# themes
lando drush theme:enable gin  && lando drush theme:enable kraken && lando drush theme:enable vpr && lando drush config-set system.theme admin gin -y && lando drush config-set system.theme default vpr -y

# config modules
lando drush en address, admin_toolbar_links_access_filter, admin_toolbar_tools, allowed_formats, anchor_link, antibot, auto_entitylabel, block_exclude_pages, chosen, ckeditor_a11ychecker, config_ignore, crop, ctools, datetime_range, datetimehideseconds, devel, devel_generate, easy_breadcrumb, editor_advanced_link, editor_button_link, entity_reference_revisions, entityqueue, field_group, file_delete, focal_point, formtips, fullcalendar_view, gin_toolbar, google_analytics, image_widget_crop, inline_responsive_images, jsonapi, linkit, linkit_media_library, maxlength, media, media_bulk_upload, media_entity_file_replace, media_library, menu_block, menu_position, metatag, metatag_open_graph, metatag_twitter_cards, node_revision_delete, optional_end_date, pathauto, paragraphs, quick_node_clone, rebuild_cache_access, redirect, responsive_table_filter, rest, role_delegation, scheduler, serialization, simple_gmap, simple_sitemap, smtp, svg_image, telephone, text_summary_options, token, twig_tweak, view_unpublished, webform, webform_ui -y

# custom modules
lando drush en ubc_ckeditor_widgets, ubc_chosen_style_tweaks, ubc_claro_style_tweaks, ubc_content_items, ubc_date_formats, ubc_editor_config, ubc_editor_config_simple, ubc_image_styles, ubc_media_entities, ubc_paragraph_entities, ubc_general_shared_config, ubc_column_options_widget, ubc_color_box_widget, ubc_taxonomy_terms_admin, ubc_custom_block_types -y

# custom content types
lando drush en ubc_alert, ubc_announcement, ubc_homepage, ubc_event, ubc_landing_page, ubc_page, ubc_profile, ubc_taxonomy_terms_admin -y

# roles and views
lando drush en ubc_add_to_calendar, ubc_announcement_views, ubc_homepage_views, ubc_event_calendar, ubc_event_views, ubc_landing_page_views, ubc_profile_views, ubc_user_roles -y

# vpr specific modules
lando drush en ubc_vpr_announcement_extend, ubc_vpr_event_extend, ubc_vpr_homepage_extend, ubc_vpr_landing_page_extend, ubc_vpr_page_extend, ubc_vpr_profile_extend, ubc_vpr_roles, ubc_vpr_shared_config, ubc_vpr_webform_extend -y

# disable unused text formats
lando drush config-set editor.editor.basic_html status 0 -y && lando drush config-set filter.format.basic_html status 0 -y && lando drush config-set editor.editor.full_html status 0 -y && lando drush config-set filter.format.full_html status 0 -y

# remove unused role
lando drush config:delete "user.role.content_editor"
lando drush config:delete "system.action.user_add_role_action.content_editor"
lando drush config:delete "system.action.user_remove_role_action.content_editor"

# Set your site name and email address:
lando drush config-set system.site name "$sitename" -y && lando drush config-set system.site mail 'no-reply.webservices@ubc.ca' -y

# And the same thing for your theme:
lando drush config-set vpr.settings clf_unitname "$sitename" -y && lando drush config-set vpr.settings clf_unitname_footer "$sitename" -y

# Update SMTP Settings (note that password is not set here and must be added manually - see keypass):
lando drush config-set smtp.settings smtp_on 1 -y && lando drush config-set smtp.settings smtp_host 'smtp.mail.ubc.ca' -y && lando drush config-set smtp.settings smtp_port '587' -y && lando drush config-set smtp.settings smtp_protocol 'tls' -y && lando drush config-set smtp.settings smtp_autotls 1 -y && lando drush config-set smtp.settings smtp_username 'ubcuit-a-UBCITWSNR' -y && lando drush config-set smtp.settings smtp_client_helo 'mail.ubc.ca' -y

# Update Scheduler Settings
lando drush config-set scheduler.settings allow_date_only 1 -y && lando drush config-set scheduler.settings default_time '00:00' -y && lando drush config-set scheduler.settings hide_seconds 1 -y

# Update Devel Settings
lando drush config-set devel.settings devel_dumper 'var_dumper' -y

# Update Metatag Settings:
lando drush config-set metatag.metatag_defaults.global tags.canonical_url '[current-page:url]' -y && lando drush config-set metatag.metatag_defaults.global tags.title '[current-page:title] | [site:name]' -y && lando drush config-set metatag.metatag_defaults.front tags.canonical_url '[node:url]' -y && lando drush config-set metatag.metatag_defaults.front tags.description '[node:summary]' -y && lando drush config-set metatag.metatag_defaults.front tags.title '[node:title] | [site:name]' -y && lando drush config-set metatag.metatag_defaults.node tags.canonical_url '[node:url]' -y && lando drush config-set metatag.metatag_defaults.node tags.description '[node:summary]' -y && lando drush config-set metatag.metatag_defaults.node tags.title '[node:title] | [site:name]' -y && lando drush config-set metatag.metatag_defaults.node tags.og_description '[node:summary]' -y && lando drush config-set metatag.metatag_defaults.node tags.og_site_name '[site:name]' -y && lando drush config-set metatag.metatag_defaults.node tags.og_title '[node:title]' -y && lando drush config-set metatag.metatag_defaults.node tags.og_url '[node:url]' -y && lando drush config-set metatag.metatag_defaults.node tags.twitter_cards_description '[node:summary]' -y && lando drush config-set metatag.metatag_defaults.node tags.twitter_cards_page_url '[node:url]' -y && lando drush config-set metatag.metatag_defaults.node tags.twitter_cards_title '[node:title]' -y && lando drush config-set metatag.metatag_defaults.node tags.twitter_cards_type 'summary' -y

# Update Media Bulk Upload Settings:
lando drush config-set media_bulk_upload.media_bulk_config.bulk_upload_documents media_types.document '0' -y && lando drush config-set media_bulk_upload.media_bulk_config.bulk_upload_documents media_types.file 'file' -y

# Update Chosen Settings:
lando drush config-set chosen.settings minimum_single '0' -y && lando drush config-set chosen.settings minimum_multiple '0' -y && lando drush config-set chosen.settings max_shown_results '20' -y && lando drush config-set chosen.settings minimum_width '100' -y && lando drush config-set chosen.settings use_relative_width 'true' -y && lando drush config-set chosen.settings search_contains 'true' -y && lando drush config-set chosen.settings chosen_include '0' -y

# Update Node Revision Delete Settings:
lando drush config-set node_revision_delete.settings node_revision_delete_time '0' -y && lando drush config-set node_revision_delete.settings delete_newer 'false' -y

# Update Easy Breadcrumb Settings:
lando drush config-set easy_breadcrumb.settings include_title_segment 0 -y