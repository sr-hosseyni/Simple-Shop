<?php
namespace BCS\Entities\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Description of InvitationRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class AttributeRepository extends BaseRepository
{
    public function model()
    {
        return 'BCS\Entities\CategoryAttribute';
    }
}
