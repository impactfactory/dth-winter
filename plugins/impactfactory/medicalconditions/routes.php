<?php

Route::get('robots.txt', function() {

  return '# Group 1 \n
User-agent: * \n
Disallow: /config/ \n
Disallow: /modules/ \n
Disallow: /plugins/ \n
Disallow: /vendor/ \n
Sitemap: https://www.dth-herzzentrum.ch/sitemap.xml \n';

});
