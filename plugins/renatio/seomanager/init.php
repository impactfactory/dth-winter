<?php

/*
 * 301 Redirect
 */
Event::listen('seo.beforeComponentRender', function ($component) {
    if (optional($component->seoTag)->redirect_url) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: {$component->seoTag->redirect_url}");
    }
});
