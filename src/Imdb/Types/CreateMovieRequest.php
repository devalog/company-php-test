<?php

namespace Devin\Imdb\Types;

use Devin\Core\Json\JsonSerializableType;
use Devin\Core\Json\JsonProperty;

class CreateMovieRequest extends JsonSerializableType
{
    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var float $rating
     */
    #[JsonProperty('rating')]
    public float $rating;

    /**
     * @param array{
     *   title: string,
     *   rating: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->rating = $values['rating'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
