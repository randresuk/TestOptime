<?php

namespace PrincipalBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 */
class Article
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     * * @Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "El campo debe tener como minimo 4 caracteres",
     *      maxMessage = "El campo max 10 caracteres"
     * )
     * @Assert\Regex(
     *     pattern="/[$%&|<>#\s]/",
     *     match=false,
     *     message="No puede contener caracteres especiales ni espacios"
     * )
     */
    private $code;

    /**
     * @var string
      * * @Assert\Length(
     *      min = 4,
     *      max = 50,
     *      minMessage = "El campo debe tener como minimo 4 caracteres",
     *      maxMessage = "El campo max 0 caracteres"
     * )
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $category;

    /**
     * @var float
     * @Assert\Type(
     * type="float",
     * message="el valor  {{ value }} no es valido, debe ser numérico."
     * )
     */
    private $price;


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
     * Set code
     *
     * @param string $code
     *
     * @return Article
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Article
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set brand
     *
     * @param string $brand
     *
     * @return Article
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Article
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Article
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}

