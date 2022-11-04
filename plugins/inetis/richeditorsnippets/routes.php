<?php

use Cms\Classes\Theme;
use RainLab\Pages\Classes\SnippetManager;

Route::get('/inetis/snippets/list', function () {
    $user = BackendAuth::getUser();

    if (!$user || !$user->hasAccess('rainlab.pages.access_snippets')) {
        return response('Forbidden', 401);
    }

    $snippetManager = SnippetManager::instance();
    $theme = Theme::getActiveTheme();
    $snippets = $snippetManager->listSnippets($theme);

    // Transform to a collection, set the data we need and orgnaise with array keys.
    $snippets = collect($snippets)
        ->transform(function ($item, $key) {
            return [
                'component' => $item->getComponentClass(),
                'snippet'   => $item->code,
                'name'      => $item->getName(),
            ];
        })
        ->keyBy('snippet');

    return response('$.oc.snippets = ' . $snippets, 200)
        ->header('Content-Type', 'application/javascript');

})->middleware('web');
