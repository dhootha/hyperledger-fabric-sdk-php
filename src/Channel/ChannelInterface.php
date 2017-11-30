<?php

/**
 * Copyright 2017 American Express Travel Related Services Company, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express
 * or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

declare(strict_types=1);

namespace AmericanExpress\HyperledgerFabricClient\Channel;

use AmericanExpress\HyperledgerFabricClient\Chaincode\ChaincodeProviderInterface;
use AmericanExpress\HyperledgerFabricClient\Peer\PeerCollectionInterface;
use AmericanExpress\HyperledgerFabricClient\Proposal\ResponseCollection;
use AmericanExpress\HyperledgerFabricClient\Transaction\TransactionOptions;
use Hyperledger\Fabric\Protos\Peer\ChaincodeID;

interface ChannelInterface extends ChaincodeProviderInterface, PeerCollectionInterface
{
    /**
     * @param TransactionOptions $request
     * @param ChaincodeID $chaincodeId
     * @param mixed[] $args
     * @return ResponseCollection
     */
    public function queryByChainCode(
        TransactionOptions $request,
        ChaincodeID $chaincodeId,
        array $args = []
    ): ResponseCollection;
}
