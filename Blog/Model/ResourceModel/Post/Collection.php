<?php declare(strict_types=1);
namespace Orba\Blog\Model\ResourceModel\Post;

use Orba\Blog\Model\Post;
use Orba\Blog\Model\ResourceModel\Post as PostResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class,PostResourceModel::class);
    }
}
