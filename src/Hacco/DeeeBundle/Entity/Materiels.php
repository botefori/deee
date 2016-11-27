<?php

namespace Hacco\DeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materiels
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hacco\DeeeBundle\Entity\MaterielsRepository")
 */
class Materiels
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Desingation", type="string", length=255)
     */
    private $desingation;
    
    
    /** 
     * @ORM\OneToMany(targetEntity="devisMateriels", mappedBy="materiels") 
     */
    protected $devismaterielsMateriels;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set desingation
     *
     * @param string $desingation
     * @return Materiels
     */
    public function setDesingation($desingation)
    {
        $this->desingation = $desingation;

        return $this;
    }

    /**
     * Get desingation
     *
     * @return string 
     */
    public function getDesingation()
    {
        return $this->desingation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->devis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add devis
     *
     * @param \Hacco\DeeeBundle\Entity\Devis $devis
     * @return Materiels
     */
    public function addDevi(\Hacco\DeeeBundle\Entity\Devis $devis)
    {
        $this->devis[] = $devis;

        return $this;
    }

    /**
     * Remove devis
     *
     * @param \Hacco\DeeeBundle\Entity\Devis $devis
     */
    public function removeDevi(\Hacco\DeeeBundle\Entity\Devis $devis)
    {
        $this->devis->removeElement($devis);
    }

    /**
     * Get devis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Add devismaterielsMateriels
     *
     * @param \Hacco\DeeeBundle\Entity\devisMateriels $devismaterielsMateriels
     * @return Materiels
     */
    public function addDevismaterielsMateriel(\Hacco\DeeeBundle\Entity\devisMateriels $devismaterielsMateriels)
    {
        $this->devismaterielsMateriels[] = $devismaterielsMateriels;

        return $this;
    }

    /**
     * Remove devismaterielsMateriels
     *
     * @param \Hacco\DeeeBundle\Entity\devisMateriels $devismaterielsMateriels
     */
    public function removeDevismaterielsMateriel(\Hacco\DeeeBundle\Entity\devisMateriels $devismaterielsMateriels)
    {
        $this->devismaterielsMateriels->removeElement($devismaterielsMateriels);
    }

    /**
     * Get devismaterielsMateriels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDevismaterielsMateriels()
    {
        return $this->devismaterielsMateriels;
    }
    
    
    /**
     *Render a ProjectType as a string
     *  
     * @return string
     */
    public function __toString(){
        return $this->getDesingation();
    }
}
