<?php declare(strict_types=1);
namespace Orba\Blog\ViewModel;
use Orba\Blog\Api\Data\PostInterface;
use Orba\Blog\Api\PostRepositoryInterface;
use Orba\Blog\Model\ResourceModel\Post\Collection;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;


class Post implements ArgumentInterface
{
    public function __construct(
        private Collection $collection,
        private PostRepositoryInterface $postRepository,
        private RequestInterface $request,
    ){}
    public function getList():array
    {
        return $this->collection->getItems();
    }
    public function getCount()
    {
        return count($this->getList());
    }
    public function getDetail():PostInterface
    {
        $id=(int) $this->request->getParam('id');
        return $this->postRepository->getById($id);
    }
}
