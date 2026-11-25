# Boogle News WordPress theme

`boogle-news-wordpress/` is a standalone WordPress theme port of the Boogle TV News Blogger design. The original Blogger XML file is retained as a reference and is not a WordPress theme.

## Install

1. Copy or upload the `boogle-news-wordpress` folder into `wp-content/themes/`.
2. In WordPress, open **Appearance → Themes** and activate **Boogle News**.
3. Add posts and categories as usual. Add a category with the slug `breaking` to supply the breaking-news ticker; when there are no posts in that category, the ticker uses the latest posts.
4. Configure the **Primary navigation** and optional **Footer navigation** under **Appearance → Menus**. Set a site logo under **Appearance → Customize → Site Identity**.
5. Add widgets under **Appearance → Widgets**. The News sidebar and Footer widgets areas are optional and have built-in fallbacks.

The front page features the latest post, then a grid of recent stories; archives and search results use WordPress pagination. Featured images, post metadata, author details, comments, RSS, categories, and menus all use WordPress-native data and APIs.

## Blogger migration and cross-site publishing

Use the WordPress Blogger importer (under **Tools → Import**, installing its importer if prompted) to bring Blogger posts and media into WordPress, then review imported categories and featured images. This theme does not copy, synchronize, or fetch content from another host. For cross-site publishing, WordPress's built-in RSS feeds and REST API can be consumed by an integration or plugin; configure that separately to fit your hosting and publishing workflow.
