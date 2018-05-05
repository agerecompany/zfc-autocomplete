<?php
/**
 * @package Agere_Autocomplete
 * @author Vlad Kozak <vk@agere.com.ua>
 * @datetime: 01.11.2016 16:09
 */

namespace Agere\Autocomplete\Model;

use Doctrine\ORM\Mapping as ORM;
use Popov\ZfcCore\Model\DomainAwareTrait;

/**
 * @ORM\Entity(repositoryClass="Agere\Autocomplete\Model\Repository\AutocompleteRepository")
 * @ORM\Table(name="autocomplete")
 */
class Autocomplete
{
    use DomainAwareTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=255)
     */
    private $value;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Autocomplete
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Autocomplete
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
    
    

}