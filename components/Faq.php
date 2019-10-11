<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Faq extends ComponentBase
{
    public $schemaFaq;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Faq',
            'description' => 'Add structured data about your FAQ.'
        ];
    }

    public function defineProperties()
    {
        return [
            'records' => [
                'title'             => 'Records',
                'description'       => 'Reference to the records than handle questions and answers.',
                'default'           => '{{ :records }}',
            ],
            'questionField' => [
                'title'             => 'Question field',
                'description'       => 'Field name that handle the question.',
                'showExternalParam' => false,
            ],
            'answerField' => [
                'title'             => 'Answer field',
                'description'       => 'Field name that handle the answer.',
                'showExternalParam' => false,
            ],
        ];
    }

    public function onRender() {
        $this->schemaFaq = $this->page['schemaFaq'] = ComponentHelper::getDynamicProperties($this, $this->page);
    }

}
