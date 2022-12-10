<?php

require __DIR__ . '/File.php';
require __DIR__ . '/Folder.php';

$totalDiskSpace = 70000000;
$updateRequiredSpace = 30000000;

$cliLog = file_get_contents(__DIR__ . '/data/example.txt');
$cliLogRows = explode(PHP_EOL, $cliLog);

$readListCommand = false;

$topFolder = new Folder('/');
$currentFolder = $topFolder;

foreach ($cliLogRows as $cliLogRow) {
    if (str_starts_with($cliLogRow, '$'))
    {
        $readListCommand = false;
    }

    if ($cliLogRow === '$ ls')
    {
        $readListCommand = true;
        continue;
    }
    elseif (str_starts_with($cliLogRow, '$ cd '))
    {
        $changeDirectoryTo = strtr($cliLogRow, ['$ cd ' => '']);

        if ($changeDirectoryTo === '/')
        {
            $currentFolder = $topFolder;
        }
        elseif ($changeDirectoryTo === '..')
        {
            $currentFolder = $currentFolder->getParent();
        }
        else
        {
            if ($currentFolder->getFolder($changeDirectoryTo) === null)
            {
                $currentFolder->addFolder(new Folder($changeDirectoryTo));
            }

            $currentFolder = $currentFolder->getFolder($changeDirectoryTo);
        }
    }

    if ($readListCommand)
    {
        if (str_starts_with($cliLogRow, 'dir '))
        {
            $directoryName = strtr($cliLogRow, ['dir ' => '']);

            $currentFolder->addFolder(new Folder($directoryName));
        }
        else
        {
            preg_match('/(\d+) (.+)/', $cliLogRow, $fileRegexOutput);
            [$fileRow, $fileSize, $fileName] = $fileRegexOutput;

            $currentFolder->addFile(new File($fileName, (int)$fileSize));
        }
    }
}

$unusedSpace = $totalDiskSpace - $topFolder->getSize();
$requireToClearSpace = $updateRequiredSpace - $unusedSpace;

$smallestFolderAbleToDelete = [$topFolder, $topFolder->getSize()];

foreach ($topFolder->getAllFolders() as $folder) {
    $size = $folder->getSize();

    if ($size >= $requireToClearSpace && $size < $smallestFolderAbleToDelete[1])
    {
        $smallestFolderAbleToDelete[0] = $folder;
        $smallestFolderAbleToDelete[1] = $size;
    }
}

echo "Smallest folder: {$smallestFolderAbleToDelete[0]->name}; Size: {$smallestFolderAbleToDelete[1]}";

