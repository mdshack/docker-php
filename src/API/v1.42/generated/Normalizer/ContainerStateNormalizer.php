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

class ContainerStateNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ContainerState';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ContainerState';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\ContainerState();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Status', $data)) {
            $object->setStatus($data['Status']);
            unset($data['Status']);
        }
        if (\array_key_exists('Running', $data)) {
            $object->setRunning($data['Running']);
            unset($data['Running']);
        }
        if (\array_key_exists('Paused', $data)) {
            $object->setPaused($data['Paused']);
            unset($data['Paused']);
        }
        if (\array_key_exists('Restarting', $data)) {
            $object->setRestarting($data['Restarting']);
            unset($data['Restarting']);
        }
        if (\array_key_exists('OOMKilled', $data)) {
            $object->setOOMKilled($data['OOMKilled']);
            unset($data['OOMKilled']);
        }
        if (\array_key_exists('Dead', $data)) {
            $object->setDead($data['Dead']);
            unset($data['Dead']);
        }
        if (\array_key_exists('Pid', $data)) {
            $object->setPid($data['Pid']);
            unset($data['Pid']);
        }
        if (\array_key_exists('ExitCode', $data)) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        }
        if (\array_key_exists('Error', $data)) {
            $object->setError($data['Error']);
            unset($data['Error']);
        }
        if (\array_key_exists('StartedAt', $data)) {
            $object->setStartedAt($data['StartedAt']);
            unset($data['StartedAt']);
        }
        if (\array_key_exists('FinishedAt', $data)) {
            $object->setFinishedAt($data['FinishedAt']);
            unset($data['FinishedAt']);
        }
        if (\array_key_exists('Health', $data) && $data['Health'] !== null) {
            $object->setHealth($this->denormalizer->denormalize($data['Health'], 'Mdshack\\Docker\\API\\v1_42\\Model\\Health', 'json', $context));
            unset($data['Health']);
        } elseif (\array_key_exists('Health', $data) && $data['Health'] === null) {
            $object->setHealth(null);
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
        if ($object->isInitialized('status') && $object->getStatus() !== null) {
            $data['Status'] = $object->getStatus();
        }
        if ($object->isInitialized('running') && $object->getRunning() !== null) {
            $data['Running'] = $object->getRunning();
        }
        if ($object->isInitialized('paused') && $object->getPaused() !== null) {
            $data['Paused'] = $object->getPaused();
        }
        if ($object->isInitialized('restarting') && $object->getRestarting() !== null) {
            $data['Restarting'] = $object->getRestarting();
        }
        if ($object->isInitialized('oOMKilled') && $object->getOOMKilled() !== null) {
            $data['OOMKilled'] = $object->getOOMKilled();
        }
        if ($object->isInitialized('dead') && $object->getDead() !== null) {
            $data['Dead'] = $object->getDead();
        }
        if ($object->isInitialized('pid') && $object->getPid() !== null) {
            $data['Pid'] = $object->getPid();
        }
        if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if ($object->isInitialized('error') && $object->getError() !== null) {
            $data['Error'] = $object->getError();
        }
        if ($object->isInitialized('startedAt') && $object->getStartedAt() !== null) {
            $data['StartedAt'] = $object->getStartedAt();
        }
        if ($object->isInitialized('finishedAt') && $object->getFinishedAt() !== null) {
            $data['FinishedAt'] = $object->getFinishedAt();
        }
        if ($object->isInitialized('health') && $object->getHealth() !== null) {
            $data['Health'] = $this->normalizer->normalize($object->getHealth(), 'json', $context);
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\ContainerState' => false];
    }
}
