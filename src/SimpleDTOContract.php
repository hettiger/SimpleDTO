<?php declare(strict_types=1);

/**
 * This file is part of SimpleDTO, a PHP Experts, Inc., Project.
 *
 * Copyright © 2019 PHP Experts, Inc.
 * Author: Theodore R. Smith <theodore@phpexperts.pro>
 *  GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690
 *  https://www.phpexperts.pro/
 *  https://github.com/phpexpertsinc/SimpleDTO
 *
 * This file is licensed under the MIT License.
 */

namespace PHPExperts\SimpleDTO;

use JsonSerializable;
use PHPExperts\DataTypeValidator\DataTypeValidator;
use Serializable;

interface SimpleDTOContract extends JsonSerializable, Serializable
{
    public function __construct(array $input, array $options = [], DataTypeValidator $validator = null);
    public function isPermissive(): bool;
    public function getData(): array;
    public function validate(): void;
    public function __isset(string $property): bool;

    /**
     * @param string $property
     * @return mixed
     */
    public function __get(string $property);

    /**
     * @param string $property
     * @param mixed  $value
     */
    public function __set(string $property, $value): void;
    public function toArray(): array;
    public function jsonSerialize(): array;

    /**
     * @return false|string
     */
    public function serialize();

    /**
     * @param string $serialized
     */
    public function unserialize($serialized): void;
}
