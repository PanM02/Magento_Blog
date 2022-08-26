<?php declare(strict_types=1);

namespace Orba\BlogExtra\Plugin;
use Magento\Framework\App\RequestInterface;
use Orba\Blog\Controller\Post\Detail;

class AlternatePostDetailTemplate
{
    public function __construct(
        private RequestInterface $request
    )
    {
    }

    public function afterExecute(
        Detail $subject,
        $result
    )
    {
        if ($this->request->getParam('alternate'))
        {
            $result->getLayout()->getBlock('blog.post.detail')->getTemplate('Orba_BlogExtra::post/detail.php');
        }

        return $result;
    }
}
