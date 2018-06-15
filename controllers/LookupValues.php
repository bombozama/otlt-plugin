<?php namespace Bombozama\OTLT\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Lang;
use System\Classes\SettingsManager;

class LookupValues extends Controller
{
    public $currentModel;
    public $langPath = 'bombozama.otlt::lang';
    public $currentPlugin = 'Bombozama.OTLT';
    public $mainMenu = 'lookupvalues';
    public $asSetting = true;

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['bombozama.otlt.manage_lookupvalues'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext($this->currentPlugin, $this->mainMenu, snake_case(class_basename($this)));

        if($this->asSetting){
            SettingsManager::setContext('October.Backend', snake_case(class_basename($this)));
        }
    }

    /**
     * ListController overrides
     */
    public function index($model_name = 'lookupvalue')
    {
        $this->viewAdjustments($model_name);

        # Setup the page title
        $this->pageTitle = $this->vars['plural'];

        return $this->asExtension('ListController')->index();
    }

    public function listExtendModel($model, $definition = null)
    {
        if($this->currentModel != ''){
            $lookupValueModel = new $this->currentModel;
            return $lookupValueModel;
        } else {
            return $model;
        }
    }

    /**
     * FormController overrides
     */
    public function create($model_name = 'lookupvalue', $context = null)
    {
        $this->viewAdjustments($model_name);

        # Setup the page title
        $this->pageTitle = Lang::get('bombozama.otlt::lang.views.create') . ' ' . $this->vars['singular'];

        return $this->asExtension('FormController')->create($context);
    }

    public function create_onSave($context = null)
    {
        $model_name = post('model_name', 'lookupvalue');
        if($model_name == 'lookupvalue')
            $this->currentModel = '\Bombozama\OTLT\Models\LookupValue';
        else
            $this->currentModel = $this->getModelFromUrl($model_name);
        return $this->asExtension('FormController')->create_onSave($context);
    }

    public function update($model_name = 'lookupvalue', $recordId = null, $context = null)
    {
        $this->viewAdjustments($model_name);

        # Setup the page title
        $this->pageTitle = Lang::get('bombozama.otlt::lang.views.update') . ' ' . $this->vars['singular'];

        return $this->asExtension('FormController')->update($recordId, $context);
    }

    public function update_onSave($model = 'lookupvalue', $recordId = null, $context = null)
    {
        $model_name = post('model_name', 'lookupvalue');
        if($model_name == 'lookupvalue')
            $this->currentModel = '\Bombozama\OTLT\Models\LookupValue';
        else
            $this->currentModel = $this->getModelFromUrl($model_name);
        return $this->asExtension('FormController')->update_onSave($recordId, $context);
    }

    public function formCreateModelObject()
    {
        return $this->createLookupValueModel();
    }

    protected function createLookupValueModel()
    {
        $model = new $this->currentModel;
        return $model;
    }

    /**
     * Helpers
     */
    protected function viewAdjustments($model_name)
    {
        # Require specific permissions for data-pair form
        $this->requiredPermissions[] = 'bombozama.otlt.manage_' . $model_name;

        # Setup view vars
        $this->vars['model_name'] = $model_name;
        $this->vars['plural'] =  $this->getString($model_name, 'plural');
        $this->vars['singular'] =  $this->getString($model_name, 'singular');

        # Use the referenced model instead of the abstract class
        $this->currentModel = $this->getModelFromUrl($model_name);
    }

    /**
     * Define in your plugin so that it returns your model namespace
     * @param $snake_case_model_name
     * @return string
     *
    public function getModelFromUrl($snake_case_model_name)
    {
        return '\Acme\Plugin\Models\\' . studly_case($snake_case_model_name);
    }
     */

    public function getString($snake_case_model_name, $str_key)
    {
        return Lang::get(sprintf('%s.models.%s.%s', $this->langPath, $snake_case_model_name, $str_key));
    }

    public function listExtendQueryBefore($query)
    {
        if($this->currentModel != '')
            $query->where('category', snake_case(class_basename($this->currentModel)));
    }
}