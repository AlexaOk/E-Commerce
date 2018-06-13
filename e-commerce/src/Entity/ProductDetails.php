<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductDetailsRepository")
 */
class ProductDetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discount;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $new;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="productDetails")
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductToOrders", mappedBy="product_detail")
     */
    private $productToOrders;

    public function __construct()
    {
        $this->product = new ArrayCollection();
        $this->productToOrders = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    public function setPhoto(?array $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getNew(): ?bool
    {
        return $this->new;
    }

    public function setNew(?bool $new): self
    {
        $this->new = $new;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setProductDetails($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getProductDetails() === $this) {
                $product->setProductDetails(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProductToOrders[]
     */
    public function getProductToOrders(): Collection
    {
        return $this->productToOrders;
    }

    public function addProductToOrder(ProductToOrders $productToOrder): self
    {
        if (!$this->productToOrders->contains($productToOrder)) {
            $this->productToOrders[] = $productToOrder;
            $productToOrder->setProductDetail($this);
        }

        return $this;
    }

    public function removeProductToOrder(ProductToOrders $productToOrder): self
    {
        if ($this->productToOrders->contains($productToOrder)) {
            $this->productToOrders->removeElement($productToOrder);
            // set the owning side to null (unless already changed)
            if ($productToOrder->getProductDetail() === $this) {
                $productToOrder->setProductDetail(null);
            }
        }

        return $this;
    }
}
