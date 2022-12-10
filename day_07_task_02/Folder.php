<?php

class Folder
{
    /**
     * @var array<File>
     */
    private array $files = [];

    /**
     * @var array<Folder>
     */
    private array $folders = [];

    private ?Folder $parent;

    public function __construct(
        public readonly string $name
    )
    {
    }

    public function addFolder(Folder $folder): self
    {
        $this->folders[$folder->name] = $folder;

        $folder->parent = $this;

        return $this;
    }

    public function getFolder(string $name): ?Folder
    {
        return $this->folders[$name] ?? null;
    }

    /**
     * @return array<Folder>
     */
    public function getAllFolders(): array
    {
        $folders = [];

        foreach ($this->folders as $folder) {
            $folders[] = $folder;

            foreach ($folder->getAllFolders() as $innerFolder) {
                $folders[] = $innerFolder;
            }
        }

        return $folders;
    }

    public function addFile(File $file): self
    {
        $this->files[] = $file;
        return $this;
    }

    public function getSize(): int
    {
        $size = 0;

        foreach ($this->files as $file) {
            $size += $file->size;
        }

        foreach ($this->folders as $folder) {
            $size += $folder->getSize();
        }

        return $size;
    }

    public function getParent(): ?Folder
    {
        return $this->parent;
    }
}