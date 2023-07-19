<?php

namespace App\Mapper;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class MapService
{
    private Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()]);
    }

    private function getIgnoredAttributes($flag)
    {
        switch ($flag) {
            case '-bu':
                $ignoredAttributes = null;
                break;
            case '-b':
                $ignoredAttributes = ['konkursId', 'lifnr', 'voteDate', 'voteTime'];
                break;
            case '-l':
            case '-s':
                $ignoredAttributes = ['konkursId'];
                break;
            case '-o':
                $ignoredAttributes = ['konkursId', 'lotId', 'orfDate', 'orfTime', 'deliverDate', 'deliverTime'];
                break;
            case '-p':
                $ignoredAttributes = ['crtDate', 'crtTime', 'burks'];
                break;
        }
        return $ignoredAttributes;
    }

    public function mapDtoToEntity(object $dto, object $entity, $flag)
    {
        $ignoredAttributes = $this->getIgnoredAttributes($flag);
        $normalizedData = $this->serializer->normalize($dto, null, [
            AbstractNormalizer::OBJECT_TO_POPULATE => $entity,
            AbstractNormalizer::IGNORED_ATTRIBUTES => $ignoredAttributes,
        ]);

        return $this->serializer->denormalize($normalizedData, get_class($entity), null, [
            AbstractNormalizer::OBJECT_TO_POPULATE => $entity,
        ]);
    }

//    public function mapLotDtoToEntity(object $dto, object $entity)
//    {
//        $ignoredAttributes = ['konkursId'];
//        $normalizedData = $this->serializer->normalize($dto, null, [
//            AbstractNormalizer::OBJECT_TO_POPULATE => $entity,
//            AbstractNormalizer::IGNORED_ATTRIBUTES => $ignoredAttributes,
//        ]);
//
//        return $this->serializer->denormalize($normalizedData, get_class($entity), null, [
//            AbstractNormalizer::OBJECT_TO_POPULATE => $entity,
//        ]);
//    }
//
//    public function mapOfferDtoToEntity(object $dto, object $entity)
//    {
//        $ignoredAttributes = ['konkursId', 'lotId', 'orfDate', 'orfTime', 'deliverDate', 'deliverTime'];
//        $normalizedData = $this->serializer->normalize($dto, null, [
//            AbstractNormalizer::OBJECT_TO_POPULATE => $entity,
//            AbstractNormalizer::IGNORED_ATTRIBUTES => $ignoredAttributes,
//        ]);
//
//        return $this->serializer->denormalize($normalizedData, get_class($entity), null, [
//            AbstractNormalizer::OBJECT_TO_POPULATE => $entity,
//        ]);
//    }
//
//    public function mapBulletinDtoToEntity(object $dto, object $entity)
//    {
//        $ignoredAttributes = ['konkursId', 'lifnr', 'voteDate', 'voteTime'];
//        $normalizedData = $this->serializer->normalize($dto, null, [
//            AbstractNormalizer::OBJECT_TO_POPULATE => $entity,
//            AbstractNormalizer::IGNORED_ATTRIBUTES => $ignoredAttributes,
//        ]);
//
//        return $this->serializer->denormalize($normalizedData, get_class($entity), null, [
//            AbstractNormalizer::OBJECT_TO_POPULATE => $entity,
//        ]);
//    }
}
//todo сделать мб общий метод по определению $ignoredAttributes
