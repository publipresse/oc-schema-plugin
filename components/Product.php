<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Product extends ComponentBase
{
    public $schemaProduct;

    public function componentDetails()
    {
        return [
            'name'        => 'Product',
            'description' => 'Adding structured data about your product.'
        ];
    }

    public function defineProperties()
    {
        return [
            'name' => [
                'title'             => 'Name',
                'description'       => 'Name of the product.',
                'default'           => '{{ :record.name }}',
            ],
            'image' => [
                'title'             => 'Image',
                'description'       => 'Reference to image(s) object.',
            ],
            'description' => [
                'title'             => 'Description',
                'description'       => 'The main description of the product.',
            ],
            'sku' => [
                'title'             => 'Sku',
                'description'       => 'Sku of the product',
            ],
            'mpn' => [
                'title'             => 'Mpn',
                'description'       => 'Mpn of the product',
            ],
            'brand' => [
                'title'             => 'Brand',
                'description'       => 'Brand of the product',
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
            'validUntil' => [
                'title'             => 'Valid from',
                'description'       => 'When the offer end',
                'group'             => 'Offer',
            ],
            'sellerName' => [
                'title'             => 'Seller name',
                'description'       => 'Name of the seller',
                'group'             => 'Offer',
            ],
            'reviews' => [
                'title'             => 'Reviews',
                'description'       => 'Refer the reviews collection',
                'group'             => 'Reviews',
                'default'           => '{{ :record.reviews }}',
            ],
            'ratingField' => [
                'title'             => 'Rating field',
                'description'       => 'Name of the field that handle the note from 1 to 5',
                'group'             => 'Reviews',
            ],
        ];
    }

    public function onRender() {
        $this->schemaProduct = $this->page['schemaProduct'] = ComponentHelper::getDynamicProperties($this, $this->page);
    }

}
