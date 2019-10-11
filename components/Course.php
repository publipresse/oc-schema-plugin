<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Course extends ComponentBase
{
    public $schemaCourse;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Course',
            'description' => 'Add structured data about your course.'
        ];
    }

    public function defineProperties()
    {
        return [
            'name' => [
                'title'             => 'Name',
                'description'       => 'Name of the course.',
                'default'           => '{{ :record.name }}',
            ],
            'description' => [
                'title'             => 'Description',
                'description'       => 'Description of the course.',
            ],
            'providerName' => [
                'title'             => 'Provider name',
                'description'       => 'Name of the organization giving the course.',
                'default'           => '',
            ],
        ];
    }

    public function onRender() {
        $this->schemaCourse = $this->page['schemaCourse'] = ComponentHelper::getDynamicProperties($this, $this->page);
    }

}
