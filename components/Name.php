<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;

class Name extends ComponentBase
{
    public $schemaName;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Name',
            'description' => "Adding structured data about your site name.",
        ];
    }

    public function defineProperties()
    {
        return [
            'name' => [
                'title'             => 'Name',
                'description'       => 'Site name',
                'showExternalParam' => true,
                'required' => true,
            ],
        ];
    }

    public function onRun() {
        $this->schemaName = $this->page['schemaName'] = $this->property('name');
    }
}
