<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[Assert\File(mimeTypes: ['image/jpeg', 'image/png'])]
    #[Vich\UploadableField(mapping: 'img', fileNameProperty: 'logo')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    /**
     * @var string[]|null
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $types = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @param string[] $types
     */
    public function setTypes(array $types): self
    {
        $this->types = $types;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }
}
