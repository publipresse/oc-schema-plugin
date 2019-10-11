<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Review extends ComponentBase
{

    public $schemaReview; 

    public function componentDetails()
    {
        return [
            'name'        => 'Review',
            'description' => 'Add structured data about your reviews.'
        ];
    }

    public function defineProperties()
    {
        return [
            'itemReviewedType' => [
                'title'             => 'Item reviewed type',
                'description'       => 'Type of the item reviewed, must be a schema.org valid type.',
            ],
            'itemReviewedName' => [
                'title'             => 'Item reviewed name',
                'description'       => 'Name of the item reviewed.',
            ],
            'reviews' => [
                'title'             => 'Reviews',
                'description'       => 'Variable containing all reviews',
            ],
            'ratingField' => [
                'title'             => 'Rating field',
                'description'       => 'Name of the field used for rating, should contain a note from 1 to 5.',
                'showExternalParam' => false,
            ],
            'bestRating' => [
                'title'             => 'Best rating',
                'description'       => 'Best rating possible value',
                'default'           => 5,
            ],
            'authorName' => [
                'title'             => 'Author field',
                'description'       => 'Name of the field user for author name.',
                'showExternalParam' => false,
            ],
        ];
    }

    public function onRender() {
        $reviews = ComponentHelper::getDynamicProperties($this, $this->page);
        $this->schemaReview = $this->page['schemaReview'] = $reviews;
    }

}
