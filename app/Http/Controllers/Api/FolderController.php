<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $folders = Folder::query()
            ->whereNull('parent_id')
            ->get();

        if ($folders->isEmpty()) {
            return response()
                ->json([
                    'data' => null,
                    'message' => 'No data to show'
                ], SymfonyResponse::HTTP_NOT_FOUND);
        }

        return response()
            ->json([
                'message' => 'Success fetching folders',
                'data' => $folders,
            ], SymfonyResponse::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  Folder $folder
     * @return JsonResponse
     */
    public function show(Folder $folder): JsonResponse
    {
        $folder->load(['children.files', 'files']);

        return response()
            ->json([
                'message' => 'Success fetching folder',
                'data' => $folder,
            ], SymfonyResponse::HTTP_OK);
    }
}
