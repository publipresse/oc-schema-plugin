<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Publipresse\Schema\Classes\ComponentHelper;

class Business extends ComponentBase
{
    public $schemaBusiness;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Business',
            'description' => 'Add structured data to your local business.'
        ];
    }

    public function defineProperties()
    {
        return [
            'type' => [
                'title'             => 'Type',
                'type'              => 'dropdown',
                'description'       => 'Type of the business.',
                'options'           => [
                    'LocalBusiness' => 'LocalBusiness',
                    'Restaurant' => 'Restaurant',
                    'DaySpa' => 'DaySpa',
                    'HealthClub' => 'HealthClub',
                ],
                'showExternalParam' => false,
            ],
            'name' => [
                'title'             => 'Name',
                'description'       => 'Name of the business.',
                'default'           => '{{ :record.name }}',
            ],
            'telephone' => [
                'title'             => 'Telephone',
                'description'       => 'Phone number, in international format'
            ],
            'priceRange' => [
                'title'             => 'Price range',
                'type'              => 'dropdown',
                'placeholder'       => 'Choose',
                'options'           => [
                    '$' => 'Cheap',
                    '$$' => 'Moderate',
                    '$$$' => 'Expensive',
                ],

            ],
            'image' => [
                'title'             => 'Image',
                'description'       => 'Reference to image(s) object.',
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
            'geoLatitude' => [
                'title'             => 'Latitude',
                'group'             => 'Location',
            ],
            'geoLongitude' => [
                'title'             => 'Longitude',
                'group'             => 'Location',
            ],
            'openingHoursMonday' => [
                'title'             => 'Monday',
                'type'              => 'stringList',
                'group'             => 'Opening hours',
                'default'           => ['09:00', '18:00'],
                'description'       => 'If closed all day, indicate 00:00 - 00:00',
            ],
            'openingHoursTuesday' => [
                'title'             => 'Tuesday',
                'type'              => 'stringList',
                'group'             => 'Opening hours',
                'default'           => ['09:00', '18:00'],
                'description'       => 'If closed all day, indicate 00:00 - 00:00',
            ],
            'openingHoursWednesday' => [
                'title'             => 'Wednesday',
                'type'              => 'stringList',
                'group'             => 'Opening hours',
                'default'           => ['09:00', '18:00'],
                'description'       => 'If closed all day, indicate 00:00 - 00:00',
            ],
            'openingHoursThursday' => [
                'title'             => 'Thursday',
                'type'              => 'stringList',
                'group'             => 'Opening hours',
                'default'           => ['09:00', '18:00'],
                'description'       => 'If closed all day, indicate 00:00 - 00:00',
            ],
            'openingHoursFriday' => [
                'title'             => 'Friday',
                'type'              => 'stringList',
                'group'             => 'Opening hours',
                'default'           => ['09:00', '18:00'],
                'description'       => 'If closed all day, indicate 00:00 - 00:00',
            ],
            'openingHoursSaturday' => [
                'title'             => 'Saturday',
                'type'              => 'stringList',
                'group'             => 'Opening hours',
                'default'           => ['00:00', '00:00'],
                'description'       => 'If closed all day, indicate 00:00 - 00:00',
            ],
            'openingHoursSunday' => [
                'title'             => 'Sunday',
                'type'              => 'stringList',
                'group'             => 'Opening hours',
                'default'           => ['00:00', '00:00'],
                'description'       => 'If closed all day, indicate 00:00 - 00:00',
            ],
            'menu' => [
                'title'             => 'Menu',
                'type'              => 'dropdown',
                'placeholder'       => 'Choose',
                'group'             => 'Restaurant',
                'description'       => 'Page in which you can find the menu',
            ],
            'servesCuisine' => [
                'title'             => 'Served cuisine',
                'group'             => 'Restaurant',
                'description'       => 'The cuisine of the restaurant.',
            ],

        ];
    }

    public function onRender() 
    {
        $this->schemaBusiness = $this->page['schemaBusiness'] = ComponentHelper::getDynamicProperties($this, $this->page);
    }

    public function getMenuOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

}
