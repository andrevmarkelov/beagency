<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
#[Vich\Uploadable]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 5000)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $shortDescription = null;

    #[Vich\UploadableField(mapping: 'images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string')]
    private ?string $imageName = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $titleTextBlock = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'services', targetEntity: ServicesItemTextBlock::class, cascade: ['all'], orphanRemoval: true)]
    private Collection $textBlock;

    #[ORM\OneToMany(mappedBy: 'services', targetEntity: ServicesItemImageBlock::class, cascade: ['all'], orphanRemoval: true)]
    private Collection $imageBlock;

    #[ORM\OneToMany(mappedBy: 'services', targetEntity: ServicesItemCounting::class, cascade: ['all'], orphanRemoval: true)]
    private Collection $CountingBlock;

    #[ORM\OneToMany(mappedBy: 'services', targetEntity: ServicesItemBottomText::class, cascade: ['all'], orphanRemoval: true)]
    private Collection $bottomText;

    public function __construct()
    {
        $this->textBlock = new ArrayCollection();
        $this->imageBlock = new ArrayCollection();
        $this->CountingBlock = new ArrayCollection();
        $this->bottomText = new ArrayCollection();
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTitleTextBlock(): ?string
    {
        return $this->titleTextBlock;
    }

    public function setTitleTextBlock(string $titleTextBlock): self
    {
        $this->titleTextBlock = $titleTextBlock;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, ServicesItemTextBlock>
     */
    public function getTextBlock(): Collection
    {
        return $this->textBlock;
    }

    public function addTextBlock(ServicesItemTextBlock $textBlock): self
    {
        if (!$this->textBlock->contains($textBlock)) {
            $this->textBlock->add($textBlock);
            $textBlock->setServices($this);
        }

        return $this;
    }

    public function removeTextBlock(ServicesItemTextBlock $textBlock): self
    {
        if ($this->textBlock->removeElement($textBlock)) {
            // set the owning side to null (unless already changed)
            if ($textBlock->getServices() === $this) {
                $textBlock->setServices(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ServicesItemImageBlock>
     */
    public function getImageBlock(): Collection
    {
        return $this->imageBlock;
    }

    public function addImageBlock(ServicesItemImageBlock $imageBlock): self
    {
        if (!$this->imageBlock->contains($imageBlock)) {
            $this->imageBlock->add($imageBlock);
            $imageBlock->setServices($this);
        }

        return $this;
    }

    public function removeImageBlock(ServicesItemImageBlock $imageBlock): self
    {
        if ($this->imageBlock->removeElement($imageBlock)) {
            // set the owning side to null (unless already changed)
            if ($imageBlock->getServices() === $this) {
                $imageBlock->setServices(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ServicesItemCounting>
     */
    public function getCountingBlock(): Collection
    {
        return $this->CountingBlock;
    }

    public function addCountingBlock(ServicesItemCounting $countingBlock): self
    {
        if (!$this->CountingBlock->contains($countingBlock)) {
            $this->CountingBlock->add($countingBlock);
            $countingBlock->setServices($this);
        }

        return $this;
    }

    public function removeCountingBlock(ServicesItemCounting $countingBlock): self
    {
        if ($this->CountingBlock->removeElement($countingBlock)) {
            // set the owning side to null (unless already changed)
            if ($countingBlock->getServices() === $this) {
                $countingBlock->setServices(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ServicesItemBottomText>
     */
    public function getBottomText(): Collection
    {
        return $this->bottomText;
    }

    public function addBottomText(ServicesItemBottomText $bottomText): self
    {
        if (!$this->bottomText->contains($bottomText)) {
            $this->bottomText->add($bottomText);
            $bottomText->setServices($this);
        }

        return $this;
    }

    public function removeBottomText(ServicesItemBottomText $bottomText): self
    {
        if ($this->bottomText->removeElement($bottomText)) {
            // set the owning side to null (unless already changed)
            if ($bottomText->getServices() === $this) {
                $bottomText->setServices(null);
            }
        }

        return $this;
    }
}
