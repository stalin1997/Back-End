<?php

namespace App\Models\Cecy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\App\Course;
use App\Models\App\File;
use App\Models\App\Status;


/**
 * @property BigInteger id
 * @property string description
 */

class Prerequisite extends Model implements Auditable
{
    use HasFactory;
    use Auditing;
    use SoftDeletes;

    protected static $instance;

    protected $witch=['files'];

    protected $connection = 'pgsql-cecy';
    protected $table = 'cecy.prerequisites';


    protected $casts = [
        'deleted_at'=>'date:Y-m-d h:m:s',
        'created_at'=>'date:Y-m-d h:m:s',
        'updated_at'=>'date:Y-m-d h:m:s',
    ];

    public static function getInstance($id)
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        static::$instance->id = $id;
        return static::$instance;
    }

    // Relationships
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function state()
    {
        return $this->belongsTo(Status::class);
    }

    public function parentCode()
    {
        return $this->belongsTo(Prerequisite::class);
    }

    // Accessors
    public $timestamps = false;
    

    // Mutators
    

    // Scopes

    
      


    
}
