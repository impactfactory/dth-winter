<?php namespace Liip\Util\Components;

use Cms\Classes\ComponentBase;

class Git extends ComponentBase
{
    public $version;

    public function onRun()
    {
        $path = base_path('version.txt');

        if(file_exists($path)) {
            $version = file_get_contents($path);
        } else {
            $version = shell_exec('git describe --always --tags');
        }
        $this->page['version'] = $this->version = $version;
    }

    public function componentDetails()
    {
        return [
            'name'        => 'Git Component',
            'description' => 'get the git version from a verion.txt or from git describe.'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
}
