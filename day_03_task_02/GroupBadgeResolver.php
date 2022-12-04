<?php

class GroupBadgeResolver
{
    public static function getBadge(array $elfGroup): ?string
    {
        /** @var array<string, int> $sharedItems */
        $sharedItems = [];

        foreach ($elfGroup as $rucksack) {
            $rucksackUniqueItems = array_unique(str_split($rucksack));

            foreach ($rucksackUniqueItems as $rucksackUniqueItem) {
                if (isset($sharedItems[$rucksackUniqueItem]) === false)
                {
                    $sharedItems[$rucksackUniqueItem] = 1;
                }
                else
                {
                    $sharedItems[$rucksackUniqueItem]++;
                }
            }
        }

        foreach ($sharedItems as $sharedItemLetter => $sharedItem) {
            if ($sharedItem === 3)
            {
                return $sharedItemLetter;
            }
        }

        return null;
    }
}