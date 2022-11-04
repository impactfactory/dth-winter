<?php return [
    'plugin' => [
        'name' => 'Galleries',
        'description' => 'A simple Plugin for displaying galleries. CSS3 Lightbox, WebP-Ausgabe, multilanguage.',
    ],
    'gallery' => [
        'name' => [
            'label' => 'Name',
            'comment' => 'only for backend',
        ],
        'publish' => 'published',
        'images' => [
            'label' => 'Images',
        ],
    ],
    'settings' => [
        'tabtitle' => 'Galleries',
        'galleries' => 'Galleries',
        'permissiontitle' => 'Galleries'
    ],
    'menu' => [
        'label' => 'Galleries',
    ],
    'components' => [
        'gallery' => 'Gallery',
        'gallerydisplayname' => 'Galleries: Thumbs to Lightbox',
        'gallerydisplaydesc' => 'shows Thumbs of a gallery that open in Lightboxes',
    ],
];
