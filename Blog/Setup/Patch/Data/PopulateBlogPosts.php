<?php declare(strict_types=1);
namespace Orba\Blog\Setup\Patch\Data;
use Orba\Blog\Api\PostRepositoryInterface;
use Orba\Blog\Model\PostFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class PopulateBlogPosts implements DataPatchInterface
{
    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private PostFactory $postFactory,
        private PostRepositoryInterface $postRepository,
    )
    {}
    public static function getDependencies():array
    {
        return[\Orba\Blog\Setup\Patch\Data\BloogPot2::class];
    }

    public function getAliases():array
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $post=$this->postFactory->create();
        $post->setData([
            'title'=>"Any awasome post",
            'content'=>'jakis fajny post',
        ]);
        $this->postRepository->save($post);
        $this->moduleDataSetup->endSetup();


    }
}
