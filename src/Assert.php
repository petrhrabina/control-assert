<?php

declare(strict_types=1);

namespace Control;

class Assert
{

    public static function true(
        mixed $value,
        string $description = 'Expected value to be true'
    ): void {
        assert(
            $value === true,
            $description
        );
    }

    public static function false(
        bool $value,
        string $description = 'Expected value to be false'
    ): void {
        assert(
            $value === false,
            $description
        );
    }

    public static function instanceOf(
        mixed $object,
        string $className,
        string $description = 'Expected object to be instance of'
    ): void {
        if (!class_exists($className) && !interface_exists($className)) {
            throw new \InvalidArgumentException(
                sprintf('Class or interface "%s" does not exist', $className)
            );
        }

        if (!is_object($object)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Expected an object, got %s',
                    get_debug_type($object)
                )
            );
        }

        assert(
            $object instanceof $className,
            sprintf(
                '%s [%s], got instance of [%s]',
                $description,
                $className,
                get_class($object)
            )
        );
    }

}
