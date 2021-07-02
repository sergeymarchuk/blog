<?php

namespace Domain\Attachment\DataTransferObjects;

use Illuminate\Http\UploadedFile;

class CreateAttachmentDto {
    /** @var UploadedFile */
    private $file;

    /** @var string */
    private $name;

    /**
     * CreateAttachmentDto constructor.
     *
     * @param UploadedFile $file
     * @param string $name
     */
    public function __construct(UploadedFile $file, string $name) {
        $this->file = $file;
        $this->name = $name;
    }

    /**
     * @return UploadedFile
     */
    public function getFile(): UploadedFile {
        return $this->file;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return str_replace(' ', '_', strtolower($this->name)) . '.' . $this->file->extension();
    }
}
