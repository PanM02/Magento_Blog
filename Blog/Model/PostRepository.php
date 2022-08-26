<?php
declare(strict_types=1);
namespace Orba\Blog\Model;
use ICanBoogie\Inflections\tr;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Orba\Blog\Api\Data\PostInterface;
use Orba\Blog\Api\PostRepositoryInterface;
use Orba\Blog\Model\ResourceModel\Post as PostResourceModel;
class PostRepository implements PostRepositoryInterface
{
    public function __construct(
        private PostFactory $postFactory,
        private PostResourceModel $postResourceModel,
    )
    {

    }

    public function getById(int $id): PostInterface
    {
        $post=$this->postFactory->create();
        $this->postResourceModel->load($post, $id);
        if (!$post->getId())
        {
            throw new NoSuchEntityException(__('The blog post with "%1" ID doesnt exist',$id));
        }
        return $post;
    }

    public function save(PostInterface $post): PostInterface
    {
        try {
            $this->postResourceModel->save($post);
        } catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $post;
    }

    public function deleteById(int $id): bool
    {
        $post = $this->getById($id);
        try {
            $this->postResourceModel->delete($post);
        }catch (\Exception $exception){
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }
}
