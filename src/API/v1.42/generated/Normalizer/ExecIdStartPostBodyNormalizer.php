<?php

namespace Mdshack\Docker\API\v1_42\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_42\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_42\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ExecIdStartPostBodyNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ExecIdStartPostBody';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ExecIdStartPostBody';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\ExecIdStartPostBody();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Detach', $data)) {
            $object->setDetach($data['Detach']);
            unset($data['Detach']);
        }
        if (\array_key_exists('Tty', $data)) {
            $object->setTty($data['Tty']);
            unset($data['Tty']);
        }
        if (\array_key_exists('ConsoleSize', $data) && $data['ConsoleSize'] !== null) {
            $values = [];
            foreach ($data['ConsoleSize'] as $value) {
                $values[] = $value;
            }
            $object->setConsoleSize($values);
            unset($data['ConsoleSize']);
        } elseif (\array_key_exists('ConsoleSize', $data) && $data['ConsoleSize'] === null) {
            $object->setConsoleSize(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('detach') && $object->getDetach() !== null) {
            $data['Detach'] = $object->getDetach();
        }
        if ($object->isInitialized('tty') && $object->getTty() !== null) {
            $data['Tty'] = $object->getTty();
        }
        if ($object->isInitialized('consoleSize') && $object->getConsoleSize() !== null) {
            $values = [];
            foreach ($object->getConsoleSize() as $value) {
                $values[] = $value;
            }
            $data['ConsoleSize'] = $values;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\ExecIdStartPostBody' => false];
    }
}
