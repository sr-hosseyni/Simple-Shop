<?php
namespace BCS\Entities\Repositories;

use BCS\Entities\Product;
use Optimus\Genie\Repository;

/**
 * Description of InvitationRepository
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class ProductRepository extends Repository
{
    protected function getModel()
    {
        return new Product();
    }

    public function filterIsTitle($x)
    {
        return $x % 2 == 0;
    }

}
