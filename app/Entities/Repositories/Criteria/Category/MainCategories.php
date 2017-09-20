<?php

namespace BCS\Entities\Repositories\Criteria\Category;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Description of ActiveInvitations
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
final class MainCategories implements CriteriaInterface
{

    /**
     * @param Builder $model
     * @param Repository $repository
     * @return Model
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereNull('parent_id');
    }
}
