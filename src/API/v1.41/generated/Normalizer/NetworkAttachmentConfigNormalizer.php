<?php

namespace Mdshack\Docker\API\v1_41\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NetworkAttachmentConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\NetworkAttachmentConfig';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\NetworkAttachmentConfig';
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Mdshack\Docker\API\v1_41\Model\NetworkAttachmentConfig();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Target', $data)) {
            $object->setTarget($data['Target']);
            unset($data['Target']);
        }
        if (\array_key_exists('Aliases', $data)) {
            $values = [];
            foreach ($data['Aliases'] as $value) {
                $values[] = $value;
            }
            $object->setAliases($values);
            unset($data['Aliases']);
        }
        if (\array_key_exists('DriverOpts', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['DriverOpts'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setDriverOpts($values_1);
            unset($data['DriverOpts']);
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_2;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('target') && $object->getTarget() !== null) {
            $data['Target'] = $object->getTarget();
        }
        if ($object->isInitialized('aliases') && $object->getAliases() !== null) {
            $values = [];
            foreach ($object->getAliases() as $value) {
                $values[] = $value;
            }
            $data['Aliases'] = $values;
        }
        if ($object->isInitialized('driverOpts') && $object->getDriverOpts() !== null) {
            $values_1 = [];
            foreach ($object->getDriverOpts() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $data['DriverOpts'] = $values_1;
        }
        foreach ($object as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_2;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\NetworkAttachmentConfig' => false];
    }
}
