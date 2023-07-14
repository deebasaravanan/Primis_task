class Actor
{
    private $name;
    private $dateOfBirth;

    public function __construct($name, $dateOfBirth)
    {
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
}

class Movie
{
    private $title;
    private $runtime;
    private $releaseDate;
    private $actors;

    public function __construct($title, $runtime, $releaseDate)
    {
        $this->title = $title;
        $this->runtime = $runtime;
        $this->releaseDate = $releaseDate;
        $this->actors = array();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getRuntime()
    {
        return $this->runtime;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function addActor($actor, $character)
    {
        $this->actors[] = array(
            'actor' => $actor,
            'character' => $character
        );
    }

    public function getActorsByDescendingAge()
    {
        $DescAge = $this->actors; 

        rsort($DescAge);

        return $DescAge;
    }
}
