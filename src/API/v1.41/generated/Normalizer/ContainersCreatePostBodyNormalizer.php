<?php

namespace Mdshack\Docker\API\v1_41\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ContainersCreatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\ContainersCreatePostBody';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\ContainersCreatePostBody';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Mdshack\Docker\API\v1_41\Model\ContainersCreatePostBody();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Hostname', $data)) {
            $object->setHostname($data['Hostname']);
            unset($data['Hostname']);
        }
        if (\array_key_exists('Domainname', $data)) {
            $object->setDomainname($data['Domainname']);
            unset($data['Domainname']);
        }
        if (\array_key_exists('User', $data)) {
            $object->setUser($data['User']);
            unset($data['User']);
        }
        if (\array_key_exists('AttachStdin', $data)) {
            $object->setAttachStdin($data['AttachStdin']);
            unset($data['AttachStdin']);
        }
        if (\array_key_exists('AttachStdout', $data)) {
            $object->setAttachStdout($data['AttachStdout']);
            unset($data['AttachStdout']);
        }
        if (\array_key_exists('AttachStderr', $data)) {
            $object->setAttachStderr($data['AttachStderr']);
            unset($data['AttachStderr']);
        }
        if (\array_key_exists('ExposedPorts', $data) && $data['ExposedPorts'] !== null) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['ExposedPorts'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_41\\Model\\ContainerConfigExposedPortsItem', 'json', $context);
            }
            $object->setExposedPorts($values);
            unset($data['ExposedPorts']);
        }
        elseif (\array_key_exists('ExposedPorts', $data) && $data['ExposedPorts'] === null) {
            $object->setExposedPorts(null);
        }
        if (\array_key_exists('Tty', $data)) {
            $object->setTty($data['Tty']);
            unset($data['Tty']);
        }
        if (\array_key_exists('OpenStdin', $data)) {
            $object->setOpenStdin($data['OpenStdin']);
            unset($data['OpenStdin']);
        }
        if (\array_key_exists('StdinOnce', $data)) {
            $object->setStdinOnce($data['StdinOnce']);
            unset($data['StdinOnce']);
        }
        if (\array_key_exists('Env', $data)) {
            $values_1 = array();
            foreach ($data['Env'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setEnv($values_1);
            unset($data['Env']);
        }
        if (\array_key_exists('Cmd', $data)) {
            $values_2 = array();
            foreach ($data['Cmd'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setCmd($values_2);
            unset($data['Cmd']);
        }
        if (\array_key_exists('Healthcheck', $data)) {
            $object->setHealthcheck($this->denormalizer->denormalize($data['Healthcheck'], 'Mdshack\\Docker\\API\\v1_41\\Model\\HealthConfig', 'json', $context));
            unset($data['Healthcheck']);
        }
        if (\array_key_exists('ArgsEscaped', $data) && $data['ArgsEscaped'] !== null) {
            $object->setArgsEscaped($data['ArgsEscaped']);
            unset($data['ArgsEscaped']);
        }
        elseif (\array_key_exists('ArgsEscaped', $data) && $data['ArgsEscaped'] === null) {
            $object->setArgsEscaped(null);
        }
        if (\array_key_exists('Image', $data)) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        }
        if (\array_key_exists('Volumes', $data)) {
            $values_3 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Volumes'] as $key_1 => $value_3) {
                $values_3[$key_1] = $this->denormalizer->denormalize($value_3, 'Mdshack\\Docker\\API\\v1_41\\Model\\ContainerConfigVolumesItem', 'json', $context);
            }
            $object->setVolumes($values_3);
            unset($data['Volumes']);
        }
        if (\array_key_exists('WorkingDir', $data)) {
            $object->setWorkingDir($data['WorkingDir']);
            unset($data['WorkingDir']);
        }
        if (\array_key_exists('Entrypoint', $data)) {
            $values_4 = array();
            foreach ($data['Entrypoint'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setEntrypoint($values_4);
            unset($data['Entrypoint']);
        }
        if (\array_key_exists('NetworkDisabled', $data) && $data['NetworkDisabled'] !== null) {
            $object->setNetworkDisabled($data['NetworkDisabled']);
            unset($data['NetworkDisabled']);
        }
        elseif (\array_key_exists('NetworkDisabled', $data) && $data['NetworkDisabled'] === null) {
            $object->setNetworkDisabled(null);
        }
        if (\array_key_exists('MacAddress', $data) && $data['MacAddress'] !== null) {
            $object->setMacAddress($data['MacAddress']);
            unset($data['MacAddress']);
        }
        elseif (\array_key_exists('MacAddress', $data) && $data['MacAddress'] === null) {
            $object->setMacAddress(null);
        }
        if (\array_key_exists('OnBuild', $data) && $data['OnBuild'] !== null) {
            $values_5 = array();
            foreach ($data['OnBuild'] as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setOnBuild($values_5);
            unset($data['OnBuild']);
        }
        elseif (\array_key_exists('OnBuild', $data) && $data['OnBuild'] === null) {
            $object->setOnBuild(null);
        }
        if (\array_key_exists('Labels', $data)) {
            $values_6 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key_2 => $value_6) {
                $values_6[$key_2] = $value_6;
            }
            $object->setLabels($values_6);
            unset($data['Labels']);
        }
        if (\array_key_exists('StopSignal', $data) && $data['StopSignal'] !== null) {
            $object->setStopSignal($data['StopSignal']);
            unset($data['StopSignal']);
        }
        elseif (\array_key_exists('StopSignal', $data) && $data['StopSignal'] === null) {
            $object->setStopSignal(null);
        }
        if (\array_key_exists('StopTimeout', $data) && $data['StopTimeout'] !== null) {
            $object->setStopTimeout($data['StopTimeout']);
            unset($data['StopTimeout']);
        }
        elseif (\array_key_exists('StopTimeout', $data) && $data['StopTimeout'] === null) {
            $object->setStopTimeout(null);
        }
        if (\array_key_exists('Shell', $data) && $data['Shell'] !== null) {
            $values_7 = array();
            foreach ($data['Shell'] as $value_7) {
                $values_7[] = $value_7;
            }
            $object->setShell($values_7);
            unset($data['Shell']);
        }
        elseif (\array_key_exists('Shell', $data) && $data['Shell'] === null) {
            $object->setShell(null);
        }
        if (\array_key_exists('HostConfig', $data)) {
            $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Mdshack\\Docker\\API\\v1_41\\Model\\HostConfig', 'json', $context));
            unset($data['HostConfig']);
        }
        if (\array_key_exists('NetworkingConfig', $data)) {
            $object->setNetworkingConfig($this->denormalizer->denormalize($data['NetworkingConfig'], 'Mdshack\\Docker\\API\\v1_41\\Model\\NetworkingConfig', 'json', $context));
            unset($data['NetworkingConfig']);
        }
        foreach ($data as $key_3 => $value_8) {
            if (preg_match('/.*/', (string) $key_3)) {
                $object[$key_3] = $value_8;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('hostname') && null !== $object->getHostname()) {
            $data['Hostname'] = $object->getHostname();
        }
        if ($object->isInitialized('domainname') && null !== $object->getDomainname()) {
            $data['Domainname'] = $object->getDomainname();
        }
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $data['User'] = $object->getUser();
        }
        if ($object->isInitialized('attachStdin') && null !== $object->getAttachStdin()) {
            $data['AttachStdin'] = $object->getAttachStdin();
        }
        if ($object->isInitialized('attachStdout') && null !== $object->getAttachStdout()) {
            $data['AttachStdout'] = $object->getAttachStdout();
        }
        if ($object->isInitialized('attachStderr') && null !== $object->getAttachStderr()) {
            $data['AttachStderr'] = $object->getAttachStderr();
        }
        if ($object->isInitialized('exposedPorts') && null !== $object->getExposedPorts()) {
            $values = array();
            foreach ($object->getExposedPorts() as $key => $value) {
                $values[$key] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['ExposedPorts'] = $values;
        }
        if ($object->isInitialized('tty') && null !== $object->getTty()) {
            $data['Tty'] = $object->getTty();
        }
        if ($object->isInitialized('openStdin') && null !== $object->getOpenStdin()) {
            $data['OpenStdin'] = $object->getOpenStdin();
        }
        if ($object->isInitialized('stdinOnce') && null !== $object->getStdinOnce()) {
            $data['StdinOnce'] = $object->getStdinOnce();
        }
        if ($object->isInitialized('env') && null !== $object->getEnv()) {
            $values_1 = array();
            foreach ($object->getEnv() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Env'] = $values_1;
        }
        if ($object->isInitialized('cmd') && null !== $object->getCmd()) {
            $values_2 = array();
            foreach ($object->getCmd() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Cmd'] = $values_2;
        }
        if ($object->isInitialized('healthcheck') && null !== $object->getHealthcheck()) {
            $data['Healthcheck'] = $this->normalizer->normalize($object->getHealthcheck(), 'json', $context);
        }
        if ($object->isInitialized('argsEscaped') && null !== $object->getArgsEscaped()) {
            $data['ArgsEscaped'] = $object->getArgsEscaped();
        }
        if ($object->isInitialized('image') && null !== $object->getImage()) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('volumes') && null !== $object->getVolumes()) {
            $values_3 = array();
            foreach ($object->getVolumes() as $key_1 => $value_3) {
                $values_3[$key_1] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Volumes'] = $values_3;
        }
        if ($object->isInitialized('workingDir') && null !== $object->getWorkingDir()) {
            $data['WorkingDir'] = $object->getWorkingDir();
        }
        if ($object->isInitialized('entrypoint') && null !== $object->getEntrypoint()) {
            $values_4 = array();
            foreach ($object->getEntrypoint() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['Entrypoint'] = $values_4;
        }
        if ($object->isInitialized('networkDisabled') && null !== $object->getNetworkDisabled()) {
            $data['NetworkDisabled'] = $object->getNetworkDisabled();
        }
        if ($object->isInitialized('macAddress') && null !== $object->getMacAddress()) {
            $data['MacAddress'] = $object->getMacAddress();
        }
        if ($object->isInitialized('onBuild') && null !== $object->getOnBuild()) {
            $values_5 = array();
            foreach ($object->getOnBuild() as $value_5) {
                $values_5[] = $value_5;
            }
            $data['OnBuild'] = $values_5;
        }
        if ($object->isInitialized('labels') && null !== $object->getLabels()) {
            $values_6 = array();
            foreach ($object->getLabels() as $key_2 => $value_6) {
                $values_6[$key_2] = $value_6;
            }
            $data['Labels'] = $values_6;
        }
        if ($object->isInitialized('stopSignal') && null !== $object->getStopSignal()) {
            $data['StopSignal'] = $object->getStopSignal();
        }
        if ($object->isInitialized('stopTimeout') && null !== $object->getStopTimeout()) {
            $data['StopTimeout'] = $object->getStopTimeout();
        }
        if ($object->isInitialized('shell') && null !== $object->getShell()) {
            $values_7 = array();
            foreach ($object->getShell() as $value_7) {
                $values_7[] = $value_7;
            }
            $data['Shell'] = $values_7;
        }
        if ($object->isInitialized('hostConfig') && null !== $object->getHostConfig()) {
            $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
        }
        if ($object->isInitialized('networkingConfig') && null !== $object->getNetworkingConfig()) {
            $data['NetworkingConfig'] = $this->normalizer->normalize($object->getNetworkingConfig(), 'json', $context);
        }
        foreach ($object as $key_3 => $value_8) {
            if (preg_match('/.*/', (string) $key_3)) {
                $data[$key_3] = $value_8;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\v1_41\\Model\\ContainersCreatePostBody' => false);
    }
}