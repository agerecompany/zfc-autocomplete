<?php
/**
 * @package Agere_Autocomplete
 * @author Vlad Kozak <vk@agere.com.ua>
 * @datetime: 01.11.2016 16:11
 */
namespace Agere\Autocomplete\Model\Repository;

class AutocompleteRepository extends \Doctrine\ORM\EntityRepository
{
    protected $_alias = 'autocomplete';

    public function getValues()
    {
        $qb = $this->createQueryBuilder($this->_alias)
            ->orderBy($this->_alias . '.value', 'ASC')
        ;
        return $qb;
    }
}