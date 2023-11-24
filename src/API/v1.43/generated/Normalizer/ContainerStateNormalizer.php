<?php

namespace Mdshack\Docker\API\_____\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\_____\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\_____\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ContainerStateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\_____\\Model\\ContainerState';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\_____\\Model\\ContainerState';
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
        $object = new \Mdshack\Docker\API\_____\Model\ContainerState();
        if (null === $data || false === \is_array($data)) {
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
            $object->setHealth($this->denormalizer->denormalize($data['Health'], 'Mdshack\\Docker\\API\\_____\\Model\\Health', 'json', $context));
            unset($data['Health']);
        }
        elseif (\array_key_exists('Health', $data) && $data['Health'] === null) {
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('status') && null !== $object->getStatus()) {
            $data['Status'] = $object->getStatus();
        }
        if ($object->isInitialized('running') && null !== $object->getRunning()) {
            $data['Running'] = $object->getRunning();
        }
        if ($object->isInitialized('paused') && null !== $object->getPaused()) {
            $data['Paused'] = $object->getPaused();
        }
        if ($object->isInitialized('restarting') && null !== $object->getRestarting()) {
            $data['Restarting'] = $object->getRestarting();
        }
        if ($object->isInitialized('oOMKilled') && null !== $object->getOOMKilled()) {
            $data['OOMKilled'] = $object->getOOMKilled();
        }
        if ($object->isInitialized('dead') && null !== $object->getDead()) {
            $data['Dead'] = $object->getDead();
        }
        if ($object->isInitialized('pid') && null !== $object->getPid()) {
            $data['Pid'] = $object->getPid();
        }
        if ($object->isInitialized('exitCode') && null !== $object->getExitCode()) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if ($object->isInitialized('error') && null !== $object->getError()) {
            $data['Error'] = $object->getError();
        }
        if ($object->isInitialized('startedAt') && null !== $object->getStartedAt()) {
            $data['StartedAt'] = $object->getStartedAt();
        }
        if ($object->isInitialized('finishedAt') && null !== $object->getFinishedAt()) {
            $data['FinishedAt'] = $object->getFinishedAt();
        }
        if ($object->isInitialized('health') && null !== $object->getHealth()) {
            $data['Health'] = $this->normalizer->normalize($object->getHealth(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\_____\\Model\\ContainerState' => false);
    }
}