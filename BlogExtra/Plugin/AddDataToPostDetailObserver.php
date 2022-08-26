<?php declare(strict_types=1);
namespace Orba\BlogExtra\Plugin;
use Magento\Framework\Event\Observer;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Orba\Blog\Observer\LogPostDetailView;

class AddDataToPostDetailObserver
{
    public function __construct(
        private TimezoneInterface $timezone,

    )
    {

    }

    public function beforExecute(
        LogPostDetailView $subject,
        Observer $observer
    ){
        $request=$observer->getData('request');
        $request->setParam('datetime', $this->timezone->date());
        return [$observer];

    }
}
