<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $tags;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SubCategories", inversedBy="products")
     */
    private $sub_category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categories", inversedBy="products")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductDetails", inversedBy="product")
     */
    private $productDetails;

    public function __construct()
    {
        $this->sub_category = new ArrayCollection();
        $this->category = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|SubCategories[]
     */
    public function getSubCategory(): Collection
    {
        return $this->sub_category;
    }

    public function addSubCategory(SubCategories $subCategory): self
    {
        if (!$this->sub_category->contains($subCategory)) {
            $this->sub_category[] = $subCategory;
        }

        return $this;
    }

    public function removeSubCategory(SubCategories $subCategory): self
    {
        if ($this->sub_category->contains($subCategory)) {
            $this->sub_category->removeElement($subCategory);
        }

        return $this;
    }

    /**
     * @return Collection|Categories[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
        }

        return $this;
    }

    public function getProductDetails(): ?ProductDetails
    {
        return $this->productDetails;
    }

    public function setProductDetails(?ProductDetails $productDetails): self
    {
        $this->productDetails = $productDetails;

        return $this;
    }
}
