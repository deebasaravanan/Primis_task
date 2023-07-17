class Actor
{
    private $id;
    private $name;
    private $dateOfBirth;

    public function __construct($name, $dateOfBirth)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function actorResult()
    {
        return json_encode(array(
            'id' => $this->id,
            'name' => $this->name,
            'dateOfBirth' => $this->dateOfBirth
        ));
    }
}

class Movie
{
    private $id;
    private $title;
    private $runtime;
    private $releaseDate;
    private $actors;

    public function __construct($title, $runtime, $releaseDate)
    {
        $this->id = uniqid();
        $this->title = $title;
        $this->runtime = $runtime;
        $this->releaseDate = $releaseDate;
        $this->actors = array();
    }
    public function getId()
    {
        return $this->id;
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

    public function movieResult()
    {
        $actorsJson = [];
        foreach ($this->actors as $actorData) {
            $actorJson = $actorData['actor']->toJson();
            $actorJson['character'] = $actorData['character'];
            $actorsJson[] = $actorJson;
        }

        return json_encode([
            'title' => $this->title,
            'runtime' => $this->runtime,
            'releaseDate' => $this->releaseDate,
            'actors' => $actorsJson
        ]);
    }
}
