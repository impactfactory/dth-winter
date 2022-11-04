<?php return [
    'plugin' => [
        'name' => 'Blog',
        'description' => 'A simple Blog Plugin for OctoberCMS',
    ],
    'settings' => [
        'catstitle' => 'Categories',
        'tagstitle' => 'Tags',
        'poststitle' => 'Posts',
        'tabtitle' => 'Blog',
        'typestitle' => 'Types',
    ],
    'components' => [
        'tagpagename' => 'Blog: Tag Page',
        'tagpagedesc' => 'Shows all published posts with a selected tag.',
        'tagcloudname' => 'Blog: TagCloud',
        'tagclouddesc' => 'Shows a Tag Cloud.',
        'categorypagename' => 'Blog: Category Page',
        'categorypagedesc' => 'Shows all published posts within a selected category.',
        'postdetailname' => 'Blog: Detail Page',
        'postdetaildesc' => 'Shows a blog post page.',
        'postsallname' => 'Blog: List',
        'postsalldesc' => 'Shows all published posts.',
    ],
    'nav' => [
        'maintitle' => 'Blog',
        'side_posts' => 'Posts',
        'side_cats' => 'Categories',
        'side_tags' => 'Tags',
        'side_types' => 'Types',
    ],
    'tag' => [
        'is_published' => 'published',
        'name' => 'Name',
        'description' => 'Description',
        'slug' => 'Slug',
        'img' => 'Image',
        'tab_general' => 'General',
        'tab_meta' => 'Meta',
        'meta_title' => 'Meta Title',
        'meta_desc' => 'Meta Description',
        'meta_description' => 'Meta Description',
        'meta_image' => 'Meta Image',
        'meta_synonyms' => 'Synonyms',
        'meta_title_comment' => 'Eventually displayed in browser tab, Google index, this website search results and social media.',
        'meta_description_comment' => 'Eventually displayed on this websites search results, Googles index, social media previews and json data',
        'synonyms' => 'Synonyms',
        'synonyms_synonym' => 'Synonym',
        'synonyms_comment' => 'Override this websites search engine',
        'meta_image_comment' => 'Eventually displayed on Googles index, social media preview and this websites search engine',
        'updated_at' => 'Update',
        'created_at' => 'created',
        'searchtaglabel' => 'Keywords for Search Function',
        'searchtagcomment' => 'Enter synonyms (e.g. bike for bicycle) and keywords of the second language without commas in between so that the search function finds these tag.',
    ],
    'cat' => [
        'is_published' => 'published',
        'tab_general' => 'General',
        'name' => 'name',
        'slug' => 'Slug',
        'desc' => 'Description',
        'img' => 'Image',
        'tab_meta' => 'Meta',
        'meta_title' => 'Meta Title',
        'meta_desc' => 'Meta Description',
        'meta_synonyms' => 'Synonyms',
        'meta_img' => 'Meta Image',
        'meta_keyword' => 'Meta Keywords',
        'meta_keywords_comment' => 'separate with commas, max. 7',
        'meta_title_comment' => 'eventually displayed in Browser Tab, Google Index, social media, Json-Data',
        'meta_description_comment' => 'Eventually displayed in this websites search results, Google Index, social media and Json Data',
        'synonyms_comment' => 'Used to influence website search results',
        'meta_image_comment' => 'Preview image for social media and Google Index',
        'synonyms_synonym' => 'Synonym',
        'updated_at' => 'Update',
        'created_at' => 'created',
        'searchtaglabel' => 'Keywords for Search Function',
        'searchtagcomment' => 'Enter synonyms (e.g. bike for bicycle) and keywords of the second language without commas in between so that the search function finds these category.',
    ],
    'post' => [
        'author' => 'Author',
        'is_published' => '',
        'tab_content' => 'Content',
        'tab_taxonomy' => 'Taxonomy',
        'tab_author' => 'Author',
        'tab_image' => 'Media',
        'tab_seo' => 'SEO',
        'title' => 'Title',
        'subtitle' => 'Subtitle',
        'excerpt' => 'Excerpt',
        'content' => 'Main Text and Content Elements',
        'keyvisual' => 'Keyvisual',
        'slug' => 'Slug',
        'meta_desc_label' => 'Meta Description',
        'meta_description_comment' => 'Minimum 100, maximum 145 characters incl. spaces',
        'meta_img' => 'Meta Image',
        'meta_img_comment' => 'Eventually displayed on social media previews, Googles index, this websites search results and json data',
        'meta_title_label' => 'Meta Title',
        'meta_title_comment' => 'Maximum 70 characters, incl. spaces',
        'timetoread' => 'Time to read',
        'timetoread_comment' => 'in minutes',
        'categories' => 'Categories',
        'tags' => 'Tags',
        'updated_at' => 'Update',
        'created_at' => 'created',
        'preview' => 'Preview',
        'type' => 'Type',
        'searchtaglabel' => 'Keywords for Search Function',
        'searchtagcomment' => 'Enter synonyms (e.g. bike for bicycle) and keywords of the second language without commas in between so that the search function finds these article.',
        'sort_order' => 'Sort Order',
        'keyvisual_comment' => 'Format: 1440x547 Pixel',
        'crop_area_label' => 'Focus Area Keyvisual',
        'crop_area_comment' => 'Area, where the cropping is focused on',
        'center' => 'center',
        'left' => 'left',
        'right' => 'right',
        'top' => 'top',
        'top-left' => 'top left',
        'top-right' => 'top right',
        'bottom' => 'bottom',
        'bottom-left' => 'bottom left',
        'bottom-right' => 'bottom right'
    ],
    'type' => [
        'name' => 'Name',
    ],
    'search' => [
        'blogbase' => 'cardiology',
        'tagbase' => 'tag',
        'categorybase' => 'topic',
        'provider' => 'Article',
        'provider_tagpages' => 'Tag',
        'provider_categorypages' => 'Topic',
        'locale' => 'en',
    ]
];
