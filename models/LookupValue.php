<?php namespace Bombozama\OTLT\Models;

use Model;

class LookupValue extends Model
{
    use \October\Rain\Database\Traits\Nullable;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Validation;

    # Override if necessary
    public static $listConfigPath = '$/bombozama/otlt/models/lookupvalue/columns.yaml';
    public static $formConfigPath = '$/bombozama/otlt/models/lookupvalue/fields.yaml';

    protected $nullable = [
        'extra',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public $rules = [
        'name' => 'required',
    ];

    public $table = 'bombozama_otlt_lookupvalues';

    protected $guarded = [];

    public function beforeCreate()
    {
        # Set the lookupvalue category
        $this->category = snake_case(class_basename($this));

        # Set the lookupvalue slug
        if($this->slug == '')
            $this->slug = snake_case($this->name);
        else
            $this->slug = snake_case($this->slug);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function getSelectInputData()
    {
        return LookupValue::where('category', snake_case(class_basename($this)))
                    ->get()
                    ->pluck('name', 'id')
                    ->toArray();
    }

    public static function getListConfigPath()
    {
        return self::$listConfigPath;
    }

    public static function getFormConfigPath()
    {
        return self::$formConfigPath;
    }
}
