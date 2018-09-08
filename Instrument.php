<?php

declare(strict_types=1);

require_once 'Product.php';

class Instrument extends Product
{
    public const TYPE_GUITARE = 'guitare';
    public const TYPE_PIANO = 'piano';

    private $type;

    public function __construct(
        string $name = null,
        string $description = null,
        float $price = null,
        string $type = null
    ) {
        $this->type = $type;

        parent::__construct($name, $description, $price);
    }

    /**
     * @throws Exception
     */
    public function setType(string $type): self
    {
        if (!\in_array($type,[self::TYPE_GUITARE, self::TYPE_PIANO], true)) {
            throw new \Exception('Invalid type provided');
        }

        $this->type = $type;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function format(): string
    {
        return <<<INSTRUMENT
            <p>
                Type : $this->type<br/>
                Name : $this->name<br/>
                Description : $this->description
            </p>
INSTRUMENT;

    }
}
