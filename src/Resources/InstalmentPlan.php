<?php
/**
 * Resource representing the installment plan for hire purchase (FlexiPay Rate).
 *
 * Copyright (C) 2019 heidelpay GmbH
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @link  https://docs.heidelpay.com/
 *
 * @author  Simon Gabriel <development@heidelpay.com>
 *
 * @package  heidelpayPHP/resources
 */
namespace heidelpayPHP\Resources;

use DateTime;
use heidelpayPHP\Resources\PaymentTypes\BasePaymentType;
use heidelpayPHP\Traits\CanAuthorizeWithCustomer;
use stdClass;

class InstalmentPlan extends BasePaymentType
{
    use CanAuthorizeWithCustomer;

    /** @var string $orderDate */
    protected $orderDate;

    /** @var int $numberOfRates */
    protected $numberOfRates;

    /** @var string $dayOfPurchase */
    protected $dayOfPurchase;

    /** @var float $totalPurchaseAmount*/
    protected $totalPurchaseAmount;

    /** @var float $totalInterestAmount */
    protected $totalInterestAmount;

    /** @var float $totalAmount */
    protected $totalAmount;

    /** @var float $effectiveInterestRate */
    protected $effectiveInterestRate;

    /** @var float $nominalInterestRate */
    protected $nominalInterestRate;

    /** @var float $feeFirstRate */
    protected $feeFirstRate;

    /** @var float $feePerRate */
    protected $feePerRate;

    /** @var float $monthlyRate */
    protected $monthlyRate;

    /** @var float $lastRate */
    protected $lastRate;

    /** @var string $invoiceDate */
    protected $invoiceDate;

    /** @var string $invoiceDueDate */
    protected $invoiceDueDate;

    /** @var stdClass[] */
    private $rates;

    /**
     * @param int    $numberOfRates
     * @param string $dayOfPurchase
     * @param float  $totalPurchaseAmount
     * @param float  $totalInterestAmount
     * @param float  $totalAmount
     * @param float  $effectiveInterestRate
     * @param float  $nominalInterestRate
     * @param float  $feeFirstRate
     * @param float  $feePerRate
     * @param float  $monthlyRate
     * @param float  $lastRate
     */
    public function __construct(
        $numberOfRates = null,
        $dayOfPurchase = null,
        $totalPurchaseAmount = null,
        $totalInterestAmount = null,
        $totalAmount = null,
        $effectiveInterestRate = null,
        $nominalInterestRate = null,
        $feeFirstRate = null,
        $feePerRate = null,
        $monthlyRate = null,
        $lastRate = null
    ) {
        $this->numberOfRates         = $numberOfRates;
        $this->dayOfPurchase         = $dayOfPurchase;
        $this->totalPurchaseAmount   = $totalPurchaseAmount;
        $this->totalInterestAmount   = $totalInterestAmount;
        $this->totalAmount           = $totalAmount;
        $this->effectiveInterestRate = $effectiveInterestRate;
        $this->nominalInterestRate   = $nominalInterestRate;
        $this->feeFirstRate          = $feeFirstRate;
        $this->feePerRate            = $feePerRate;
        $this->monthlyRate           = $monthlyRate;
        $this->lastRate              = $lastRate;
    }

    //<editor-fold desc="Getters/Setters">

    /**
     * @return string|null
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param DateTime|string|null $orderDate
     *
     * @return $this
     */
    public function setOrderDate($orderDate): self
    {
        $this->orderDate = $orderDate instanceof DateTime ? $orderDate->format('Y-m-d') : $orderDate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumberOfRates()
    {
        return $this->numberOfRates;
    }

    /**
     * @param int|null $numberOfRates
     *
     * @return $this
     */
    public function setNumberOfRates($numberOfRates): self
    {
        $this->numberOfRates = $numberOfRates;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDayOfPurchase()
    {
        return $this->dayOfPurchase;
    }

    /**
     * @param string|DateTime|null $dayOfPurchase
     *
     * @return $this
     */
    public function setDayOfPurchase($dayOfPurchase): self
    {
        $this->dayOfPurchase = $dayOfPurchase instanceof DateTime ? $dayOfPurchase->format('Y-m-d') : $dayOfPurchase;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalPurchaseAmount()
    {
        return $this->totalPurchaseAmount;
    }

    /**
     * @param float|null $totalPurchaseAmount
     *
     * @return $this
     */
    public function setTotalPurchaseAmount($totalPurchaseAmount): self
    {
        $this->totalPurchaseAmount = $totalPurchaseAmount;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalInterestAmount()
    {
        return $this->totalInterestAmount;
    }

    /**
     * @param float|null $totalInterestAmount
     *
     * @return $this
     */
    public function setTotalInterestAmount($totalInterestAmount): self
    {
        $this->totalInterestAmount = $totalInterestAmount;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param float|null $totalAmount
     *
     * @return $this
     */
    public function setTotalAmount($totalAmount): self
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getEffectiveInterestRate()
    {
        return $this->effectiveInterestRate;
    }

    /**
     * @param float|null $effectiveInterestRate
     *
     * @return $this
     */
    public function setEffectiveInterestRate($effectiveInterestRate): self
    {
        $this->effectiveInterestRate = $effectiveInterestRate;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getNominalInterestRate()
    {
        return $this->nominalInterestRate;
    }

    /**
     * @param float|null $nominalInterestRate
     *
     * @return $this
     */
    public function setNominalInterestRate($nominalInterestRate): self
    {
        $this->nominalInterestRate = $nominalInterestRate;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getFeeFirstRate()
    {
        return $this->feeFirstRate;
    }

    /**
     * @param float|null $feeFirstRate
     *
     * @return $this
     */
    public function setFeeFirstRate($feeFirstRate): self
    {
        $this->feeFirstRate = $feeFirstRate;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getFeePerRate()
    {
        return $this->feePerRate;
    }

    /**
     * @param float|null $feePerRate
     *
     * @return $this
     */
    public function setFeePerRate($feePerRate): self
    {
        $this->feePerRate = $feePerRate;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getMonthlyRate()
    {
        return $this->monthlyRate;
    }

    /**
     * @param float|null $monthlyRate
     *
     * @return $this
     */
    public function setMonthlyRate($monthlyRate): self
    {
        $this->monthlyRate = $monthlyRate;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLastRate()
    {
        return $this->lastRate;
    }

    /**
     * @param float|null $lastRate
     *
     * @return $this
     */
    public function setLastRate($lastRate): self
    {
        $this->lastRate = $lastRate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @param string|DateTime|null $invoiceDate
     *
     * @return InstalmentPlan
     */
    public function setInvoiceDate($invoiceDate): InstalmentPlan
    {
        $this->invoiceDate = $invoiceDate instanceof DateTime ? $invoiceDate->format('Y-m-d') : $invoiceDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoiceDueDate()
    {
        return $this->invoiceDueDate;
    }

    /**
     * @param string|DateTime|null $invoiceDueDate
     *
     * @return InstalmentPlan
     */
    public function setInvoiceDueDate($invoiceDueDate): InstalmentPlan
    {
        $this->invoiceDueDate = $invoiceDueDate instanceof DateTime ?
                $invoiceDueDate->format('Y-m-d') : $invoiceDueDate;
        return $this;
    }

    /**
     * @return stdClass[]
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    /**
     * @param stdClass[] $rates
     *
     * @return InstalmentPlan
     */
    public function setRates(array $rates): InstalmentPlan
    {
        $this->rates = $rates;
        return $this;
    }

    //</editor-fold>

    //<editor-fold desc="Overridable Methods">

    /**
     * {@inheritDoc}
     */
    public function getTransactionParams(): array
    {
        return [
            'effectiveInterestRate' => $this->getEffectiveInterestRate()
        ];
    }

    //</editor-fold>
}
