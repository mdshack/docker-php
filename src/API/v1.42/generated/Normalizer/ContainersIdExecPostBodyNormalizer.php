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

class ContainersIdExecPostBodyNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ContainersIdExecPostBody';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ContainersIdExecPostBody';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\ContainersIdExecPostBody();
        if ($data === null || \is_array($data) === false) {
            return $object;
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
        if (\array_key_exists('DetachKeys', $data)) {
            $object->setDetachKeys($data['DetachKeys']);
            unset($data['DetachKeys']);
        }
        if (\array_key_exists('Tty', $data)) {
            $object->setTty($data['Tty']);
            unset($data['Tty']);
        }
        if (\array_key_exists('Env', $data)) {
            $values_1 = [];
            foreach ($data['Env'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setEnv($values_1);
            unset($data['Env']);
        }
        if (\array_key_exists('Cmd', $data)) {
            $values_2 = [];
            foreach ($data['Cmd'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setCmd($values_2);
            unset($data['Cmd']);
        }
        if (\array_key_exists('Privileged', $data)) {
            $object->setPrivileged($data['Privileged']);
            unset($data['Privileged']);
        }
        if (\array_key_exists('User', $data)) {
            $object->setUser($data['User']);
            unset($data['User']);
        }
        if (\array_key_exists('WorkingDir', $data)) {
            $object->setWorkingDir($data['WorkingDir']);
            unset($data['WorkingDir']);
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
        if ($object->isInitialized('attachStdin') && $object->getAttachStdin() !== null) {
            $data['AttachStdin'] = $object->getAttachStdin();
        }
        if ($object->isInitialized('attachStdout') && $object->getAttachStdout() !== null) {
            $data['AttachStdout'] = $object->getAttachStdout();
        }
        if ($object->isInitialized('attachStderr') && $object->getAttachStderr() !== null) {
            $data['AttachStderr'] = $object->getAttachStderr();
        }
        if ($object->isInitialized('consoleSize') && $object->getConsoleSize() !== null) {
            $values = [];
            foreach ($object->getConsoleSize() as $value) {
                $values[] = $value;
            }
            $data['ConsoleSize'] = $values;
        }
        if ($object->isInitialized('detachKeys') && $object->getDetachKeys() !== null) {
            $data['DetachKeys'] = $object->getDetachKeys();
        }
        if ($object->isInitialized('tty') && $object->getTty() !== null) {
            $data['Tty'] = $object->getTty();
        }
        if ($object->isInitialized('env') && $object->getEnv() !== null) {
            $values_1 = [];
            foreach ($object->getEnv() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Env'] = $values_1;
        }
        if ($object->isInitialized('cmd') && $object->getCmd() !== null) {
            $values_2 = [];
            foreach ($object->getCmd() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Cmd'] = $values_2;
        }
        if ($object->isInitialized('privileged') && $object->getPrivileged() !== null) {
            $data['Privileged'] = $object->getPrivileged();
        }
        if ($object->isInitialized('user') && $object->getUser() !== null) {
            $data['User'] = $object->getUser();
        }
        if ($object->isInitialized('workingDir') && $object->getWorkingDir() !== null) {
            $data['WorkingDir'] = $object->getWorkingDir();
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\ContainersIdExecPostBody' => false];
    }
}
