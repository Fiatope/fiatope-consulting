<?php

namespace App\Entity;

use App\Repository\BusinessAreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[UniqueEntity(fields: ['slug'])]
#[ORM\Entity(repositoryClass: BusinessAreaRepository::class)]
class BusinessArea
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $name = null;

    #[ORM\Column(length: 60)]
    private ?string $slug = null;

    #[Assert\File(mimeTypes: ['image/jpeg', 'image/png', 'image/svg+xml'])]
    #[Vich\UploadableField(mapping: 'img', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $fa_icon = null;

    #[ORM\ManyToMany(targetEntity: BusinessAreaSection::class, inversedBy: 'areas')]
    private Collection $sections;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
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

    public function getId(): ?int
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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getFaIcon(): ?string
    {
        return $this->fa_icon;
    }

    public function setFaIcon(string $fa_icon): self
    {
        $this->fa_icon = $fa_icon;

        return $this;
    }

    /**
     * @return Collection<int, BusinessAreaSection>
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(BusinessAreaSection $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections->add($section);
        }

        return $this;
    }

    public function removeSection(BusinessAreaSection $section): self
    {
        $this->sections->removeElement($section);

        return $this;
    }
}
