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

class SystemVersionNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\SystemVersion';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\SystemVersion';
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
        $object = new \Mdshack\Docker\API\v1_41\Model\SystemVersion();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Platform', $data)) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Mdshack\\Docker\\API\\v1_41\\Model\\SystemVersionPlatform', 'json', $context));
            unset($data['Platform']);
        }
        if (\array_key_exists('Components', $data)) {
            $values = [];
            foreach ($data['Components'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_41\\Model\\SystemVersionComponentsItem', 'json', $context);
            }
            $object->setComponents($values);
            unset($data['Components']);
        }
        if (\array_key_exists('Version', $data)) {
            $object->setVersion($data['Version']);
            unset($data['Version']);
        }
        if (\array_key_exists('ApiVersion', $data)) {
            $object->setApiVersion($data['ApiVersion']);
            unset($data['ApiVersion']);
        }
        if (\array_key_exists('MinAPIVersion', $data)) {
            $object->setMinAPIVersion($data['MinAPIVersion']);
            unset($data['MinAPIVersion']);
        }
        if (\array_key_exists('GitCommit', $data)) {
            $object->setGitCommit($data['GitCommit']);
            unset($data['GitCommit']);
        }
        if (\array_key_exists('GoVersion', $data)) {
            $object->setGoVersion($data['GoVersion']);
            unset($data['GoVersion']);
        }
        if (\array_key_exists('Os', $data)) {
            $object->setOs($data['Os']);
            unset($data['Os']);
        }
        if (\array_key_exists('Arch', $data)) {
            $object->setArch($data['Arch']);
            unset($data['Arch']);
        }
        if (\array_key_exists('KernelVersion', $data)) {
            $object->setKernelVersion($data['KernelVersion']);
            unset($data['KernelVersion']);
        }
        if (\array_key_exists('Experimental', $data)) {
            $object->setExperimental($data['Experimental']);
            unset($data['Experimental']);
        }
        if (\array_key_exists('BuildTime', $data)) {
            $object->setBuildTime($data['BuildTime']);
            unset($data['BuildTime']);
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
        if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
            $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
        }
        if ($object->isInitialized('components') && $object->getComponents() !== null) {
            $values = [];
            foreach ($object->getComponents() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Components'] = $values;
        }
        if ($object->isInitialized('version') && $object->getVersion() !== null) {
            $data['Version'] = $object->getVersion();
        }
        if ($object->isInitialized('apiVersion') && $object->getApiVersion() !== null) {
            $data['ApiVersion'] = $object->getApiVersion();
        }
        if ($object->isInitialized('minAPIVersion') && $object->getMinAPIVersion() !== null) {
            $data['MinAPIVersion'] = $object->getMinAPIVersion();
        }
        if ($object->isInitialized('gitCommit') && $object->getGitCommit() !== null) {
            $data['GitCommit'] = $object->getGitCommit();
        }
        if ($object->isInitialized('goVersion') && $object->getGoVersion() !== null) {
            $data['GoVersion'] = $object->getGoVersion();
        }
        if ($object->isInitialized('os') && $object->getOs() !== null) {
            $data['Os'] = $object->getOs();
        }
        if ($object->isInitialized('arch') && $object->getArch() !== null) {
            $data['Arch'] = $object->getArch();
        }
        if ($object->isInitialized('kernelVersion') && $object->getKernelVersion() !== null) {
            $data['KernelVersion'] = $object->getKernelVersion();
        }
        if ($object->isInitialized('experimental') && $object->getExperimental() !== null) {
            $data['Experimental'] = $object->getExperimental();
        }
        if ($object->isInitialized('buildTime') && $object->getBuildTime() !== null) {
            $data['BuildTime'] = $object->getBuildTime();
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
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\SystemVersion' => false];
    }
}
