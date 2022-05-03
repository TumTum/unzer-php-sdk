<?php
/**
 * This file contains definitions of the available shipping types.
 *
 * Copyright (C) 2022 - today Unzer E-Com GmbH
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
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
 * @author  David Owusu <development@unzer.com>
 *
 * @package  UnzerSDK\Constants
 */
namespace UnzerSDK\Constants;

class ShippingTypes
{
    public const EQUALS_BILLING = 'equals-billing';
    public const DIFFERENT_ADDRESS = 'different-address';
    public const BRANCH_PICKUP = 'branch-pickup';
    public const POST_OFFICE_PICKUP = 'post-office-pickup';
    public const PACK_STATION = 'pack-station';
}
