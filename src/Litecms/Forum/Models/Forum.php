<?php

namespace Litecms\Forum\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Trans;

class Forum extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Trans, Revision, PresentableTrait;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'package.forum.forum';

    public function user()
    {

        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {

        return $this->belongsTo('Litecms\Forum\Models\Category', 'category_id');
    }

    public function parent()
    {

        return $this->belongsTo('Litecms\Forum\Models\Forum', 'parent_id');
    }
}
