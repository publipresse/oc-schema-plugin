<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Article extends ComponentBase
{
    public $schemaArticle;

    public function componentDetails()
    {
        return [
            'name'        => 'Article',
            'description' => 'Add structured data about your blog post.'
        ];
    }

    public function defineProperties()
    {
        return [
            'headline' => [
                'title'             => 'Headline',
                'description'       => 'Title of the article.',
                'default'           => '{{ :record.name }}',
            ],
            'image' => [
                'title'             => 'Image',
                'description'       => 'Reference to image(s) object.',
            ],
            'articleBody' => [
                'title'             => 'Body',
                'description'       => 'The main content of the article.',
            ],
            'datePublished' => [
                'title'             => 'Published date',
                'description'       => 'The date and time the article was first published.',
                'group'             => 'Dates',
            ],
            'dateModified' => [
                'title'             => 'Modified date',
                'description'       => 'The date and time the article was last modified.',
                'group'             => 'Dates',
            ],
            'authorType' => [
                'title'             => 'Author type',
                'description'       => 'The type of the author.',
                'type'              => 'dropdown',
                'group'             => 'Author',
                'options'           => [
                    'Organization'      => 'Organization', 
                    'Person'            => 'Person',
                ],
                'default'           => 'Organization',
            ],
            'authorName' => [
                'title'             => 'Author name',
                'description'       => 'The name of the author.',
                'group'             => 'Author',
            ],
            'publisherName' => [
                'title'             => 'Publisher name',
                'description'       => 'The name of the publisher.',
                'group'             => 'Publisher',
            ],
            'publisherLogo' => [
                'title'             => 'Publisher logo',
                'description'       => 'Path to the publisher logo (relative to theme path).',
                'group'             => 'Publisher',
                'default'           => 'assets/img/logo.png'
            ],
        ];
    }

    public function onRender() {
        $this->schemaArticle = $this->page['schemaArticle'] = ComponentHelper::getDynamicProperties($this, $this->page);
    }

}
