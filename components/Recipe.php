<?php namespace Publipresse\Schema\Components;

use Cms\Classes\ComponentBase;
use Publipresse\Schema\Classes\ComponentHelper;

class Recipe extends ComponentBase
{
    public $schemaRecipe;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Recipe',
            'description' => 'Add structured data about your recipe.'
        ];
    }

    public function defineProperties()
    {
        return [
            'name' => [
                'title'             => 'Name',
                'description'       => 'Name of the recipe.',
                'default'           => '{{ :record.name }}',
            ],
            'description' => [
                'title'             => 'Description',
                'description'       => 'Short description of the recipe',
            ],
            'keywords' => [
                'title'             => 'Keywords',
                'description'       => 'Some keywords about the recipe.',
            ],
            'image' => [
                'title'             => 'Image',
                'description'       => 'Reference to image(s) object.',
            ],
            'recipeIngredient' => [
                'title'             => 'Ingredients',
                'description'       => 'Reference to the ingredients field',
           ],
            'recipeInstructions' => [
                'title'             => 'Instructions',
                'description'       => 'Reference to the instructions field',
            ],
            'datePublished' => [
                'title'             => 'Published date',
                'description'       => 'The date and time the recipe was first published.',
            ],
            'prepTime' => [
                'title'             => 'Preparation time',
                'group'             => 'Recipe informations',
                'description'       => 'Preparation time in minutes.',
            ],
            'cookTime' => [
                'title'             => 'Cooking time',
                'group'             => 'Recipe informations',
                'description'       => 'Cooking time in minutes.',
            ],
            'totalTime' => [
                'title'             => 'Total time',
                'group'             => 'Recipe informations',
                'description'       => 'Total time in minutes.',
            ],
            'recipeYield' => [
                'title'             => 'Yields',
                'group'             => 'Recipe informations',
            ],
            'recipeCategory' => [
                'title'             => 'Category',
                'group'             => 'Recipe informations',
            ],
            'recipeCuisine' => [
                'title'             => 'Type of cuisine',
                'group'             => 'Recipe informations',
            ],
            'recipeCalories' => [
                'title'             => 'Calories',
                'description'       => 'Number of calories per serving.',
                'group'             => 'Recipe informations',
            ],
            'authorType' => [
                'title'             => 'Type',
                'type'              => 'dropdown',
                'group'             => 'Author',
                'description'       => 'Type of the author',
                'placeholder'       => 'Choose',
                'options'           => [
                    'Organization' => 'Organization',
                    'Person'       => 'Person',
                ],
            ],
            'authorName' => [
                'title'             => 'Name',
                'description'       => 'Name of the author.',
                'group'             => 'Author',
            ],
            'reviews' => [
                'title'             => 'Reviews',
                'description'       => 'Refer the reviews collection',
                'group'             => 'Reviews',
            ],
            'ratingField' => [
                'title'             => 'Rating field',
                'description'       => 'Name of the field that handle the note from 1 to 5',
                'group'             => 'Reviews',
            ],
        ];
    }

    public function onRender() {
        $schema = ComponentHelper::getDynamicProperties($this, $this->page);
        $schema['recipeIngredient'] = ComponentHelper::convertToArray($schema['recipeIngredient']);
        $schema['recipeInstructions'] = ComponentHelper::convertToArray($schema['recipeInstructions']);
        $this->schemaRecipe = $this->page['schemaRecipe'] = $schema;
    }

}
