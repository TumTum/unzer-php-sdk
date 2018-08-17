<?php
/**
 * Description
 *
 * @license Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present heidelpay GmbH. All rights reserved.
 *
 * @link  http://dev.heidelpay.com/
 *
 * @author  Simon Gabriel <development@heidelpay.de>
 *
 * @package  heidelpay/${Package}
 */
namespace heidelpay\NmgPhpSdk\PaymentTypes;

use heidelpay\NmgPhpSdk\AbstractHeidelpayResource;
use heidelpay\NmgPhpSdk\PaymentInterface;
use heidelpay\NmgPhpSdk\TransactionTypes\Authorization;
use heidelpay\NmgPhpSdk\TransactionTypes\Charge;

abstract class BasePaymentType extends AbstractHeidelpayResource implements PaymentTypeInterface, PaymentInterface
{
    private $chargeable = false;
    private $authorizable = false;
    private $cancelable = false;

    //<editor-fold desc="Getters/Setters">
    /**
     * @return bool
     */
    public function isChargeable(): bool
    {
        return $this->chargeable;
    }

    /**
     * @param bool $chargeable
     * @return BasePaymentType
     */
    public function setChargeable(bool $chargeable): BasePaymentType
    {
        $this->chargeable = $chargeable;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAuthorizable(): bool
    {
        return $this->authorizable;
    }

    /**
     * @param bool $authorizable
     * @return BasePaymentType
     */
    public function setAuthorizable(bool $authorizable): BasePaymentType
    {
        $this->authorizable = $authorizable;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCancelable(): bool
    {
        return $this->cancelable;
    }

    /**
     * @param bool $cancelable
     * @return BasePaymentType
     */
    public function setCancelable(bool $cancelable): BasePaymentType
    {
        $this->cancelable = $cancelable;
        return $this;
    }
    //</editor-fold>

    //<editor-fold desc="Transactions">
    /**
     * {@inheritDoc}
     */
    public function charge($amount = null, $currency = null, $returnUrl = null): Charge
    {
        $payment = $this->getHeidelpayObject()->getOrCreatePayment();
        return $payment->charge($amount, $currency, $returnUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function authorize($amount, $currency, $returnUrl): Authorization
    {
        $payment = $this->getHeidelpayObject()->getOrCreatePayment();
        return $payment->authorize($amount, $currency, $returnUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function cancel($amount = null)
    {
        $payment = $this->getHeidelpayObject()->getOrCreatePayment();
        return $payment->cancel($amount);
    }
    //</editor-fold>

    //<editor-fold desc="Amount">
    public function getTotal(): float
    {
        $payment = $this->getPayment();
        return $payment ? $payment->getTotal() : 0.0;
    }

    public function getRemaining(): float
    {
        $payment = $this->getPayment();
        return $payment ? $payment->getRemaining() : 0.0;
    }

    public function getCharged(): float
    {
        $payment = $this->getPayment();
        return $payment ? $payment->getCharged() : 0.0;
    }

    public function getCanceled(): float
    {
        $payment = $this->getPayment();
        return $payment ? $payment->getCanceled() : 0.0;
    }
    //</editor-fold>
}
