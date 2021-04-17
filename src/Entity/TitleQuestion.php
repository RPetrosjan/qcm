<?php

namespace App\Entity;

use App\Repository\TitleQuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TitleQuestionRepository::class)
 */
class TitleQuestion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Questions", mappedBy="title",  cascade={"persist"})
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competence", inversedBy="titlequestion")
     */
    private $competences;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ComptenceSection", inversedBy="titlequestion")
     */
    private $comptenceSection;

    /**
     * @ORM\ManyToOne(targetEntity=VersionCompetence::class, inversedBy="titlequestion")
     */
    private $versionCompetence;

    /**
     * @ORM\Column(type="text")
     */
    private $helpurl;

    public function __construct()
    {
        $this->question = new ArrayCollection();
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

    /**
     * @return Collection|Questions[]
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(Questions $type): self
    {
        if (!$this->question->contains($type)) {
            $this->question[] = $type;
            $type->setTitle($this);
        }

        return $this;
    }

    public function removeQuestion(Questions $type): self
    {
        if ($this->question->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getTitle() === $this) {
                $type->setTitle(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * @param mixed $competences
     */
    public function setCompetences($competences): void
    {
        $this->competences = $competences;
    }

    public function getComptenceSection(): ?ComptenceSection
    {
        return $this->comptenceSection;
    }

    public function setComptenceSection(?ComptenceSection $comptenceSection): self
    {
        $this->comptenceSection = $comptenceSection;

        return $this;
    }

    public function getVersionCompetence(): ?VersionCompetence
    {
        return $this->versionCompetence;
    }

    public function setVersionCompetence(?VersionCompetence $versionCompetence): self
    {
        $this->versionCompetence = $versionCompetence;

        return $this;
    }

    public function getHelpurl(): ?string
    {
        return $this->helpurl;
    }

    public function setHelpurl(string $helpurl): self
    {
        $this->helpurl = $helpurl;

        return $this;
    }
}
