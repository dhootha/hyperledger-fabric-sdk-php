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

namespace AmericanExpressTest\HyperledgerFabricClient\ProtoFactory;

use AmericanExpress\HyperledgerFabricClient\ProtoFactory\ChannelHeaderFactory;
use AmericanExpress\HyperledgerFabricClient\ProtoFactory\HeaderFactory;
use AmericanExpress\HyperledgerFabricClient\ProtoFactory\SerializedIdentityFactory;
use AmericanExpress\HyperledgerFabricClient\ProtoFactory\SignatureHeaderFactory;
use Hyperledger\Fabric\Protos\Common\Header;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AmericanExpress\HyperledgerFabricClient\ProtoFactory\HeaderFactory
 */
class HeaderFactoryTest extends TestCase
{
    public function testCreate()
    {
        $serializedIdentity = SerializedIdentityFactory::fromBytes('Alice', 'Bob');
        $nonce = 'u58920du89f';

        $channelHeader = ChannelHeaderFactory::create(
            'MyChannelId'
        );
        $channelHeader->setTxId('MyTransactionId');

        $signatureHeader = SignatureHeaderFactory::create($serializedIdentity, $nonce);

        $result = HeaderFactory::create($signatureHeader, $channelHeader);

        self::assertInstanceOf(Header::class, $result);
        self::assertContains('MyChannelId', $result->getChannelHeader());
        self::assertContains('MyTransactionId', $result->getChannelHeader());
        self::assertContains('Alice', $result->getSignatureHeader());
        self::assertContains('Bob', $result->getSignatureHeader());
        self::assertContains('u58920du89f', $result->getSignatureHeader());
    }
}
