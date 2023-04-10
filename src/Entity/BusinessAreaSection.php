<?php

namespace App\Entity;

use App\Repository\BusinessAreaSectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: BusinessAreaSectionRepository::class)]
class BusinessAreaSection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $component = null;

    #[Assert\File(mimeTypes: ['image/jpeg', 'image/png'])]
    #[Vich\UploadableField(mapping: 'img', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: BusinessArea::class, mappedBy: 'sections')]
    private Collection $areas;

    public function __construct()
    {
        $this->areas = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getComponent(): ?string
    {
        return $this->component;
    }

    public function setComponent(?string $component): self
    {
        $this->component = $component;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     * @return BusinessAreaSection
     */
    public function setImageFile(?File $imageFile): BusinessAreaSection
    {
        $this->imageFile = $imageFile;
        return $this;
    }

    /**
     * @return Collection<int, BusinessArea>
     */
    public function getAreas(): Collection
    {
        return $this->areas;
    }

    public function addArea(BusinessArea $area): self
    {
        if (!$this->areas->contains($area)) {
            $this->areas->add($area);
            $area->addSection($this);
        }

        return $this;
    }

    public function removeArea(BusinessArea $area): self
    {
        if ($this->areas->removeElement($area)) {
            $area->removeSection($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
