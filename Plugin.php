<?php namespace Bombozama\OTLT;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'bombozama.otlt::lang.plugin.name',
            'description' => 'bombozama.otlt::lang.plugin.description',
            'author'      => 'Gonzalo Henríquez',
            'icon'        => 'icon-database',
            'homepage'    => 'https://github.com/bombozama/otlt-plugin'
        ];
    }

    public function registerPermissions()
    {
        return [
            'bombozama.otlt.manage_lookupvalues' => [
                'tab' => 'bombozama.otlt::lang.plugin.name',
                'label' => 'bombozama.otlt::lang.permissions.manage_lookupvalues'
            ],
        ];
    }
}