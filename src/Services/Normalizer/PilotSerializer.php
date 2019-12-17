<?php


namespace App\Services\Normalizer;


use App\Entity\Pilot;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class PilotSerializer implements ContextAwareNormalizerInterface {

    /**
     * {@inheritdoc}
     *
     * @param array $context options that normalizers have access to
     */
    public function supportsNormalization($data, string $format = null, array $context = []) {
        return $data instanceof Pilot;
    }

    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param Pilot $pilot Object to normalize
     * @param string $format Format the normalization result will be encoded as
     * @param array $context Context options for the normalizer
     *
     * @return array|string|int|float|bool|\ArrayObject|null \ArrayObject is used to make sure an empty object is encoded as an object not an array
     *
     * @throws InvalidArgumentException   Occurs when the object given is not a supported type for the normalizer
     * @throws CircularReferenceException Occurs when the normalizer detects a circular reference when no circular
     *                                    reference handler can fix it
     * @throws LogicException             Occurs when the normalizer is not called in an expected context
     * @throws ExceptionInterface         Occurs for all the other cases of errors
     */
    public function normalize($pilot, string $format = null, array $context = []) {
        return [
            'id' => $pilot->getId(),
            'first_name' => $pilot->getFirstName(),
            'last_name' => $pilot->getLastName(),
            'birth_date' => $pilot->getBirthDate(),
            'hiring_date' => $pilot->getHiringDate(),
            'updated_at' => $pilot->getUpdatedAt(),
            'created_at' => $pilot->getCreatedAt(),
        ];
    }
}