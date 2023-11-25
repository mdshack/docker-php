<?php

namespace Mdshack\Docker\API\v1_40\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_40\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_40\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ContainersIdJsonGetResponse200Normalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\ContainersIdJsonGetResponse200';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\ContainersIdJsonGetResponse200';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\ContainersIdJsonGetResponse200();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Id', $data)) {
            $object->setId($data['Id']);
            unset($data['Id']);
        }
        if (\array_key_exists('Created', $data)) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        if (\array_key_exists('Path', $data)) {
            $object->setPath($data['Path']);
            unset($data['Path']);
        }
        if (\array_key_exists('Args', $data)) {
            $values = [];
            foreach ($data['Args'] as $value) {
                $values[] = $value;
            }
            $object->setArgs($values);
            unset($data['Args']);
        }
        if (\array_key_exists('State', $data) && $data['State'] !== null) {
            $object->setState($this->denormalizer->denormalize($data['State'], 'Mdshack\\Docker\\API\\v1_40\\Model\\ContainerState', 'json', $context));
            unset($data['State']);
        } elseif (\array_key_exists('State', $data) && $data['State'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('Image', $data)) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        }
        if (\array_key_exists('ResolvConfPath', $data)) {
            $object->setResolvConfPath($data['ResolvConfPath']);
            unset($data['ResolvConfPath']);
        }
        if (\array_key_exists('HostnamePath', $data)) {
            $object->setHostnamePath($data['HostnamePath']);
            unset($data['HostnamePath']);
        }
        if (\array_key_exists('HostsPath', $data)) {
            $object->setHostsPath($data['HostsPath']);
            unset($data['HostsPath']);
        }
        if (\array_key_exists('LogPath', $data)) {
            $object->setLogPath($data['LogPath']);
            unset($data['LogPath']);
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        if (\array_key_exists('RestartCount', $data)) {
            $object->setRestartCount($data['RestartCount']);
            unset($data['RestartCount']);
        }
        if (\array_key_exists('Driver', $data)) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        }
        if (\array_key_exists('Platform', $data)) {
            $object->setPlatform($data['Platform']);
            unset($data['Platform']);
        }
        if (\array_key_exists('MountLabel', $data)) {
            $object->setMountLabel($data['MountLabel']);
            unset($data['MountLabel']);
        }
        if (\array_key_exists('ProcessLabel', $data)) {
            $object->setProcessLabel($data['ProcessLabel']);
            unset($data['ProcessLabel']);
        }
        if (\array_key_exists('AppArmorProfile', $data)) {
            $object->setAppArmorProfile($data['AppArmorProfile']);
            unset($data['AppArmorProfile']);
        }
        if (\array_key_exists('ExecIDs', $data) && $data['ExecIDs'] !== null) {
            $values_1 = [];
            foreach ($data['ExecIDs'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExecIDs($values_1);
            unset($data['ExecIDs']);
        } elseif (\array_key_exists('ExecIDs', $data) && $data['ExecIDs'] === null) {
            $object->setExecIDs(null);
        }
        if (\array_key_exists('HostConfig', $data)) {
            $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Mdshack\\Docker\\API\\v1_40\\Model\\HostConfig', 'json', $context));
            unset($data['HostConfig']);
        }
        if (\array_key_exists('GraphDriver', $data)) {
            $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], 'Mdshack\\Docker\\API\\v1_40\\Model\\GraphDriverData', 'json', $context));
            unset($data['GraphDriver']);
        }
        if (\array_key_exists('SizeRw', $data)) {
            $object->setSizeRw($data['SizeRw']);
            unset($data['SizeRw']);
        }
        if (\array_key_exists('SizeRootFs', $data)) {
            $object->setSizeRootFs($data['SizeRootFs']);
            unset($data['SizeRootFs']);
        }
        if (\array_key_exists('Mounts', $data)) {
            $values_2 = [];
            foreach ($data['Mounts'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Mdshack\\Docker\\API\\v1_40\\Model\\MountPoint', 'json', $context);
            }
            $object->setMounts($values_2);
            unset($data['Mounts']);
        }
        if (\array_key_exists('Config', $data)) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Mdshack\\Docker\\API\\v1_40\\Model\\ContainerConfig', 'json', $context));
            unset($data['Config']);
        }
        if (\array_key_exists('NetworkSettings', $data)) {
            $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Mdshack\\Docker\\API\\v1_40\\Model\\NetworkSettings', 'json', $context));
            unset($data['NetworkSettings']);
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_3;
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
        if ($object->isInitialized('id') && $object->getId() !== null) {
            $data['Id'] = $object->getId();
        }
        if ($object->isInitialized('created') && $object->getCreated() !== null) {
            $data['Created'] = $object->getCreated();
        }
        if ($object->isInitialized('path') && $object->getPath() !== null) {
            $data['Path'] = $object->getPath();
        }
        if ($object->isInitialized('args') && $object->getArgs() !== null) {
            $values = [];
            foreach ($object->getArgs() as $value) {
                $values[] = $value;
            }
            $data['Args'] = $values;
        }
        if ($object->isInitialized('state') && $object->getState() !== null) {
            $data['State'] = $this->normalizer->normalize($object->getState(), 'json', $context);
        }
        if ($object->isInitialized('image') && $object->getImage() !== null) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('resolvConfPath') && $object->getResolvConfPath() !== null) {
            $data['ResolvConfPath'] = $object->getResolvConfPath();
        }
        if ($object->isInitialized('hostnamePath') && $object->getHostnamePath() !== null) {
            $data['HostnamePath'] = $object->getHostnamePath();
        }
        if ($object->isInitialized('hostsPath') && $object->getHostsPath() !== null) {
            $data['HostsPath'] = $object->getHostsPath();
        }
        if ($object->isInitialized('logPath') && $object->getLogPath() !== null) {
            $data['LogPath'] = $object->getLogPath();
        }
        if ($object->isInitialized('name') && $object->getName() !== null) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('restartCount') && $object->getRestartCount() !== null) {
            $data['RestartCount'] = $object->getRestartCount();
        }
        if ($object->isInitialized('driver') && $object->getDriver() !== null) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
            $data['Platform'] = $object->getPlatform();
        }
        if ($object->isInitialized('mountLabel') && $object->getMountLabel() !== null) {
            $data['MountLabel'] = $object->getMountLabel();
        }
        if ($object->isInitialized('processLabel') && $object->getProcessLabel() !== null) {
            $data['ProcessLabel'] = $object->getProcessLabel();
        }
        if ($object->isInitialized('appArmorProfile') && $object->getAppArmorProfile() !== null) {
            $data['AppArmorProfile'] = $object->getAppArmorProfile();
        }
        if ($object->isInitialized('execIDs') && $object->getExecIDs() !== null) {
            $values_1 = [];
            foreach ($object->getExecIDs() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['ExecIDs'] = $values_1;
        }
        if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
            $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
        }
        if ($object->isInitialized('graphDriver') && $object->getGraphDriver() !== null) {
            $data['GraphDriver'] = $this->normalizer->normalize($object->getGraphDriver(), 'json', $context);
        }
        if ($object->isInitialized('sizeRw') && $object->getSizeRw() !== null) {
            $data['SizeRw'] = $object->getSizeRw();
        }
        if ($object->isInitialized('sizeRootFs') && $object->getSizeRootFs() !== null) {
            $data['SizeRootFs'] = $object->getSizeRootFs();
        }
        if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
            $values_2 = [];
            foreach ($object->getMounts() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['Mounts'] = $values_2;
        }
        if ($object->isInitialized('config') && $object->getConfig() !== null) {
            $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
        }
        if ($object->isInitialized('networkSettings') && $object->getNetworkSettings() !== null) {
            $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_3;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\ContainersIdJsonGetResponse200' => false];
    }
}
