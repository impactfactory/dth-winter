<?php namespace Excodus\TranslateExtended\Classes;

use RainLab\Translate\Classes\Translator;
use Excodus\TranslateExtended\Classes\BrowserMatching;
use Excodus\TranslateExtended\Models\Settings;
use Closure;
use Config;
use Request;
use RainLab\Translate\Models\Locale;

/**
 * Middleware for advanced locale detection
 */
class ExtendedLocaleMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
        * Behavior when changing locale from the locale picker; post('locale') has priority over locale in URL,
        * because Request still have old locale in the URL, hence $locale is outdated and User sends new locale in the POST
        * TODO: hook the translate plugin's onSwitchLocale ajax handler instead of checking on post
        */

        $this->localeFromPost() ?: 
        $this->localeFromURL() ?:
        $this->localeFromSession() ?:
        $this->localeFromBrowser();

        return $next($request);
    }

    private function localeFromURL()
    {
        $translator = Translator::instance();
        return $translator->loadLocaleFromRequest() ? $translator->getLocale() : null;
    }

    private function localeFromPost()
    {
        if(!post('locale')){
            return null;
        }
        
        $translator = Translator::instance();
        $translator->setLocale(post('locale'));

        return post('locale');
    }

    private function localeFromSession()
    {
        $translator = Translator::instance();
        
        return (Settings::get('prefer_user_session',true) && $translator->loadLocaleFromSession())
            ? $translator->getLocale()
            : null;
    }

    private function localeFromBrowser()
    {
        $translator = Translator::instance();

        if(Settings::get('browser_language_detection',true) && isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
            $accepted = BrowserMatching::parseLanguageList($_SERVER['HTTP_ACCEPT_LANGUAGE']);
            $available = Locale::listEnabled();
            // match against languages enabled in Translate plugin
            // TODO: allow october backend users to create their own mappings to the locale short codes
            $matches = BrowserMatching::findMatches($accepted, $available);
            // get the first match and save if not empty
            if (!empty($matches)) {
                $match = array_keys($matches)[0];
                $translator->setLocale($match);
                return $match;
            }
        }

        return null;
    }


}
