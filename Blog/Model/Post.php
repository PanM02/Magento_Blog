<?php declare(strict_types=1);
namespace Orba\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use Orba\Blog\Api\Data\PostInterface;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Post::class);
    }

    public function getTitle()
    {
        $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE,$title);
    }

    public function getContent()
    {
        $this->getData(self::CONTENT);
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT,$content);    }

    public function getCreateAt()
    {
        $this->getData(self::CREATE_AT);
    }
}
