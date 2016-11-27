<?php

namespace Hacco\DeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hacco\DeeeBundle\Entity\DevisRepository")
 */
class Devis
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
     *  @ORM\OneToMany(targetEntity="devisMateriels", mappedBy="devis") 
     */
    protected $devismaterielsDevis;
    
    /**
     * @var Customers
     * 
     * @ORM\ManyToOne(targetEntity="Customers",cascade={"persist"})
     * @ORM\JoinColumn(name="customers_id", referencedColumnName="id", nullable=false)
     */
    private  $customer;
    
    
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
     * Constructor
     */
    public function __construct()
    {
        $this->materiels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add materiels
     *
     * @param \Hacco\DeeeBundle\Entity\Materiels $materiels
     * @return Devis
     */
    public function addMateriel(\Hacco\DeeeBundle\Entity\Materiels $materiels)
    {
        $this->materiels[] = $materiels;

        return $this;
    }

    /**
     * Remove materiels
     *
     * @param \Hacco\DeeeBundle\Entity\Materiels $materiels
     */
    public function removeMateriel(\Hacco\DeeeBundle\Entity\Materiels $materiels)
    {
        $this->materiels->removeElement($materiels);
    }

    /**
     * Get materiels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMateriels()
    {
        return $this->materiels;
    }

    /**
     * Add devismaterielsDevis
     *
     * @param \Hacco\DeeeBundle\Entity\devisMateriels $devismaterielsDevis
     * @return Devis
     */
    public function addDevismaterielsDevi(\Hacco\DeeeBundle\Entity\devisMateriels $devismaterielsDevis)
    {
        $this->devismaterielsDevis[] = $devismaterielsDevis;

        return $this;
    }

    /**
     * Remove devismaterielsDevis
     *
     * @param \Hacco\DeeeBundle\Entity\devisMateriels $devismaterielsDevis
     */
    public function removeDevismaterielsDevi(\Hacco\DeeeBundle\Entity\devisMateriels $devismaterielsDevis)
    {
        $this->devismaterielsDevis->removeElement($devismaterielsDevis);
    }

    /**
     * Get devismaterielsDevis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDevismaterielsDevis()
    {
        return $this->devismaterielsDevis;
    }

    /**
     * Set customer
     *
     * @param \Hacco\DeeeBundle\Entity\Customers $customer
     * @return Devis
     */
    public function setCustomer(\Hacco\DeeeBundle\Entity\Customers $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Hacco\DeeeBundle\Entity\Customers 
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
