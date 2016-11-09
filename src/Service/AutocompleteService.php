<?php
/**
 * @package Agere_Autocomplete
 * @author Vlad Kozak <vk@agere.com.ua>
 * @datetime: 01.11.2016 16:13
 */

namespace Agere\Autocomplete\Service;

use Agere\Core\Service\DomainServiceAbstract;
use Agere\Autocomplete\Model\Autocomplete;

class AutocompleteService extends DomainServiceAbstract
{
	protected $entity = Autocomplete::class;

	public function save(Autocomplete $value)
	{
		$om = $this->getObjectManager();
		if (!$om->contains($value)) {
			$om->persist($value);
		}
		$om->flush();

	}

}