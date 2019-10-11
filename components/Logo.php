<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;

class Logo extends ComponentBase
{
    public $schemaLogo;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Logo',
            'description' => "Adding structured data about your logo.",
        ];
    }

    public function defineProperties()
    {
        return [
            'logo' => [
                'title'             => 'Logo',
                'description'       => 'Path to the website logo (relative to theme path)',
                'default'           => 'assets/img/logo.png',
                'showExternalParam' => false,
            ],
        ];
    }

    public function onRun() {
        $this->schemaLogo = $this->page['schemaLogo'] = $this->property('logo');
    }
}