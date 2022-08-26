<?php declare(strict_types=1);
namespace Orba\Blog\Setup\Patch\Data;
use Orba\Blog\Api\PostRepositoryInterface;
use Orba\Blog\Model\PostFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class BloogPot2 implements DataPatchInterface
{
    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private PostFactory $postFactory,
        private PostRepositoryInterface $postRepository,
    )
    {}
    public static function getDependencies():array
    {
        return[];
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
            'title'=>"today is sunny",
            'content'=>'dzisiaj jest słonecznie',
        ]);
        $this->postRepository->save($post);
        $this->moduleDataSetup->endSetup();


    }
}
