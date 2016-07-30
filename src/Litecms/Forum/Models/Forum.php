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
use Litepie\User\Traits\UserModel;

class Forum extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Trans, Revision, PresentableTrait, UserModel;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'package.forum.forum';


    public function category()
    {

        return $this->belongsTo('Litecms\Forum\Models\Category', 'category_id');
    }

    public function parent()
    {

        return $this->belongsTo('Litecms\Forum\Models\Forum', 'parent_id');
    }
}
