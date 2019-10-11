<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Event extends ComponentBase
{
    public $schemaEvent;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Event',
            'description' => 'Add structured data about your event.'
        ];
    }

    public function defineProperties()
    {
        return [
            'name' => [
                'title'             => 'Name',
                'description'       => 'Name of the event.',
                'default'           => '{{ :record.name }}',
            ],
            'image' => [
                'title'             => 'Image',
                'description'       => 'Reference to image(s) object.',
            ],
            'description' => [
                'title'             => 'Description',
                'description'       => 'The main content of the event.',
            ],
            'startDate' => [
                'title'             => 'Start date',
                'description'       => 'When the event start.',
                'group'             => 'Dates',
            ],
            'endDate' => [
                'title'             => 'End date',
                'description'       => 'When the event finish.',
                'group'             => 'Dates',
            ],
            'locationName' => [
                'title'             => 'Location name',
                'group'             => 'Location',
                'description'       => 'If the location is a famous place, you can specify it\'s name.'
            ],
            'streetAddress' => [
                'title'             => 'Street address',
                'group'             => 'Location',
            ],
            'addressLocality' => [
                'title'             => 'Locality',
                'group'             => 'Location',
            ],
            'postalCode' => [
                'title'             => 'Postal code',
                'group'             => 'Location',
            ],
            'addressRegion' => [
                'title'             => 'Region',
                'description'       => 'Region code in ISO 3166-1 format.',
                'group'             => 'Location',
            ],
            'addressCountry' => [
                'title'             => 'Country',
                'description'       => 'Country code ISO 3166-1 format.',
                'group'             => 'Location',
            ],
            'offerPrice' => [
                'title'             => 'Price',
                'description'       => 'Number without currency.',
                'group'             => 'Offer',
            ],
            'offerCurrency' => [
                'title'             => 'Currency',
                'description'       => 'Currency in ISO 4217 format.',
                'group'             => 'Offer',
            ],
            'offerAvailability' => [
                'title'             => 'Availability',
                'type'              => 'dropdown',
                'group'             => 'Offer',
                'options'           => [
                    'https://schema.org/InStock' => 'In stock',
                    'https://schema.org/SoldOut' => 'Sold out',
                    'https://schema.org/PreOrder' => 'Pre order',
                ],
            ],
            'validFrom' => [
                'title'             => 'Valid from',
                'description'       => 'When the purchase start',
                'group'             => 'Offer',
            ],
            'performerType' => [
                'title'             => 'Performer type',
                'type'              => 'dropdown',
                'placeholder'       => 'Choose',
                'options'           => [
                    'Person' => 'Person',
                    'PerformingGroup' => 'PerformingGroup',
                ],
                'description'       => 'Indicate the performer type.',
                'group'             => 'Performer',
            ],
            'performerName' => [
                'title'             => 'Performer name',
                'description'       => 'Indicate the performer name',
                'group'             => 'Performer',
            ],
        ];
    }

    public function onRender() {
        $this->schemaEvent = $this->page['schemaEvent'] = ComponentHelper::getDynamicProperties($this, $this->page);
    }

}
