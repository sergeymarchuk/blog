<?php

namespace Domain\Attachment;

use Domain\Attachment\DataTransferObjects\CreateAttachmentDto;
use Domain\Attachment\Models\Attachment;
use Domain\Attachment\Models\AttachmentFilter;
use Domain\Attachment\Resources\AttachmentResourceCollection;

/**
 * Class AttachmentService
 * @package Domain\Attachment
 */
class AttachmentService {

    private $model;
    private $filter;

    public function __construct(Attachment $model, AttachmentFilter $filter) {
        $this->model = $model;
        $this->filter = $filter;
    }

    public function getResourceCollection(int $perPage): AttachmentResourceCollection {
        return new AttachmentResourceCollection($this->model::filter($this->filter)->paginate($perPage));
    }

    /**
     * @param CreateAttachmentDto $dto
     *
     * @return Attachment|null
     */
    public function uploadAttachment(CreateAttachmentDto $dto): ?Attachment {
        try {
            $dto->getFile()->storeAs('images/originals', $dto->getName(), 'public');
            return $this->model::create(['name' => $dto->getName()]);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool {
        return $this->model::where('id', $id)->delete();
    }
}
