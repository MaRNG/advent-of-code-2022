<?php

const STARTING_PACKET_LENGTH = 4;

$bufferStream = file_get_contents(__DIR__ . '/data/input.txt');

$bufferStreamChars = str_split($bufferStream, 1);
$bufferStreamCharsCount = count($bufferStreamChars);

if (($bufferStreamCharsCount - STARTING_PACKET_LENGTH) > 0)
{
    for ($markerIdx = 0; $markerIdx < ($bufferStreamCharsCount - STARTING_PACKET_LENGTH); $markerIdx++)
    {
        $checkStartingPacket = array_slice($bufferStreamChars, $markerIdx, STARTING_PACKET_LENGTH);

        if (array_unique($checkStartingPacket) === $checkStartingPacket)
        {
            echo $markerIdx + STARTING_PACKET_LENGTH;
            exit(0);
        }
    }
}
else
{
    throw new InvalidArgumentException('Incoming packet is too short!');
}