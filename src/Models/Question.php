<?php

namespace Litecms\Forum\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Database\Traits\DateFormatter;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Trans\Traits\Translatable;
class Question extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, DateFormatter, PresentableTrait;


    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.forum.question.model';


    /**
     * The category that belong to the question.
     */
    public function category()
    {
        return $this->hasOne('Litecms\Forum\Models\Category', 'id', 'category_id');
    }


    /**
     * The response that belong to the question.
     */
    public function responses()
    {
        return $this->hasMany('Litecms\Forum\Models\Response')->orderBy('best_answer', 'ASC');
    }

    /**
     * The response that belong to the question.
     */
    public function user()
    {
        return $this->morphTo();
    }
}
