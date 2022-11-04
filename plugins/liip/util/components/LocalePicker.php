<?php namespace Liip\Util\Components;

use Request;
use Redirect;
use RainLab\Translate\Models\Locale as LocaleModel;
use RainLab\Translate\Classes\Translator;
use October\Rain\Router\Router as RainRouter;
use Cms\Classes\ComponentBase;
use Event;

/**
 * custom locale picker that fires an event when switching locales
 * @package Liip\Util\Component
 */
class LocalePicker extends ComponentBase
{
    /**
     * @var RainLab\Translate\Classes\Translator Translator object.
     */
    protected $translator;

    /**
     * @var array Collection of enabled locales.
     */
    public $locales;

    /**
     * @var string The active locale code.
     */
    public $activeLocale;

    /**
     * @var string The active locale name.
     */
    public $activeLocaleName;

    public function componentDetails()
    {
        return [
            'name'        => 'rainlab.translate::lang.locale_picker.component_name',
            'description' => 'rainlab.translate::lang.locale_picker.component_description',
        ];
    }

    public function defineProperties()
    {
        return [
            'forceUrl' => [
                'title'       => 'Force URL schema',
                'description' => 'Always prefix the URL with a language code.',
                'default'     => 0,
                'type'        => 'checkbox'
            ],
        ];
    }

    public function init()
    {
        $this->translator = Translator::instance();
    }

    public function onRun()
    {
        if ($redirect = $this->redirectForceUrl()) {
            return $redirect;
        }

        $this->page['locales'] = $this->locales = LocaleModel::listEnabled();
        $this->page['activeLocale'] = $this->activeLocale = $this->translator->getLocale();
        $this->page['activeLocaleName'] = $this->activeLocaleName = array_get($this->locales, $this->activeLocale);
    }

    public function onSwitchLocale()
    {
        $oldLocale = $this->translator->getLocale();

        if (!$locale = post('locale')) {
            return;
        }

        $this->translator->setLocale($locale);

        $pageUrl = $this->makeLocaleUrlFromPage($locale, $oldLocale);

        if ($this->property('forceUrl')) {
            return Redirect::to($this->translator->getPathInLocale($pageUrl, $locale));
        }

        return Redirect::to($pageUrl);
    }

    protected function redirectForceUrl()
    {
        if (
            Request::ajax() ||
            !$this->property('forceUrl') ||
            $this->translator->loadLocaleFromRequest()
        ) {
            return;
        }

        $locale = $this->translator->getLocale(true)
            ?: $this->translator->getDefaultLocale();

        return Redirect::to($this->translator->getCurrentPathInLocale($locale));
    }

    /**
     * Returns the URL from a page object, including current parameter values.
     * @return string
     */
    protected function makeLocaleUrlFromPage($locale, $oldLocale)
    {
        $page = $this->getPage();

        /*
         * Static Page
         */
        if (isset($page->apiBag['staticPage'])) {

            $staticPage = $page->apiBag['staticPage'];

            $staticPage->rewriteTranslatablePageUrl($locale);

            $localeUrl = array_get($staticPage->attributes, 'viewBag.url');
        }
        /*
         * CMS Page
         */
        else {
            $page->rewriteTranslatablePageUrl($locale);

            $router = new RainRouter;

            $params = $this->getRouter()->getParameters();
            Event::fire('rainlab.translate.params', [$page, &$params, $oldLocale, $locale]);

            $localeUrl = $router->urlFromPattern($page->url, $params);
        }

        return $localeUrl;
    }

    /**
     * translate current page to given locale
     * @param $locale
     * @return string
     */
    public function translate($locale) {
        $activeLocale = $this->activeLocale;

        $this->translator->setLocale($locale);

        $pageUrl = $this->makeLocaleUrlFromPage($locale, $locale);

        if ($this->property('forceUrl')) {
            $pageUrl = $this->translator->getPathInLocale($pageUrl, $locale);
        }

        $this->translator->setLocale($activeLocale);

        return $pageUrl;
    }
}
