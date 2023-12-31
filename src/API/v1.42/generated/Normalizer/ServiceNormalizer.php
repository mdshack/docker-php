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

class ServiceNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\Service';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\Service';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\Service();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('ID', $data)) {
            $object->setID($data['ID']);
            unset($data['ID']);
        }
        if (\array_key_exists('Version', $data)) {
            $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ObjectVersion', 'json', $context));
            unset($data['Version']);
        }
        if (\array_key_exists('CreatedAt', $data)) {
            $object->setCreatedAt($data['CreatedAt']);
            unset($data['CreatedAt']);
        }
        if (\array_key_exists('UpdatedAt', $data)) {
            $object->setUpdatedAt($data['UpdatedAt']);
            unset($data['UpdatedAt']);
        }
        if (\array_key_exists('Spec', $data)) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceSpec', 'json', $context));
            unset($data['Spec']);
        }
        if (\array_key_exists('Endpoint', $data)) {
            $object->setEndpoint($this->denormalizer->denormalize($data['Endpoint'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceEndpoint', 'json', $context));
            unset($data['Endpoint']);
        }
        if (\array_key_exists('UpdateStatus', $data)) {
            $object->setUpdateStatus($this->denormalizer->denormalize($data['UpdateStatus'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceUpdateStatus', 'json', $context));
            unset($data['UpdateStatus']);
        }
        if (\array_key_exists('ServiceStatus', $data)) {
            $object->setServiceStatus($this->denormalizer->denormalize($data['ServiceStatus'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceServiceStatus', 'json', $context));
            unset($data['ServiceStatus']);
        }
        if (\array_key_exists('JobStatus', $data)) {
            $object->setJobStatus($this->denormalizer->denormalize($data['JobStatus'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceJobStatus', 'json', $context));
            unset($data['JobStatus']);
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
        if ($object->isInitialized('iD') && $object->getID() !== null) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('version') && $object->getVersion() !== null) {
            $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
        }
        if ($object->isInitialized('createdAt') && $object->getCreatedAt() !== null) {
            $data['CreatedAt'] = $object->getCreatedAt();
        }
        if ($object->isInitialized('updatedAt') && $object->getUpdatedAt() !== null) {
            $data['UpdatedAt'] = $object->getUpdatedAt();
        }
        if ($object->isInitialized('spec') && $object->getSpec() !== null) {
            $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
        }
        if ($object->isInitialized('endpoint') && $object->getEndpoint() !== null) {
            $data['Endpoint'] = $this->normalizer->normalize($object->getEndpoint(), 'json', $context);
        }
        if ($object->isInitialized('updateStatus') && $object->getUpdateStatus() !== null) {
            $data['UpdateStatus'] = $this->normalizer->normalize($object->getUpdateStatus(), 'json', $context);
        }
        if ($object->isInitialized('serviceStatus') && $object->getServiceStatus() !== null) {
            $data['ServiceStatus'] = $this->normalizer->normalize($object->getServiceStatus(), 'json', $context);
        }
        if ($object->isInitialized('jobStatus') && $object->getJobStatus() !== null) {
            $data['JobStatus'] = $this->normalizer->normalize($object->getJobStatus(), 'json', $context);
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\Service' => false];
    }
}
