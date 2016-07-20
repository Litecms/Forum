<?php

namespace Litecms\Forum\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ForumItemPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ForumItemTransformer();
    }
}
