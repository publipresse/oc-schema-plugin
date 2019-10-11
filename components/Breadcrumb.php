<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Publipresse\Schema\Classes\ComponentHelper;

class Breadcrumb extends ComponentBase
{
    public $schemaBreadcrumb;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Breadcrumb',
            'description' => 'Add structured data about your breadcrumb.'
        ];
    }

    public function defineProperties()
    {
        for($i = 1; $i <= 5; $i++) {
            $properties['name'.$i] = [
                'title' => 'Name',
                'group' => 'Position '.$i,
            ];
            $properties['page'.$i] = [
                'title' => 'Page',
                'type'  => 'dropdown',
                'group' => 'Position '.$i,
                'placeholder' => 'Choose a page',
                'showExternalParam' => false,
            ];
            $properties['param_name'.$i] = [
                'title' => 'Param name',
                'group' => 'Position '.$i,
                'description' => 'The name of your placeholder in your url path',
                'showExternalParam' => false,
            ];
            $properties['param_value'.$i] = [
                'title' => 'Param value',
                'group' => 'Position '.$i,
                'description' => 'The value of your placeholder in your url path',
            ];
        }
        return $properties;
    }

    public function onRender() {
        $properties = ComponentHelper::getDynamicProperties($this, $this->page);
        $this->schemaBreadcrumb = $this->page['schemaBreadcrumb'] = ComponentHelper::groupProperties($properties);
    }

    public function getPage1Options()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }
    public function getPage2Options()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }
    public function getPage3Options()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }
    public function getPage4Options()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }
    public function getPage5Options()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

}
