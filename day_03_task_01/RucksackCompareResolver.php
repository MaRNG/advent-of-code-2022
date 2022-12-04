<?php

class RucksackCompareResolver
{
    /**
     * @return array<string>
     */
    public static function getSharedItems(string $encodedRucksack): array
    {
        $halfSizeRucksackCode = round(strlen($encodedRucksack) / 2);

        $firstCompartment = str_split(substr($encodedRucksack, 0, $halfSizeRucksackCode));
        $secondCompartment = str_split(substr($encodedRucksack, $halfSizeRucksackCode, strlen($encodedRucksack)));

        $indexedFirstCompartment = array_flip($firstCompartment);

        /** @var array<string, string> $sharedItems */
        $sharedItems = [];

        foreach ($secondCompartment as $secondCompartmentLetter) {
            if (array_key_exists($secondCompartmentLetter, $indexedFirstCompartment))
            {
                $sharedItems[$secondCompartmentLetter] = $secondCompartmentLetter;
            }
        }

        return $sharedItems;
    }
}