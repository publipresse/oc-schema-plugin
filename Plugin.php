<?php namespace Publipresse\Schema;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name' => 'publipresse.schema::lang.plugin.name',
            'description' => 'publipresse.schema::lang.plugin.description',
            'author' => 'Publipresse',
            'icon' => 'icon-code'
        ];
    }

    public function registerComponents()
    {
        return [
            'Publipresse\Schema\Components\Name' => 'schemaName',
            'Publipresse\Schema\Components\Logo' => 'schemaLogo',
            'Publipresse\Schema\Components\Article' => 'schemaArticle',
            'Publipresse\Schema\Components\Breadcrumb' => 'schemaBreadcrumb',
            'Publipresse\Schema\Components\Contact' => 'schemaContact',
            'Publipresse\Schema\Components\Course' => 'schemaCourse',
            'Publipresse\Schema\Components\Event' => 'schemaEvent',
            'Publipresse\Schema\Components\Job' => 'schemaJob',
            'Publipresse\Schema\Components\Business' => 'schemaBusiness',
            'Publipresse\Schema\Components\Product' => 'schemaProduct',
            'Publipresse\Schema\Components\Faq' => 'schemaFaq',
            'Publipresse\Schema\Components\Recipe' => 'schemaRecipe',
            'Publipresse\Schema\Components\Review' => 'schemaReview',
        ];
    }

    public function registerSettings()
    {
    }
}
