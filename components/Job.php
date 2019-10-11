<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Job extends ComponentBase
{
    public $schemaJob;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Job',
            'description' => 'Adding structured data about your job offer.'
        ];
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'Title',
                'description'       => 'Title of the job offer.',
                'default'           => '{{ :record.name }}',
            ],
            'description' => [
                'title'             => 'Description',
                'description'       => 'The main content of the job offer.',
            ],
            'employmentType' => [
                'title'             => 'Employment type',
                'type'              => 'dropdown',
                'description'       => 'Type of job time',
                'placeholder'       => 'Choose',
                'options'           => [
                    'FULL_TIME' => 'Full time',
                    'PART_TIME' => 'Part time',
                    'CONTRACTOR' => 'Contractor',
                    'TEMPORARY' => 'Temporary',
                    'INTERN' => 'Intern',
                    'VOLUNTEER' => 'Volunteer',
                    'PER_DIEM' => 'Per diem',
                    'OTHER' => 'Other',
                ],
            ],
            'datePosted' => [
                'title'             => 'Date posted',
                'description'       => 'The date the employer posted the job.',
                'group'             => 'Dates',
            ],
            'validThrough' => [
                'title'             => 'Valid through',
                'description'       => 'The date when the job offer expire.',
                'group'             => 'Dates',
            ],
            'hiringOrganizationName' => [
                'title'             => 'Name',
                'description'       => 'Name of the company proposing the job.',
                'group'             => 'Hiring organization',
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
            'baseSalaryValue' => [
                'title'             => 'Value',
                'description'       => 'Number without currency.',
                'group'             => 'Salary',
            ],
            'baseSalaryCurrency' => [
                'title'             => 'Currency',
                'description'       => 'Currency in ISO 4217 format.',
                'group'             => 'Salary',
            ],
            'baseSalaryUnit' => [
                'title'             => 'Unit',
                'type'              => 'dropdown',
                'description'       => 'The price above is for how many times ?',
                'placeholder'       => 'Choose',
                'group'             => 'Salary',
                'options'           => [
                    'HOUR' => 'Hour',
                    'DAY' => 'Day',
                    'WEEK' => 'Week',
                    'MONTH' => 'Month',
                    'YEAR' => 'Year',
                ],
            ],
        ];
    }

    public function onRender() {
        $this->schemaJob = $this->page['schemaJob'] = ComponentHelper::getDynamicProperties($this, $this->page);
    }

}
