<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Domain\Attachment\AttachmentService;
use Domain\Attachment\FormRequests\StoreAttachmentRequest;
use Domain\Attachment\Resources\AttachmentResource;
use Domain\Attachment\Resources\AttachmentResourceCollection;
use Illuminate\Http\{JsonResponse, Request};

class AttachmentController extends Controller {

    private $attachmentService;

    public function __construct(AttachmentService $service) {
        $this->attachmentService = $service;
    }

    /**
     * @param Request $request
     *
     * @return AttachmentResourceCollection
     */
    public function index(Request $request): AttachmentResourceCollection {
        $perPage = $request->perPage ?? config('constants.attachments.per_page');
        return $this->attachmentService->getResourceCollection($perPage);
    }

    /**
     * @param StoreAttachmentRequest $request
     *
     * @return AttachmentResource
     */
    public function store(StoreAttachmentRequest $request): AttachmentResource {
        return new AttachmentResource($this->attachmentService->uploadAttachment($request->getDto()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return bool
     */
    public function destroy(int $id): bool {
        return $this->attachmentService->delete($id);
    }
}
