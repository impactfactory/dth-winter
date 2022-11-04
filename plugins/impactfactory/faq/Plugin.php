<?php namespace ImpactFactory\Faq;

use ImpactFactory\Faq\Components\Faq;
use ImpactFactory\Faq\Components\FaqCategory;
use ImpactFactory\Faq\Models\Faq as FaqModel;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            Faq::class => 'faq',
            FaqCategory::class => 'faqcategory'
        ];
    }

    public function registerPageSnippets()
    {
      return [
          Faq::class => 'faq',
          FaqCategory::class => 'faqcategory'
      ];
    }

    public function registerSettings()
    {
    }

    public function registerListColumnTypes()
    {
        return [
            'answer' => function($value) {
                return $value;
            },
            'list' => function($values) {
                return implode(', ', $values->pluck('name')->toArray());
            }
        ];
    }

    public function boot()
    {
    \Event::listen('offline.sitesearch.query', function ($query) {

        // The controller is used to generate page URLs.
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

        // Search your plugin's contents
        $items = FaqModel
            ::where('question', 'like', "%${query}%")
            ->orWhere('answer', 'like', "%${query}%")
            ->get();

        // Now build a results array
        $results = $items->map(function ($item) use ($query, $controller) {

          //$fullname = $item->first_name . ' ' . $item->last_name;

            // If the query is found in the title, set a relevance of 2
            //$relevance = mb_stripos($fullname, $query) !== false ? 100 : 1;

            // Optional: Add an age penalty to older results. This makes sure that
            // newer results are listed first.
            // if ($relevance > 1 && $item->created_at) {
            //    $ageInDays = $item->created_at->diffInDays(\Illuminate\Support\Carbon::now());
            //    $relevance -= \OFFLINE\SiteSearch\Classes\Providers\ResultsProvider::agePenaltyForDays($ageInDays);
            // }

            return [
                'title'     => $item->question,
                'text'      => $item->answer,
                'url'       => 'faqs#accordion-'.$item->id,//$controller->pageUrl('faqs/accordion'),
                //'thumb'     => optional($item->images)->first(), // Instance of System\Models\File
                //'relevance' => $relevance, // higher relevance results in a higher
                                           // position in the results listing
                // 'meta' => 'data',       // optional, any other information you want
                                           // to associate with this result
                // 'model' => $item,       // optional, pass along the original model
            ];
        });

        return [
            'provider' => 'FAQ', // The badge to display for this result
            'results'  => $results,
        ];
    });
  }

}
