# php-sitemap-crawler
Simple PHP Sitemap Crawler

usage:

use pintofbeer\SitemapCrawler;

$crawler = new SitemapCrawler("http://url.com/to/sitemap.xml");

$crawler->getUrls(); // returns an array of all the URL's found in the sitemap and any linked xml sitemaps.
