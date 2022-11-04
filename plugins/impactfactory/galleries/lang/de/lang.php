<?php return [
    'plugin' => [
        'name' => 'Galleries',
        'description' => 'Ein einfaches Plugin für Galerien. CSS3 Lightbox, multilanguage, WebP Output.',
    ],
    'gallery' => [
        'name' => [
            'label' => 'Name',
            'comment' => 'nur im Backend angezeigt',
        ],
        'publish' => 'veröffentlicht',
        'images' => [
            'label' => 'Bilder',
        ],
    ],
    'settings' => [
        'tabtitle' => 'Galleries',
        'galleries' => 'Galerien',  
        'permissiontitle' => 'Galerien'
    ],
    'menu' => [
        'label' => 'Galerien',
    ],
    'components' => [
        'gallery' => 'Galerie',
        'gallerydisplayname' => 'Galleries: Thumbnails zu Lightbox',
        'gallerydisplaydesc' => 'zeigt Thumbs einer Galerie an, die sich in einer Lightbox öffnen',
        'buttonclose' => 'x Schliessen',
    ],
];
