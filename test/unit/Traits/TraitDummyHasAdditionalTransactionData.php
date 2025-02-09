<?php
/*
 *  Dummy class for AdditionalTransactionData trait.
 *
 *  Copyright (C) 2022 - today Unzer E-Com GmbH
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 *
 *  @link  https://docs.unzer.com/
 *
 *  @package  UnzerSDK
 *
 */

/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */

namespace UnzerSDK\test\unit\Traits;

use UnzerSDK\Resources\AbstractUnzerResource;
use UnzerSDK\Traits\HasAdditionalTransactionData;

class TraitDummyHasAdditionalTransactionData extends AbstractUnzerResource
{
    use HasAdditionalTransactionData;
}
