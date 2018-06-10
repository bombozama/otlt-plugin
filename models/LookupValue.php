<?php namespace Bombozama\OTLT\Models;

use Model;
use BackendAuth;

class LookupValue extends Model
{
    use \October\Rain\Database\Traits\Nullable;
    use \October\Rain\Database\Traits\Revisionable;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Validation;

    # Override if necessary
    public static $listConfigPath = '$/bombozama/otlt/models/lookupvalue/columns.yaml';
    public static $formConfigPath = '$/bombozama/otlt/models/lookupvalue/fields.yaml';

    protected $revisionable = [
        'name',
        'extra',
        'is_published'
    ];

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

    public $belongsTo = [
        'user' => [
            'Backend\Models\User',
            'key' => 'user_id'
        ],
    ];

    public $morphMany = [
        'revision_history' => [
            'System\Models\Revision',
            'name' => 'revisionable'
        ],
    ];

    public function beforeCreate()
    {
        # Set the lookupvalue category
        $this->category = snake_case(class_basename($this));

        # Set the lookupvalue slug
        $this->slug = snake_case($this->name);

        # Set the lookupvalue creator user_id
        $user = BackendAuth::getUser();
        if($user)
            $this->user_id = $user->id;
    }

    public function getRevisionableUser()
    {
        return BackendAuth::getUser()->id;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
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
