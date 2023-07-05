<?php
namespace Bidder\CustomerAgreement\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Exception\LocalizedException;

class CheckAgreement implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $accountController = $observer->getAccountController();
        $request = $accountController->getRequest();

        if (!$request->getParam('agreement')) {
            throw new LocalizedException(__('Please accept the terms and conditions.'));
        }
    }
}

