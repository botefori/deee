<?php

namespace Hacco\DeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * devisMateriels
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hacco\DeeeBundle\Entity\devisMaterielsRepository")
 */
class devisMateriels
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;
   
    /** 
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Devis", inversedBy="devismaterielsDevis") 
     * @ORM\JoinColumn(name="devis_id", referencedColumnName="id", nullable=false) 
     */
    protected $devis;

    /** 
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Materiels", inversedBy="devismaterielsMateriels") 
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false) 
     */
    protected $materiels;
    
    
     /**
     * Set amount
     *
     * @param int amount
     * @return Materiels
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set devis
     *
     * @param \Hacco\DeeeBundle\Entity\Devis $devis
     * @return devisMateriels
     */
    public function setDevis(\Hacco\DeeeBundle\Entity\Devis $devis)
    {
        $this->devis = $devis;

        return $this;
    }

    /**
     * Get devis
     *
     * @return \Hacco\DeeeBundle\Entity\Devis 
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Set materiels
     *
     * @param \Hacco\DeeeBundle\Entity\Materiels $materiels
     * @return devisMateriels
     */
    public function setMateriels(\Hacco\DeeeBundle\Entity\Materiels $materiels)
    {
        $this->materiels = $materiels;

        return $this;
    }

    /**
     * Get materiels
     *
     * @return \Hacco\DeeeBundle\Entity\Materiels 
     */
    public function getMateriels()
    {
        return $this->materiels;
    }
}
