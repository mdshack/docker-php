<?php

namespace Mdshack\Docker\API\v1_43\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TaskSpecNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpec';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpec';
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
        $object = new \Mdshack\Docker\API\v1_43\Model\TaskSpec();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('PluginSpec', $data)) {
            $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecPluginSpec', 'json', $context));
            unset($data['PluginSpec']);
        }
        if (\array_key_exists('ContainerSpec', $data)) {
            $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpec', 'json', $context));
            unset($data['ContainerSpec']);
        }
        if (\array_key_exists('NetworkAttachmentSpec', $data)) {
            $object->setNetworkAttachmentSpec($this->denormalizer->denormalize($data['NetworkAttachmentSpec'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecNetworkAttachmentSpec', 'json', $context));
            unset($data['NetworkAttachmentSpec']);
        }
        if (\array_key_exists('Resources', $data)) {
            $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecResources', 'json', $context));
            unset($data['Resources']);
        }
        if (\array_key_exists('RestartPolicy', $data)) {
            $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecRestartPolicy', 'json', $context));
            unset($data['RestartPolicy']);
        }
        if (\array_key_exists('Placement', $data)) {
            $object->setPlacement($this->denormalizer->denormalize($data['Placement'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecPlacement', 'json', $context));
            unset($data['Placement']);
        }
        if (\array_key_exists('ForceUpdate', $data)) {
            $object->setForceUpdate($data['ForceUpdate']);
            unset($data['ForceUpdate']);
        }
        if (\array_key_exists('Runtime', $data)) {
            $object->setRuntime($data['Runtime']);
            unset($data['Runtime']);
        }
        if (\array_key_exists('Networks', $data)) {
            $values = [];
            foreach ($data['Networks'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_43\\Model\\NetworkAttachmentConfig', 'json', $context);
            }
            $object->setNetworks($values);
            unset($data['Networks']);
        }
        if (\array_key_exists('LogDriver', $data)) {
            $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecLogDriver', 'json', $context));
            unset($data['LogDriver']);
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
        if ($object->isInitialized('pluginSpec') && $object->getPluginSpec() !== null) {
            $data['PluginSpec'] = $this->normalizer->normalize($object->getPluginSpec(), 'json', $context);
        }
        if ($object->isInitialized('containerSpec') && $object->getContainerSpec() !== null) {
            $data['ContainerSpec'] = $this->normalizer->normalize($object->getContainerSpec(), 'json', $context);
        }
        if ($object->isInitialized('networkAttachmentSpec') && $object->getNetworkAttachmentSpec() !== null) {
            $data['NetworkAttachmentSpec'] = $this->normalizer->normalize($object->getNetworkAttachmentSpec(), 'json', $context);
        }
        if ($object->isInitialized('resources') && $object->getResources() !== null) {
            $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
        }
        if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
            $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
        }
        if ($object->isInitialized('placement') && $object->getPlacement() !== null) {
            $data['Placement'] = $this->normalizer->normalize($object->getPlacement(), 'json', $context);
        }
        if ($object->isInitialized('forceUpdate') && $object->getForceUpdate() !== null) {
            $data['ForceUpdate'] = $object->getForceUpdate();
        }
        if ($object->isInitialized('runtime') && $object->getRuntime() !== null) {
            $data['Runtime'] = $object->getRuntime();
        }
        if ($object->isInitialized('networks') && $object->getNetworks() !== null) {
            $values = [];
            foreach ($object->getNetworks() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Networks'] = $values;
        }
        if ($object->isInitialized('logDriver') && $object->getLogDriver() !== null) {
            $data['LogDriver'] = $this->normalizer->normalize($object->getLogDriver(), 'json', $context);
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
        return ['Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpec' => false];
    }
}
