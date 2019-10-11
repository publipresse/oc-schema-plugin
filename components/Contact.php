<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Contact extends ComponentBase
{
    public $schemaContact;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Contact',
            'description' => 'Add structured data about your contact informations.',
        ];
    }

    public function defineProperties()
    {
        for($i = 1; $i <= 5; $i++) {
            $properties['telephone'.$i] = [
                'title' => 'Phone',
                'group' => 'Contact '.$i,
                'description' => 'Phone number with international prefix. (ex: +330605040602',
                'showExternalParam' => false,
            ];
            $properties['contactType'.$i] = [
                'title' => 'Type',
                'group' => 'Contact '.$i,
                'type'  => 'dropdown',
                'options' => [
                    'customer service' => 'Customer service',
                    'technical support' => 'Technical support',
                    'bill payment' => 'Bill payment',
                    'sales' => 'Sales',
                    'reservations' => 'Reservations',
                    'credit card support' => 'Credit card support',
                    'emergency' => 'Emergency',
                    'baggage tracking' => 'Baggage tracking',
                    'roadside assistance' => 'Roadside assistance',
                    'package tracking' => 'Package tracking',
                ],
                'description' => 'The type of service delivered by that phone number.',
                'showExternalParam' => false,
            ];
            $properties['availableLanguage'.$i] = [
                'title' => 'Available languages',
                'type'  => 'stringList',
                'group' => 'Contact '.$i,
                'description' => 'Spoken languages, one per line, in english format (ex: French). If empty, the default language is English',
                'showExternalParam' => false,
            ];
            $properties['areaServed'.$i] = [
                'title' => 'Area served',
                'type' => 'stringList',
                'group' => 'Contact '.$i,
                'description' => 'Area served by this phone number, one per line, in ISO-3166 format (ex: FR). If empty, the phone number is considered as international',
                'showExternalParam' => false,
            ];
        }
        return $properties;
    }

    public function onRun() {
        $this->schemaContact = $this->page['schemaContact'] = ComponentHelper::groupProperties($this->getProperties());
    }
}
