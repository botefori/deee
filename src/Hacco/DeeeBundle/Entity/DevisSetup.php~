<?php

namespace Hacco\DeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DevisSetup
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hacco\DeeeBundle\Entity\DevisSetupRepository")
 */
class DevisSetup
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
     * @var integer
     *
     * @ORM\Column(name="uc", type="integer")
     */
    private $uc;

    /**
     * @var integer
     *
     * @ORM\Column(name="ecran15a17pouces", type="integer")
     */
    private $ecran15a17pouces;

    /**
     * @var integer
     *
     * @ORM\Column(name="ecran19a21pouces", type="integer")
     */
    private $ecran19a21pouces;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordinateurportable", type="integer")
     */
    private $ordinateurportable;

    /**
     * @var integer
     *
     * @ORM\Column(name="phoneportable", type="integer")
     */
    private $phoneportable;

    /**
     * @var integer
     *
     * @ORM\Column(name="photocopieurmoins70kg", type="integer")
     */
    private $photocopieurmoins70kg;

    /**
     * @var integer
     *
     * @ORM\Column(name="photocopieurplus70kg", type="integer")
     */
    private $photocopieurplus70kg;

    /**
     * @var integer
     *
     * @ORM\Column(name="imprimante", type="integer")
     */
    private $imprimante;

    /**
     * @var integer
     *
     * @ORM\Column(name="serveurs", type="integer")
     */
    private $serveurs;

    /**
     * @var integer
     *
     * @ORM\Column(name="onduleurs", type="integer")
     */
    private $onduleurs;

    /**
     * @var integer
     *
     * @ORM\Column(name="peripheriques", type="integer")
     */
    private $peripheriques;

    /**
     * @var integer
     *
     * @ORM\Column(name="piecesdetacheespoids", type="integer")
     */
    private $piecesdetacheespoids;

    /**
     * @var string
     *
     * @ORM\Column(name="autresproduitsapreciser", type="text")
     */
    private $autresproduitsapreciser;

    
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
     * Set uc
     *
     * @param integer $uc
     * @return DevisSetup
     */
    public function setUc($uc)
    {
        $this->uc = $uc;

        return $this;
    }

    /**
     * Get uc
     *
     * @return integer 
     */
    public function getUc()
    {
        return $this->uc;
    }

    /**
     * Set ecran15a17pouces
     *
     * @param integer $ecran15a17pouces
     * @return DevisSetup
     */
    public function setEcran15a17pouces($ecran15a17pouces)
    {
        $this->ecran15a17pouces = $ecran15a17pouces;

        return $this;
    }

    /**
     * Get ecran15a17pouces
     *
     * @return integer 
     */
    public function getEcran15a17pouces()
    {
        return $this->ecran15a17pouces;
    }

    /**
     * Set ecran19a21pouces
     *
     * @param integer $ecran19a21pouces
     * @return DevisSetup
     */
    public function setEcran19a21pouces($ecran19a21pouces)
    {
        $this->ecran19a21pouces = $ecran19a21pouces;

        return $this;
    }

    /**
     * Get ecran19a21pouces
     *
     * @return integer 
     */
    public function getEcran19a21pouces()
    {
        return $this->ecran19a21pouces;
    }

    /**
     * Set ordinateurportable
     *
     * @param integer $ordinateurportable
     * @return DevisSetup
     */
    public function setOrdinateurportable($ordinateurportable)
    {
        $this->ordinateurportable = $ordinateurportable;

        return $this;
    }

    /**
     * Get ordinateurportable
     *
     * @return integer 
     */
    public function getOrdinateurportable()
    {
        return $this->ordinateurportable;
    }

    /**
     * Set phoneportable
     *
     * @param integer $phoneportable
     * @return DevisSetup
     */
    public function setPhoneportable($phoneportable)
    {
        $this->phoneportable = $phoneportable;

        return $this;
    }

    /**
     * Get phoneportable
     *
     * @return integer 
     */
    public function getPhoneportable()
    {
        return $this->phoneportable;
    }

    /**
     * Set photocopieurmoins70kg
     *
     * @param integer $photocopieurmoins70kg
     * @return DevisSetup
     */
    public function setPhotocopieurmoins70kg($photocopieurmoins70kg)
    {
        $this->photocopieurmoins70kg = $photocopieurmoins70kg;

        return $this;
    }

    /**
     * Get photocopieurmoins70kg
     *
     * @return integer 
     */
    public function getPhotocopieurmoins70kg()
    {
        return $this->photocopieurmoins70kg;
    }

    /**
     * Set photocopieurplus70kg
     *
     * @param integer $photocopieurplus70kg
     * @return DevisSetup
     */
    public function setPhotocopieurplus70kg($photocopieurplus70kg)
    {
        $this->photocopieurplus70kg = $photocopieurplus70kg;

        return $this;
    }

    /**
     * Get photocopieurplus70kg
     *
     * @return integer 
     */
    public function getPhotocopieurplus70kg()
    {
        return $this->photocopieurplus70kg;
    }

    /**
     * Set imprimante
     *
     * @param integer $imprimante
     * @return DevisSetup
     */
    public function setImprimante($imprimante)
    {
        $this->imprimante = $imprimante;

        return $this;
    }

    /**
     * Get imprimante
     *
     * @return integer 
     */
    public function getImprimante()
    {
        return $this->imprimante;
    }

    /**
     * Set serveurs
     *
     * @param integer $serveurs
     * @return DevisSetup
     */
    public function setServeurs($serveurs)
    {
        $this->serveurs = $serveurs;

        return $this;
    }

    /**
     * Get serveurs
     *
     * @return integer 
     */
    public function getServeurs()
    {
        return $this->serveurs;
    }

    /**
     * Set onduleurs
     *
     * @param integer $onduleurs
     * @return DevisSetup
     */
    public function setOnduleurs($onduleurs)
    {
        $this->onduleurs = $onduleurs;

        return $this;
    }

    /**
     * Get onduleurs
     *
     * @return integer 
     */
    public function getOnduleurs()
    {
        return $this->onduleurs;
    }

    /**
     * Set peripheriques
     *
     * @param integer $peripheriques
     * @return DevisSetup
     */
    public function setPeripheriques($peripheriques)
    {
        $this->peripheriques = $peripheriques;

        return $this;
    }

    /**
     * Get peripheriques
     *
     * @return integer 
     */
    public function getPeripheriques()
    {
        return $this->peripheriques;
    }

    /**
     * Set piecesdetacheespoids
     *
     * @param integer $piecesdetacheespoids
     * @return DevisSetup
     */
    public function setPiecesdetacheespoids($piecesdetacheespoids)
    {
        $this->piecesdetacheespoids = $piecesdetacheespoids;

        return $this;
    }

    /**
     * Get piecesdetacheespoids
     *
     * @return integer 
     */
    public function getPiecesdetacheespoids()
    {
        return $this->piecesdetacheespoids;
    }

    /**
     * Set autresproduitsapreciser
     *
     * @param string $autresproduitsapreciser
     * @return DevisSetup
     */
    public function setAutresproduitsapreciser($autresproduitsapreciser)
    {
        $this->autresproduitsapreciser = $autresproduitsapreciser;

        return $this;
    }

    /**
     * Get autresproduitsapreciser
     *
     * @return string 
     */
    public function getAutresproduitsapreciser()
    {
        return $this->autresproduitsapreciser;
    }

    /**
     * Set customer
     *
     * @param \Hacco\DeeeBundle\Entity\Customers $customer
     * @return DevisSetup
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
