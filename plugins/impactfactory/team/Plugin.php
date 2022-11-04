<?php namespace ImpactFactory\Team;

use ImpactFactory\Team\Components\TeamList;
use ImpactFactory\Team\Components\TeamPerson;
use ImpactFactory\Team\Components\PortraitBox;
use ImpactFactory\Team\Components\PartnerBox;
use ImpactFactory\Team\Components\OrgaJson;
use ImpactFactory\Team\Components\OrgaMeta;
use ImpactFactory\Team\Models\Person;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
  public function registerComponents()
  {
      return [
          TeamPerson::class => 'teamPerson',
          TeamList::class => 'teamList',
          PortraitBox::class => 'portraitBox',
          PartnerBox::class => 'partnerBox',
          OrgaJson::class => 'orgaJson',
          OrgaMeta::class => 'orgaMeta'
      ];
  }

  public function registerPageSnippets()
  {
      return [
         TeamList::class => 'teamList',
         PortraitBox::class => 'portraitBox',
         PartnerBox::class => 'partnerBox',
         OrgaJson::class => 'orgaJson'
      ];
  }

    public function registerSettings()
    {
    }

    public function boot()
    {
    \Event::listen('offline.sitesearch.query', function ($query) {

        // The controller is used to generate page URLs.
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

        // Search your plugin's contents
        $items = Person
            ::where('first_name', 'like', "%${query}%")
            ->orWhere('last_name', 'like', "%${query}%")
            ->orWhere('role', 'like', "%${query}%")
            ->orWhere('boxtext', 'like', "%${query}%")
            ->orWhere('background', 'like', "%${query}%")
            ->orWhere('city', 'like', "%${query}%")
            ->get();

        // Now build a results array
        $results = $items->map(function ($item) use ($query, $controller) {

          $fullname = $item->first_name . ' ' . $item->last_name;

            // If the query is found in the title, set a relevance of 2
            $relevance = mb_stripos($fullname, $query) !== false ? 100 : 1;

            // Optional: Add an age penalty to older results. This makes sure that
            // newer results are listed first.
            // if ($relevance > 1 && $item->created_at) {
            //    $ageInDays = $item->created_at->diffInDays(\Illuminate\Support\Carbon::now());
            //    $relevance -= \OFFLINE\SiteSearch\Classes\Providers\ResultsProvider::agePenaltyForDays($ageInDays);
            // }

            return [
                'title'     => $item->first_name . ' ' . $item->last_name,
                'text'      => $item->role . ' - ' . $item->city,
                'url'       => $controller->pageUrl('team/person.htm', ['slug' => $item->slug]),
                'thumb'     => optional($item->images)->first(), // Instance of System\Models\File
                'relevance' => $relevance, // higher relevance results in a higher
                                           // position in the results listing
                // 'meta' => 'data',       // optional, any other information you want
                                           // to associate with this result
                // 'model' => $item,       // optional, pass along the original model
            ];
        });

        return [
            'provider' => 'Portrait', // The badge to display for this result
            'results'  => $results,
        ];
    });
  }


}
