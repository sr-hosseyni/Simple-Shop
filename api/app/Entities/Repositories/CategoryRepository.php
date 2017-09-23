<?php
namespace BCS\Entities\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Description of InvitationRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class CategoryRepository extends BaseRepository
{
    public function model()
    {
        return 'BCS\Entities\Category';
    }
}
