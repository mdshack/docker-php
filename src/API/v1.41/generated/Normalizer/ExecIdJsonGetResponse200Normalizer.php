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

class ExecIdJsonGetResponse200Normalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\ExecIdJsonGetResponse200';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\ExecIdJsonGetResponse200';
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
        $object = new \Mdshack\Docker\API\v1_41\Model\ExecIdJsonGetResponse200();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('CanRemove', $data)) {
            $object->setCanRemove($data['CanRemove']);
            unset($data['CanRemove']);
        }
        if (\array_key_exists('DetachKeys', $data)) {
            $object->setDetachKeys($data['DetachKeys']);
            unset($data['DetachKeys']);
        }
        if (\array_key_exists('ID', $data)) {
            $object->setID($data['ID']);
            unset($data['ID']);
        }
        if (\array_key_exists('Running', $data)) {
            $object->setRunning($data['Running']);
            unset($data['Running']);
        }
        if (\array_key_exists('ExitCode', $data)) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        }
        if (\array_key_exists('ProcessConfig', $data)) {
            $object->setProcessConfig($this->denormalizer->denormalize($data['ProcessConfig'], 'Mdshack\\Docker\\API\\v1_41\\Model\\ProcessConfig', 'json', $context));
            unset($data['ProcessConfig']);
        }
        if (\array_key_exists('OpenStdin', $data)) {
            $object->setOpenStdin($data['OpenStdin']);
            unset($data['OpenStdin']);
        }
        if (\array_key_exists('OpenStderr', $data)) {
            $object->setOpenStderr($data['OpenStderr']);
            unset($data['OpenStderr']);
        }
        if (\array_key_exists('OpenStdout', $data)) {
            $object->setOpenStdout($data['OpenStdout']);
            unset($data['OpenStdout']);
        }
        if (\array_key_exists('ContainerID', $data)) {
            $object->setContainerID($data['ContainerID']);
            unset($data['ContainerID']);
        }
        if (\array_key_exists('Pid', $data)) {
            $object->setPid($data['Pid']);
            unset($data['Pid']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        if ($object->isInitialized('canRemove') && $object->getCanRemove() !== null) {
            $data['CanRemove'] = $object->getCanRemove();
        }
        if ($object->isInitialized('detachKeys') && $object->getDetachKeys() !== null) {
            $data['DetachKeys'] = $object->getDetachKeys();
        }
        if ($object->isInitialized('iD') && $object->getID() !== null) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('running') && $object->getRunning() !== null) {
            $data['Running'] = $object->getRunning();
        }
        if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if ($object->isInitialized('processConfig') && $object->getProcessConfig() !== null) {
            $data['ProcessConfig'] = $this->normalizer->normalize($object->getProcessConfig(), 'json', $context);
        }
        if ($object->isInitialized('openStdin') && $object->getOpenStdin() !== null) {
            $data['OpenStdin'] = $object->getOpenStdin();
        }
        if ($object->isInitialized('openStderr') && $object->getOpenStderr() !== null) {
            $data['OpenStderr'] = $object->getOpenStderr();
        }
        if ($object->isInitialized('openStdout') && $object->getOpenStdout() !== null) {
            $data['OpenStdout'] = $object->getOpenStdout();
        }
        if ($object->isInitialized('containerID') && $object->getContainerID() !== null) {
            $data['ContainerID'] = $object->getContainerID();
        }
        if ($object->isInitialized('pid') && $object->getPid() !== null) {
            $data['Pid'] = $object->getPid();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\ExecIdJsonGetResponse200' => false];
    }
}
