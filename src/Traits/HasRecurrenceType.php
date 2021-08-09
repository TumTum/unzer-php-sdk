<?php
/**
 * This trait adds the short id and unique id property to a class.
 *
 * Copyright (C) 2020 - today Unzer E-Com GmbH
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
 * @link  https://docs.unzer.com/
 *
 * @author  Simon Gabriel <development@unzer.com>
 *
 * @package  UnzerSDK\Traits
 */
namespace UnzerSDK\Traits;

trait HasRecurrenceType
{
    //<editor-fold desc="Getters/Setters">

    /**
     * @return string|null
     */
    public function getRecurrenceType(): ?string
    {
        $additionalTransactionData = $this->getAdditionalTransactionData();
        return $additionalTransactionData->card->recurrenceType ?? null;
    }

    /**
     * @param string $recurrenceType
     *
     * @return $this
     */
    public function setRecurrenceType(string $recurrenceType): self
    {
        $payment = $this->getPayment();
        if ($payment === null || $payment->getPaymentType() === null) {
            throw new \RuntimeException('Payment Type has to be set before setting the recurrenceType');
        }
        $this->addAdditionalTransactionData('card', (object)['recurrenceType' => $recurrenceType]);
        return $this;
    }

    //</editor-fold>
}
