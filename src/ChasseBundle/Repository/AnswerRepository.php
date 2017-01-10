<?php

namespace ChasseBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AnswerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnswerRepository extends EntityRepository
{
    public function searchWords($word){
        $word = $word."%";
        $qb= $this->createQueryBuilder('a')
            ->select('a.word, a.id')
            ->where('a.word LIKE :word')
            ->setParameter('word', $word)
            ->getQuery();
        return $qb->getResult();

    }

    public function searchRecommend($domain){
        $qb= $this->createQueryBuilder('a')
            ->select('a.word, a.id')
            ->where('a.domain LIKE :domain')
            ->setParameter('domain', $domain)
            ->getQuery();
        return $qb->getResult();

    }
}

